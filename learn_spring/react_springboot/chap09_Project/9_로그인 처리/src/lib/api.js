import client from "./client";

// 최초관리자 등록 API 호출 함수
export const adminSetup = (userId, userName, userPw) => client.post('/users/setup', { userId, userName, userPw });
// 로그인 API 호출 함수
export const signIn = (userId, password) => client.post(`/api/authenticate?username=${userId}&password=${password}`);
