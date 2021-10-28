import React, { useState, useEffect, useCallback } from 'react';
import { Link } from 'react-router-dom';

// 컴포넌트 속성값 수신
const ItemModifyForm = ({ item, isLoading, onModify }) => {
  // 컴포넌트 상태 설정
  const [itemName, setItemName] = useState('');
  const [price, setPrice] = useState(0);
  const [description, setDescription] = useState('');
  const [file, setFile] = useState(null);

  const handleChangeItemName = (e) => {
    setItemName(e.target.value);
  };
  const handleChangePrice = (e) => {
    setPrice(e.target.value);
  };
  const handleChangeDescription = (e) => {
    setDescription(e.target.value);
  };
  const handleChangeFile = useCallback((e) => {
    setFile(e.target.files[0]);
  }, []);

  // 이미지 표시 URL 생성
  const pictureUrl = (itemId) => {
    return (
      `/items/display?itemId=${itemId}&timestamp=${new Date().getTime()}`
    );
  };

  // 폼 submit 이벤트 처리
  const handleSubmit = (e) => {
    e.preventDefault();
    console.log(`${itemName} ${price} ${description}`);
    console.log(file);
    onModify(itemName, price, description, file);
  };

  // 마운트될 때 상품 상세정보를 가져옴
  useEffect(() => {
    if (item) {
      setItemName(item.itemName);
      setPrice(item.price);
      setDescription(item.description);
    }
  }, [item]);

  return (
    <div className="container">
      <h3>상품 수정</h3>
      {isLoading && (
        <div className="progress">
          <div className="indeterminate"></div>
        </div>
      )}
      {!isLoading && item && (
        <div className="row">
          <form onSubmit={handleSubmit} className="col s12">
            <div className="row">
              <div className="input-field col s4">
                <input type="text" id="item-id" value={item.itemId} disabled />
                <label className="active" htmlFor="item-id">상품번호</label>
              </div>
              <div className="input-field col s4">
                <input type="text" id="item-name" value={itemName} onChange={handleChangeItemName} />
                <label className="active" htmlFor="item-name">상품명</label>
              </div>
              <div className="input-field col s4">
                <input type="text" id="price" value={price} onChange={handleChangePrice} />
                <label className="active" htmlFor="price">상품가격 (원)</label>
              </div>
            </div>
            <div className="row">
              <div className="file-field input-field col s12">
                <div className="btn">
                  <span>File</span>
                  <input type="file" onChange={handleChangeFile} />
                </div>
                <div className="file-path-wrapper">
                <input class="file-path validate" type="text" placeholder="상품파일" />
                </div>
              </div>
              <div className="input-field col s12">
                <img src={pictureUrl()} alt="" width="200" />
                <input type="text" id="image" readOnly />
                <label className="active" htmlFor="image">미리보기</label>
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
                <label className="active" htmlFor="textarea">상품설명</label>
              </div>
            </div>
            <br />
            <Link to={`/read/${item.itemId}`} className="waves-effect waves-light btn">취소</Link>{' '}
            <button type="submit"className="waves-effect waves-light btn blue">완료</button>
          </form>
        </div>
      )}
    </div>
  );
}

export default ItemModifyForm;
