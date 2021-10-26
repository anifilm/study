import axios from 'axios';

export const registerBoard = (title, content, writer) => {
  return axios.post('/boards', { title, content, writer });
};
export const fetchBoard = (boardNo) => {
  return axios.get(`/boards/${boardNo}`);
};
export const fetchBoardList = () => {
  return axios.get('/boards');
};
export const removeBoard = (boardNo) => {
  return axios.delete(`/boards/${boardNo}`);
};
export const modifyBoard = (boardNo, title, content) => {
  return axios.put(`/boards/${boardNo}`, { title, content })
}
