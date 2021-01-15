import apiClient from 'axios';
import { BoardCreateRequest, BoardCreateResponse } from '@/types';

export const BoardCreate = async (params: BoardCreateRequest) => {
  apiClient.defaults.withCredentials = true;

  let created: boolean = false;
  await apiClient.get('/sanctum/csrf-cookie').then(async (response) => {
    await apiClient.post('/api/board/create', params)
      .then((response: BoardCreateResponse) => {
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