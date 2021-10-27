import React, { useState, useEffect } from 'react';
import ItemList from '../components/ItemList';
import * as client from '../lib/api';

const ItemListContainer = () => {
  // 컴포넌트 상태 선언
  const [items, setItems] = useState([]);
  const [isLoading, setLoading] = useState(false);

  // 게시글 목록 조회
  const listItem = async () => {
    setLoading(true);
    try {
      const response = await client.fetchItemList();
      setItems(response.data);
      setLoading(false);
    } catch (e) {
      setLoading(false);
      throw e;
    }
  }
  // 마운트될 때 게시글 목록을 가져옴
  useEffect(() => {
    listItem();
  }, []);

  return <ItemList items={items} isLoading={isLoading} />;
};

export default ItemListContainer;
