import React, { useState, useEffect } from 'react';
import { withRouter } from 'react-router';
import ItemModifyForm from '../components/ItemModifyForm';
import * as client from '../lib/api';

// match, history 객체를 전달 받음
const ItemModifyContainer = ({ match, history }) => {
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

  // 수정 처리 함수 정의
  const onModify = async (itemNo, title, content) => {
    try {
      await client.modifyItem(itemNo, title, content);
      alert('수정되었습니다.');
      history.push('/read/' + itemNo);
    } catch (e) {
      console.log(e);
    }
  };

  return (
    <ItemModifyForm item={item} isLoading={isLoading} onModify={onModify} />
  );
};

export default withRouter(ItemModifyContainer);
