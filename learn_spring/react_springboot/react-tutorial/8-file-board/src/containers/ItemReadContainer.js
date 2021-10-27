import React, { useState, useEffect } from 'react';
import { withRouter } from 'react-router';
import ItemRead from '../components/ItemRead';
import * as client from '../lib/api';

// match 객체의 params 값을 참조
const ItemReadContainer = ({ match, history }) => {
  // match 객체의 params 속성값을 참조
  const { itemNo } = match.params;
  // 컴포넌트 상태 선언
  const [item, setItem] = useState(null);
  const [isLoading, setLoading] = useState(false);

  // 게시글 상세 조회
  const readItem = async (itemNo) => {
    setLoading(true);
    try {
      const response = await client.fetchItem(itemNo);
      setItem(response.data);
      setLoading(false);
    } catch (e) {
      throw e;
    }
  };
  // 마운트될 때 게시글 상세정보를 가져옴
  useEffect(() => {
    readItem(itemNo);
  }, [itemNo]);

  // 삭제 처리 함수 정의
  const onRemove = async () => {
    //console.log('itemNo:', itemNo);
    try {
      // 게시글 삭제 API 호출
      await client.removeItem(itemNo);
      alert('삭제되었습니다.');
      // 목록 화면으로 이동
      history.push('/');
    } catch (e) {
      console.log(e);
    }
  };

  return (
    <ItemRead
      ItemNo={itemNo}
      Item={item}
      isLoading={isLoading}
      onRemove={onRemove}
    />
  );
};

export default withRouter(ItemReadContainer);
