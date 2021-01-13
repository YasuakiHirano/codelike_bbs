<template>
  <div class="d-flex justify-center">
    <v-form class="col-8">
      <v-text-field label="タイトル" v-model="title"></v-text-field>
      <v-text-field label="名前" v-model="name"></v-text-field>
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
@Component({
  name: 'BoardAddPage',
})
export default class UserAddPage extends Vue {
  title: any = '';
  name: any = '';
  content: any = '';
  password: any = '';

  private async register() {

  }
}
</script>