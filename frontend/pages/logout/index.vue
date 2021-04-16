<template>
  <div>
    <template v-if="isShow">
      <v-alert outlined type="success" class="mt-5" prominent border="left" v-if="signOutSuccess">
        サインアウトしました。
      </v-alert>
      <v-alert outlined type="error" class="mt-5" prominent border="left" v-if="signOutSuccess == false">
        サインアウトに失敗しました。
      </v-alert>
    </template>
  </div>
</template>

<script lang="ts">
import { Component, Prop, Vue } from 'nuxt-property-decorator';
import apiClient from 'axios';
import { UserSignOut } from '@/apis';

@Component({
  name: 'LogoutPage',
})
export default class LogoutPage extends Vue {
  private signOutSuccess:boolean = false;

  private isShow:boolean = false;

  private async mounted() {
    let signOut = false;

    await this.$nextTick(async function() {
      this.$nuxt.$loading.start();

      signOut = await UserSignOut();
      this.signOutSuccess = signOut;
      this.isShow = true;

      this.$nuxt.$loading.finish();
      this.$nuxt.$emit('signedOut');
    });

  }
}
</script>