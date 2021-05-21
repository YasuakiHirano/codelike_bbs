<template>
  <div class="d-flex justify-center">
    <v-form class="col-8">
      <v-text-field label="名前" v-model="name"></v-text-field>
      <v-text-field label="メールアドレス" v-model="email"></v-text-field>
      <v-text-field label="パスワード" type="password" v-model="password"></v-text-field>
      <v-text-field label="パスワード確認" type="password" v-model="password_confirm"></v-text-field>
      <div class="d-flex justify-center">
        <v-btn color="primary" large @click="register">登録する</v-btn>
      </div>
    </v-form>
  </div>
</template>

<script lang="ts">
import { Component, Prop, Vue } from 'nuxt-property-decorator';
import apiClient from 'axios';
import { UserCreate } from '@/apis';
import { UserCreateRequest } from '@/types';

@Component({
  name: 'UserAddPage',
})
export default class UserAddPage extends Vue {
  @Prop()
  name: any = '';

  @Prop()
  email: any = '';

  @Prop()
  password: any = '';

  @Prop()
  password_confirm: any = '';

  private async register() {
    const params: UserCreateRequest = {
      name: this.name,
      email: this.email,
      password: this.password,
      password_confirm: this.password_confirm
    }

    this.$nuxt.$loading.start();
    const created: boolean = await UserCreate(params);
    this.$nuxt.$loading.finish();
    if (created) {
      this.$nuxt.$emit('signedIn');
      this.$router.push({ path:'/' });
    }
  }
}
</script>