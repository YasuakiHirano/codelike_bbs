<template>
  <div>
    <v-card
      elevation="7"
      class="col-12 mt-5"
      shaped
      v-if="board"
    >
      <v-card-title>{{ board.title }}</v-card-title>
      <v-card-subtitle>{{ board.user_name }}</v-card-subtitle>
      <v-card-text>{{ board.content }}</v-card-text>
    </v-card>

    <div class="mt-8">
      <template v-for="(message, key) in messages">
        <v-card 
        :key="key" 
        elevation="2"
        class="mt-3"
        >
          <v-card-subtitle>{{ message.user_name }}</v-card-subtitle>
          <v-card-text>{{ message.message }}</v-card-text>
        </v-card>
      </template>
    </div>
    <v-btn fixed bottom right width="200" height="40" @click="showPostDialog = true">投稿する</v-btn>
    <v-dialog :value="showPostDialog" persistent max-width="800">
      <v-card class="pt-5">
        <v-card-text>
          <v-text-field label="名前" v-model="postUserName"></v-text-field>
          <v-textarea  label="内容入力" placeholder="コメントを入力してください" v-model="postContent"></v-textarea>
        </v-card-text>
        <v-card-actions class="d-flex justify-end">
          <v-btn @click="register()" class="mb-3 col-2">投稿</v-btn>
          <v-btn @click="showPostDialog = false" class="mb-3 col-2">閉じる</v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </div>
</template>

<script lang="ts">
import { Component, Prop, Vue } from 'nuxt-property-decorator';
import { BoardFind, MessageCreate, MessageFetchByBoardId } from '~/apis';
import { Board, Message, MessageCreateRequest } from '~/types';

@Component({
  name: 'BoardDetailPage',
})
export default class BoardDetailPage extends Vue {
  boardId: number = 0;

  title: string = 'title';

  subtitle: string = 'subtitle';

  content: string = 'content';

  postUserName: string = '';

  postContent: string = '';

  showPostDialog: boolean = false;

  board: Board|null = null;

  messages: Array<Message>|null = [];

  private async register() {
    const params: MessageCreateRequest = {
      board_id: this.boardId,
      user_name: this.postUserName,
      message: this.postContent,
    }

    this.showPostDialog = false;
    this.$nuxt.$loading.start();

    const created: boolean = await MessageCreate(params);
    if (created) {
      await this.fetchMessages();
    }

    this.postUserName = '';
    this.postContent = '';

    this.$nuxt.$loading.finish();
  }

  private async created() {
    this.boardId = Number(this.$route.params.id);

    this.$nextTick(() => {
      this.$nuxt.$loading.start()
    });

    const resultBoard = await BoardFind(this.boardId);
    if (resultBoard) {
      this.board = resultBoard;
    }

    await this.fetchMessages();

    this.$nuxt.$loading.finish();
  }

  private async fetchMessages() {
    const resultMessages = await MessageFetchByBoardId(this.boardId);
    if (resultMessages) {
      this.messages = resultMessages;
    }
  }

}
</script>