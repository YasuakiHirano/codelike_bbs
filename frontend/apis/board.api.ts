import apiClient from 'axios';
import { Board, BoardCreateRequest, BoardCreateResponse, BoardFetchResponse } from '@/types';

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

export const BoardFetch = async () => {
  apiClient.defaults.withCredentials = true;

  let boards: Array<Board>|null = null;
  await apiClient.get('/api/board/fetch')
    .then((response: BoardFetchResponse) => {
      if (response.status == 200) {
        boards = response.data.message.boards;
      }
    })
    .catch((error: any) => {
      console.log(error);
    });

  return boards;
}