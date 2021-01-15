export type Board = {
  id: number
  title: string
  user_name: string
  content: string
  created_at: Date
  updated_at: Date
}

export type BoardCreateRequest = {
  title: string
  user_name: string
  content: string
}

export type BoardCreateResponse = {
  status: number
  data: {
    message: string
  } 
}

export type BoardFetchResponse = {
  status: number
  data: {
    message: {
      text: string
      boards: Array<Board>
    }
  } 
}
