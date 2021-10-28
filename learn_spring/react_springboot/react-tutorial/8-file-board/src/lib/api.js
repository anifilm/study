import axios from 'axios';

export const fetchItemApi = (itemId) => {
  return axios.get(`/items/${itemId}`);
};
export const fetchItemListApi = () => {
  return axios.get('/items');
};
export const removeItemApi = (itemId) => {
  return axios.delete(`/items/${itemId}`);
};
