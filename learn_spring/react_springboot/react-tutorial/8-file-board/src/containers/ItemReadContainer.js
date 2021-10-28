import React, { useEffect } from 'react';
import { useDispatch, useSelector } from 'react-redux';
import { withRouter } from 'react-router';
import ItemRead from '../components/ItemRead';
import { fetchItem, FETCH_ITEM } from '../modules/item';
import { removeItemApi } from '../lib/api';

// match 객체의 params 값을 참조
const ItemReadContainer = ({ match, history }) => {
  // match 객체의 params 속성값을 참조
  const { itemId } = match.params;

  // 스토어 dispatch 사용
  const dispatch = useDispatch();
  // 스토어 상태 조회
  const { item, isLoading } = useSelector(({ item, loading }) => {
    return {
      item: item.item,
      isLoading: loading[FETCH_ITEM],
    };
  });

  // 삭제 처리 함수 정의
  const onRemove = async () => {
    try {
      // 상품 삭제 API 호출
      await removeItemApi(itemId);
      alert('삭제되었습니다.');
      // 목록 화면으로 이동
      history.push('/');
    } catch (e) {
      console.log(e);
    }
  };

  // 마운트될 때 상품 상세정보를 가져옴
  useEffect(() => {
    dispatch(fetchItem(itemId));
  }, [dispatch, itemId]);

  return (
    <ItemRead
      ItemId={itemId}
      Item={item}
      isLoading={isLoading}
      onRemove={onRemove}
    />
  );
};

export default withRouter(ItemReadContainer);
