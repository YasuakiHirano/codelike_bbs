<template>
  <div class="d-flex justify-center">
    <v-form class="col-8">
      <v-text-field label="タイトル" v-model="title"></v-text-field>
      <v-text-field label="名前" v-model="userName"></v-text-field>
      <v-textarea label="内容" v-model="content"></v-textarea>
      <div class="d-flex justify-center">
        <v-btn color="primary" large @click="register">作成する</v-btn>
      </div>
    </v-form>
  </div>
</template>

<script lang="ts">
import { Component, Prop, Vue } from 'nuxt-property-decorator';
import apiClient from 'axios';
import { BoardCreate, UserFind } from '@/apis';
import { BoardCreateRequest, User } from '@/types';

@Component({
  name: 'BoardAddPage',
})
export default class BoardAddPage extends Vue {
  @Prop()
  title: any = '';

  @Prop()
  userName: any = '';

  @Prop()
  content: any = '';

  private async mounted() {
    // TODO login check
    // const user:User|null = await UserFind();
    // if (user === null) {
    //   this.$nuxt.$emit('warningSnackbar', 'ログインしてから実行してください');
    //   this.$router.push({ path:'../login' });
    // } 
  }

  private async register() {
    const params: BoardCreateRequest = {
      title: this.title,
      user_name: this.userName,
      content: this.content,
    }
    
    const created: boolean = await BoardCreate(params);
    if (created) {
      // TODO
    }
  }
}
</script>