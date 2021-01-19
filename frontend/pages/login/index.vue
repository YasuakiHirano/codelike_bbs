<template>
  <div class="d-flex justify-center">
    <v-form class="col-8">
      <v-text-field label="メールアドレス" v-model="email" ></v-text-field>
      <v-text-field label="パスワード" type="password" v-model="password" ></v-text-field>
      <div class="d-flex justify-center">
        <v-btn color="primary" large @click="signIn">サインイン</v-btn>
        <v-btn color="success" large @click="moveCreateAccount" class="ml-2">アカウント作成</v-btn>
      </div>
    </v-form>
  </div>
</template>

<script lang="ts">
import { Component, Prop, Vue } from 'nuxt-property-decorator';
import apiClient from 'axios';
import { SignInRequest } from '@/types';
import { UserSignIn } from '@/apis';

@Component({
  name: 'LoginPage',
})
export default class LoginPage extends Vue {
  @Prop()
  email: any = '';

  @Prop()
  password: any = '';

  private async signIn() {
    const params:SignInRequest = {
      email: this.email,
      password: this.password,
    }

    this.$nuxt.$loading.start();
    const signedIn = await UserSignIn(params);
    this.$nuxt.$loading.finish();
    if (signedIn) {
      this.$nuxt.$emit('signedIn');
      this.$router.push({ path: '../board/add'});
    }
  }

  private moveCreateAccount() {
    this.$router.push({ path: '../user/add'});
  }
}
</script>