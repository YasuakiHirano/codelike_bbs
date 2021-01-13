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
import { Component, Vue } from 'nuxt-property-decorator';
import apiClient from 'axios';

@Component({
  name: 'TopPage',
})
export default class TopPage extends Vue {
  email: any = '';
  password: any = '';

  private async signIn() {
    const params = {
      email: this.email,
      password: this.password,
    }

    apiClient.defaults.withCredentials = true;
    await apiClient.get('/sanctum/csrf-cookie').then(async () => {
      await apiClient.post('/api/login', params)
        .then((response: any) => {
          if (response.status == 200) {
            let token = response.data.token;
            localStorage.setItem('codelikeBbsToken', token); 

            this.$nuxt.$router.push({ path: 'board/add'});
          }
        })
        .catch((error: any) => {
          console.log(error);
        });
    });
  }

  private moveCreateAccount() {
    this.$nuxt.$router.push({ path: 'user/add'});
  }
}
</script>