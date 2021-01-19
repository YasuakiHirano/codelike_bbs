<template>
  <v-app dark>
    <v-navigation-drawer v-model="drawer" fixed app>
      <v-list>
        <v-list-item v-for="(item, i) in items" :key="i" :to="item.to" router exact v-show="item.isShow">
          <v-list-item-action>
            <v-icon>{{ item.icon }}</v-icon>
          </v-list-item-action>
          <v-list-item-content>
            <v-list-item-title v-text="item.title" />
          </v-list-item-content>
        </v-list-item>
      </v-list>
    </v-navigation-drawer>
    <v-app-bar fixed app>
      <v-app-bar-nav-icon @click.stop="drawer = !drawer" />
      <v-toolbar-title v-text="title" />
    </v-app-bar>
    <v-main>
      <v-container>
        <nuxt />
      </v-container>
    </v-main>
    <v-footer :absolute="!fixed" app>
      <span>&copy; {{ new Date().getFullYear() }}</span>
    </v-footer>
    <v-snackbar v-model="warningBar" color="warning">{{warningMessage}}</v-snackbar>
  </v-app>
</template>

<script lang="ts">
import { Component, Prop, Vue } from 'nuxt-property-decorator';
import { isUserSignIn } from '~/utils';

@Component({
  name: 'LayoutDefaultPage',
})
export default class LayoutDefaultPage extends Vue {
  @Prop()
  clipped:boolean = false;

  @Prop()
  drawer:boolean = false;

  @Prop()
  fixed:boolean = false;

  @Prop()
  items:Array<any> = [
    {
      icon: 'mdi-apps',
      title: 'Top',
      to: '/',
      isShow: true
    },
    {
      icon: 'mdi-chart-bubble',
      title: 'SignIn',
      to: '/login',
      isShow: false
    }
  ];

  @Prop()
  miniVariant:boolean = false;

  @Prop()
  right:boolean = true;

  @Prop()
  rightDrawer:boolean = false;

  @Prop()
  title:string = 'codelike bbs';

  @Prop()
  warningBar:boolean = false;

  @Prop()
  warningMessage:string = '';

  @Prop()
  signedInMenuIndex: number = 1;

  private async mounted() {
    const signedIn = await isUserSignIn();
    if (!signedIn) {
      this.items[this.signedInMenuIndex].isShow = true;
    }

    this.$nuxt.$on('warningSnackbar', this.onWarningSnackbar);
    this.$nuxt.$on('signedIn', this.onSignedIn);
  }

  private beforeDestroy() {
    this.$nuxt.$off('warningSnackbar')
    this.$nuxt.$off('signedIn')
  }

  private onWarningSnackbar(message: string) {
      this.warningBar = true;
      this.warningMessage = message;
  }

  private onSignedIn() {
    this.items[this.signedInMenuIndex].isShow = false;
  }
}
</script>
