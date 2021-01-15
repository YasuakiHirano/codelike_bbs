export type User = {
  id: number
  name: string
  email: string
  created_at: Date
  updated_at: Date
}

export type UserCreateRequest = {
  name: string
  email: string
  password: string
  password_confirm: string
}

export type UserCreateResponse = {
  status: number
  data: {
    message: string
  } 
}
