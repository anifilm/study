import axios from 'axios';

export const registerItem = (title, content, writer) => {
  return axios.post('/items', { title, content, writer });
};
export const fetchItem = (itemNo) => {
  return axios.get(`/items/${itemNo}`);
};
export const fetchItemList = () => {
  return axios.get('/items');
};
export const removeItem = (itemNo) => {
  return axios.delete(`/items/${itemNo}`);
};
export const modifyItem = (itemNo, title, content) => {
  return axios.put(`/items/${itemNo}`, { title, content })
}
