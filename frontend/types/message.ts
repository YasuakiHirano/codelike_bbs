export type Message = {
  id: number
  board_id: number
  user_name: string
  message: string
  created_at: Date
  updated_at: Date
}

export type MessageCreateRequest = {
  board_id: number
  user_name: string
  message: string
}

export type MessageCreateResponse = {
  status: number
  data: {
    message: string
  } 
}

export type MessageFetchResponse = {
  status: number
  data: {
    message: {
      text: string
      messages: Array<Message>
    }
  } 
}
