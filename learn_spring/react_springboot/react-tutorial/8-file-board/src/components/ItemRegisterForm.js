import React, { useState, useCallback } from 'react';
import { Link } from 'react-router-dom';

// 등록 처리 함수를 컴포넌트 속성으로 전달 받음
const ItemRegisterForm = ({ onRegister }) => {
  // 컴포넌트 상태 설정
  const [itemName, setItemName] = useState('');
  const [price, setPrice] = useState(0);
  const [description, setDescription] = useState('');
  const [file, setFile] = useState(null);

  const handleChangeItemName = useCallback((e) => {
    setItemName(e.target.value);
  }, []);
  const handleChangePrice = useCallback((e) => {
    setPrice(e.target.value);
  }, []);
  const handleChangeDescription = useCallback((e) => {
    setDescription(e.target.value);
  }, []);
  const handleChangeFile = useCallback((e) => {
    console.log(e.target.files[0]);
    setFile(e.target.files[0]);
  }, []);

  const handleSubmit = useCallback(
    (e) => {
      e.preventDefault();
      // 등록 처리 함수 호출
      onRegister(itemName, price, description, file);
    },
    [itemName, price, description, file, onRegister],
  );

  return (
    <div className="container">
      <h3>새로운 상품 등록</h3>
      <form onSubmit={handleSubmit} className="col s12">
        <div className="row">
          <div className="input-field col s7">
            <input
              type="text"
              id="title"
              value={itemName}
              onChange={handleChangeItemName}
              required
            />
            <label htmlFor="title">상품명</label>
          </div>
          <div className="input-field col s5">
            <input
              type="number"
              id="price"
              value={price}
              onChange={handleChangePrice}
              required
            />
            <label htmlFor="price">상품가격 (원)</label>
          </div>
        </div>
        <div className="row">
          <div className="file-field input-field col s12">
            <div className="btn">
              <span>File</span>
              <input type="file" onChange={handleChangeFile} />
            </div>
            <div className="file-path-wrapper">
            <input class="file-path validate" type="text" placeholder="상품 파일 등록" />
            </div>
          </div>
        </div>
        <div className="row">
          <div className="input-field col s12">
            <textarea
              id="textarea"
              className="materialize-textarea"
              value={description}
              onChange={handleChangeDescription}
              style={{ height: 100 }}
              required
            ></textarea>
            <label htmlFor="textarea">상품설명</label>
          </div>
        </div>
        <br />
        <Link to="/" className="waves-effect waves-light btn">취소</Link>{' '}
        <button type="submit" className="waves-effect waves-light btn blue">등록</button>
      </form>
    </div>
  );
};

export default ItemRegisterForm;
