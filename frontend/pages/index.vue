<template>
  <div>
    
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
            this.$router.push({ path: 'board/add'});
          }
        })
        .catch((error: any) => {
          console.log(error);
        });
    });
  }

  private moveCreateAccount() {
    this.$router.push({ path: 'user/add'});
  }
}
</script>