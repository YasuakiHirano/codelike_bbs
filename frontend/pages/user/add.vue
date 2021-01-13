<template>
  <div class="d-flex justify-center">
    <v-form class="col-8">
      <v-text-field label="名前" v-model="name"></v-text-field>
      <v-text-field label="メールアドレス" v-model="email"></v-text-field>
      <v-text-field label="パスワード" v-model="password"></v-text-field>
      <v-text-field label="パスワード確認" v-model="password_confirm"></v-text-field>
      <div class="d-flex justify-center">
        <v-btn color="primary" large @click="register">登録する</v-btn>
      </div>
    </v-form>
  </div>
</template>

<script lang="ts">
import { Component, Vue } from 'nuxt-property-decorator';
import apiClient from 'axios';

@Component({
  name: 'UserAddPage',
})
export default class UserAddPage extends Vue {
  name: any = '';
  email: any = '';
  password: any = '';
  password_confirm: any = '';

  private async register() {
    const params = {
      name: this.name,
      email: this.email,
      password: this.password,
      password_confirm: this.password_confirm
    }

    apiClient.defaults.withCredentials = true;
    await apiClient.get('/sanctum/csrf-cookie').then(async (response) => {
      await apiClient.post('/api/register', params)
        .then((response: any) => {
          if (response.status == 200) {
            this.$nuxt.$router.push({ path:'board/add' });
          }
        })
        .catch((error: any) => {
          console.log(error);
        });
    });

  }
}
</script>