<template>
  <div>
    <v-card
      elevation="7"
      class="col-12 mt-5"
      shaped
    >
      <v-card-title>{{ title }}</v-card-title>
      <v-card-subtitle>{{ subtitle }}</v-card-subtitle>
      <v-card-text>{{ content }}</v-card-text>
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
          <v-text-field label="名前"></v-text-field>
          <v-textarea  label="内容入力" placeholder="コメントを入力してください"></v-textarea>
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

@Component({
  name: 'BoardDetailPage',
})
export default class BoardDetailPage extends Vue {
  title: string = 'title';

  subtitle: string = 'subtitle';

  content: string = 'content';

  showPostDialog: boolean = false;

  messages: any = [
    { user_name:'taro1' ,message: 'test1234'},
    { user_name:'taro2' ,message: 'test1235'},
    { user_name:'taro3' ,message: 'test1236'},
  ];

  private register() {

  }

  private async mounted() {
    console.log(this.$route.params.id);
  }

}
</script>