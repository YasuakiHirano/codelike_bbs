<template>
  <div class="d-flex justify-center">
    <v-form class="col-8">
      <v-text-field label="メールアドレス" ></v-text-field>
      <v-text-field label="パスワード" ></v-text-field>
      <div class="d-flex justify-center">
        <v-btn color="primary" large @click="signIn">サインイン</v-btn>
        <v-btn color="success" large class="ml-2" @click="moveCreateAccount">アカウント作成</v-btn>
      </div>
    </v-form>
  </div>
</template>

<script lang="ts">
import { Component, Vue } from 'nuxt-property-decorator';
@Component({
  name: 'TopPage',
})
export default class TopPage extends Vue {
  email: any = '';
  password: any = '';

  private async signIn() {
  }

  private async moveCreateAccount() {
    this.$nuxt.$router.push({ path:'/user/add' });
  }
}
</script>