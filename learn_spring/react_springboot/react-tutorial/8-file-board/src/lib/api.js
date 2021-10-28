import axios from 'axios';

export const registerItemApi = (title, content, writer) => {
  return axios.post('/items', { title, content, writer });
};
export const fetchItemApi = (itemId) => {
  return axios.get(`/items/${itemId}`);
};
export const fetchItemListApi = () => {
  return axios.get('/items');
};
export const removeItemApi = (itemId) => {
  return axios.delete(`/items/${itemId}`);
};
export const modifyItemApi = (itemId, title, content) => {
  return axios.put(`/items/${itemId}`, { title, content })
}
