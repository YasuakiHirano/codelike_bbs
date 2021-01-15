import apiClient from 'axios';
import { UserCreateRequest, UserCreateResponse } from '@/types';

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