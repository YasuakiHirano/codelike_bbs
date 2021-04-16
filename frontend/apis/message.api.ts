import apiClient from 'axios';
import { Message, MessageCreateRequest, MessageCreateResponse, MessageFetchResponse } from '@/types';

export const MessageCreate = async (params: MessageCreateRequest) => {
  apiClient.defaults.withCredentials = true;

  let created: boolean = false;
  await apiClient.get('/sanctum/csrf-cookie').then(async (response) => {
    await apiClient.post('/api/message/create', params)
      .then((response: MessageCreateResponse) => {
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

export const MessageFetchByBoardId = async (boardId: number) => {
  apiClient.defaults.withCredentials = true;

  let messages: Array<Message>|null = null;
  await apiClient.get('/api/message/fetch_by_board_id', { params:{ board_id: boardId} })
    .then((response: MessageFetchResponse) => {
      if (response.status == 200) {
        messages = response.data.message.messages;
      }
    })
    .catch((error: any) => {
      console.log(error);
    });

  return messages;
}

