import axios from 'axios';

export const registerBoardApi = (title, content, writer) => {
  return axios.post('/boards', { title, content, writer });
};
export const fetchBoardApi = (boardNo) => {
  return axios.get(`/boards/${boardNo}`);
};
export const fetchBoardListApi = () => {
  return axios.get('/boards');
};
export const removeBoardApi = (boardNo) => {
  return axios.delete(`/boards/${boardNo}`);
};
export const modifyBoardApi = (boardNo, title, content) => {
  return axios.put(`/boards/${boardNo}`, { title, content })
}
