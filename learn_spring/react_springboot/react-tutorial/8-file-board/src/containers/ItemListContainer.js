import React, { useEffect } from 'react';
import { useDispatch, useSelector } from 'react-redux';
import ItemList from '../components/ItemList';
import { fetchItemList, FETCH_ITEM_LIST } from '../modules/item';

const ItemListContainer = () => {
  // 스토어 dispatch 사용
  const dispatch = useDispatch();
  // 스토어 상태 조회
  const { items, isLoading } = useSelector(({ item, loading }) => {
    return {
      items: item.items,
      isLoading: loading[FETCH_ITEM_LIST],
    };
  });

  // 마운트될 때 상품 목록을 가져옴
  useEffect(() => {
    dispatch(fetchItemList());
  }, [dispatch]);

  return <ItemList items={items} isLoading={isLoading} />;
};

export default ItemListContainer;
