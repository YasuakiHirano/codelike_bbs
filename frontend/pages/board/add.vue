<template>
  <div class="d-flex justify-center">
    <v-form class="col-8">
      <v-text-field label="タイトル" v-model="title"></v-text-field>
      <template v-if="permissionAddBoard">
        <v-text-field label="名前" v-model="userName" disabled></v-text-field>
      </template>
      <template v-else>
        <v-text-field label="名前" v-model="userName"></v-text-field>
      </template> 
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
import { UserSignInCheckAndRedirect } from '@/utils';
import { myConst } from '@/const/index';

@Component({
  name: 'BoardAddPage',
})
export default class BoardAddPage extends Vue {
  title: any = '';

  userName: any = '';

  content: any = '';

  permissionAddBoard: number = 0;

  private async mounted() {
    this.permissionAddBoard = myConst.PERMISSION_ADD_BOARD;

    this.$nuxt.$loading.start();
    if (myConst.PERMISSION_ADD_BOARD) {
      await UserSignInCheckAndRedirect(this.$nuxt, '../login');
    }

    const user:User|null = await UserFind();
    if (user) {
      this.userName = user!.name;
    }
    this.$nuxt.$loading.finish();
  }

  private async register() {
    const params: BoardCreateRequest = {
      title: this.title,
      user_name: this.userName,
      content: this.content,
    }
    
    this.$nuxt.$loading.start();
    const created: boolean = await BoardCreate(params);
    if (created) {
      this.$nuxt.$router.push({ path:'../' });
    }
    this.$nuxt.$loading.finish();
  }
}
</script>