import React from 'react';
import { withRouter } from 'react-router-dom';
import ItemRegisterForm from '../components/ItemRegisterForm';
import axios from 'axios';

// withRouter 함수의 기능이 적용되어 속성으로 history를 전달받음
const ItemRegisterContainer = ({ history }) => {
  // 등록 정보 전달
  const onRegister = async (itemName, price, description, file) => {
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
    axios
      .post('/items', formData, {
        headers: {
          'Content-Type': 'multipart/form-data',
        },
      })
      .then((res) => {
        alert('등록 되었습니다.');
        history.push('/read/' + res.data.itemId);
      })
      .catch((err) => {
        alert(err);
      });
  };

  return <ItemRegisterForm onRegister={onRegister} />;
};

export default withRouter(ItemRegisterContainer);
