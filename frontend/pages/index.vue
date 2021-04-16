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
        <v-list-item-group color="primary" :multiple="false">
          <v-list-item v-for="(board, i) in boards" :key="i" class="col-12" @click="selectBoard(board.id)">
            <v-list-item-content>
              <v-list-item-title>{{board.title}}</v-list-item-title>
              <v-list-item-subtitle>{{board.user_name}}</v-list-item-subtitle>
              <v-list-item-content>{{board.content}}</v-list-item-content>
            </v-list-item-content>
          </v-list-item>
        </v-list-item-group>
    </div>
  </div>
</template>

<script lang="ts">
import { Component, Prop, Vue } from 'nuxt-property-decorator';
import { BoardFetch } from '@/apis';
import { Board } from '@/types';
import { UserSignInCheckAndRedirect } from '@/utils';

@Component({
  name: 'TopPage',
})
export default class TopPage extends Vue {
  boards: Array<Board>|null = [];

  private async created() {
    this.$nextTick(() => {
      this.$nuxt.$loading.start()
    });

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

  private async selectBoard(boardId: number) {
    this.$router.push({ path:'../board/detail/' + boardId });
  }
}
</script>
<style scoped>
.v-list-item {
  border-bottom:1px solid rgba(175, 175, 175, 0.911);
}
</style>