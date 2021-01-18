import apiClient from 'axios';
import { User, UserCreateRequest, UserCreateResponse } from '@/types';

export const UserCreate = async (params: UserCreateRequest) => {
  apiClient.defaults.withCredentials = true;

  let created = false;
  await apiClient.get('/sanctum/csrf-cookie').then(async (response) => {
    await apiClient.post('/api/register', params)
      .then((response: UserCreateResponse) => {
        if (response.status == 200) {
          created = true;
        }
      })
      .catch((error: any) => {
        console.log(error);
      });
  });

  return created;
}

export const UserFind = async () => {
  apiClient.defaults.withCredentials = true;

  let user:User| null = null;

  await apiClient.get('/api/user').then(async (response) => {
    if (response.status === 200) {
      user = response.data;
    }
  })
  .catch((error: any) => {
    console.log(error);
  }); 

  return user;
}