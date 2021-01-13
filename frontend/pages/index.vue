<template>
  <v-row justify="center" align="center">
    <v-btn color="primary" @click="signIn">サインイン</v-btn>
  </v-row>
</template>

<script lang="ts">
import { Component, Vue } from 'nuxt-property-decorator';
@Component({
  name: 'TopPage',
})
export default class TopPage extends Vue {
  email: any = '';
  password: any = '';

  /**
   * ユーザー認証処理
   */
  private async signIn() {
    alert("sign in");
  }
}
</script>