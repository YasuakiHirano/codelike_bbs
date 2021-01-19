import { User } from '@/types';
import { UserFind } from '@/apis';

export const isUserSignIn = async () => {
  const user:User|null = await UserFind();
  if (user === null) {
    return false;
  } else {
    return true;
  }
}

export const UserSignInCheckAndRedirect = async ($nuxt :any, redirectPath:string) => {
  const user:User|null = await UserFind();
  if (user === null) {
    $nuxt.$emit('warningSnackbar', 'ログインしてから実行してください');
    $nuxt.$router.push({ path: redirectPath });
    return;
  }
}