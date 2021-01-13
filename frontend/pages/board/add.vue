<template>
  <div class="d-flex justify-center">
    <v-form class="col-8">
      <v-text-field label="タイトル" v-model="title"></v-text-field>
      <v-text-field label="名前" v-model="userName"></v-text-field>
      <v-textarea label="内容" v-model="content"></v-textarea>
      <v-text-field label="パスワード" v-model="password"></v-text-field>
      <div class="d-flex justify-center">
        <v-btn color="primary" large @click="register">作成する</v-btn>
      </div>
    </v-form>
  </div>
</template>

<script lang="ts">
import { Component, Vue } from 'nuxt-property-decorator';
import apiClient from 'axios';

@Component({
  name: 'BoardAddPage',
})
export default class UserAddPage extends Vue {
  title: any = '';
  userName: any = '';
  content: any = '';
  password: any = '';

  private async register() {
   const params = {
      title: this.title,
      userName: this.userName,
      content: this.content,
      password: this.password
    }

    apiClient.defaults.withCredentials = true;
    await apiClient.get('/sanctum/csrf-cookie').then(async (response) => {
      await apiClient.post('/api/board/create', params)
        .then((response: any) => {
          if (response.status == 200) {
            alert("board create ok.");
          }
        })
        .catch((error: any) => {
          console.log(error);
        });
    });
  }
}
</script>