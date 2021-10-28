import React, { useEffect } from 'react';
import { useDispatch, useSelector } from 'react-redux';
import { withRouter } from 'react-router';
import ItemModifyForm from '../components/ItemModifyForm';
import { fetchItem, FETCH_ITEM } from '../modules/item';

import axios from 'axios';

// match, history 객체를 전달 받음
const ItemModifyContainer = ({ match, history }) => {
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

  // 수정 처리 함수 정의
  const onModify = async (itemName, price, description, file) => {
    const itemObject = {
      itemName: itemName,
      price: price,
      description: description,
    };
    // FormData 객체 생성
    const formData = new FormData();
    formData.append('file', file);
    formData.append('item', JSON.stringify(itemObject));

    // 파일 업로드
    axios.put('/items', formData, {
      headers: {
        "Content-Type": "multipart/form-data",
      },
    }).then((res) => {
      alert('수정 되었습니다.');
      history.push('/read/' + res.data.itemId);
    }).catch((err) => {
      alert(err.response.data.msg);
    });
  };

  // 마운트될 때 제품 상세정보를 가져옴
  useEffect(() => {
    dispatch(fetchItem(itemId));
  }, [dispatch, itemId]);

  return (
    <ItemModifyForm
      item={item}
      isLoading={isLoading}
      onModify={onModify}
    />
  );
};

export default withRouter(ItemModifyContainer);
