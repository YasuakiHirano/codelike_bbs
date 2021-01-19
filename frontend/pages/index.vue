<template>
  <div>
    <div class="d-flex justify-end">
      <v-btn class="primary mb-5" @click="addBoard">
        新規作成する
      </v-btn>
    </div>
    <div v-if="!boards || boards.length === 0">
      <v-alert outlined type="warning" class="mt-5" prominent border="left">
        表示する掲示板がありません。
      </v-alert>
    </div>
    <div v-if="boards && boards.length !== 0">
      <v-item v-for="(board, i) in boards" :key="i"> 
        <v-list-item-group color="primary">
          <v-list-item class="col-12">
            <v-list-item-content>
              <v-list-item-title>{{board.title}}</v-list-item-title>
              <v-list-item-subtitle>{{board.user_name}}</v-list-item-subtitle>
              <v-list-item-content>{{board.content}}</v-list-item-content>
            </v-list-item-content>
          </v-list-item>
          <v-divider></v-divider>
        </v-list-item-group>
      </v-item>
    </div>
  </div>
</template>

<script lang="ts">
import { Component, Prop, Vue } from 'nuxt-property-decorator';
import apiClient from 'axios';
import { BoardFetch, UserFind } from '@/apis';
import { Board, User } from '@/types';
import { UserSignInCheckAndRedirect } from '@/utils';

@Component({
  name: 'TopPage',
})
export default class TopPage extends Vue {
  @Prop()
  boards: Array<Board>|null = [];

  private async mounted() {
    this.$nuxt.$loading.start();
    const resultBoards = await BoardFetch();
    if (resultBoards) {
      this.boards = resultBoards;
    }

    this.$nuxt.$loading.finish();
  }

  private async addBoard() {
    this.$nuxt.$loading.start();
    await UserSignInCheckAndRedirect(this.$nuxt, './login');
    this.$nuxt.$loading.finish();
    this.$router.push({ path:'../board/add' });
  }
}
</script>