import React from 'react';
import { Link } from 'react-router-dom';

// 부모 컴포넌트에서 컴포넌트 속성으로 수신
const ItemRead = ({ itemId, item, isLoading, onRemove }) => {
  // 이미지 표시 URL 생성
  const pictureUrl = (itemId) => {
    return (
      `/items/display?itemId=${itemId}&timestamp=${new Date().getTime()}`
    );
  };

  return (
    <div className="container">
      <h3>상품 상세보기</h3>
      {isLoading && (
        <div className="progress">
          <div className="indeterminate"></div>
        </div>
      )}
      {!isLoading && item && (
        <div className="row">
          <div className="col s12">
            <div className="row">
              <div className="input-field col s4">
                <input type="text" id="item-id" value={item.itemId} disabled />
                <label className="active" htmlFor="item-id">상품번호</label>
              </div>
              <div className="input-field col s4">
                <input type="text" id="item-name" value={item.itemName} disabled />
                <label className="active" htmlFor="item-name">상품명</label>
              </div>
              <div className="input-field col s4">
                <input type="text" id="price" value={item.price} disabled />
                <label className="active" htmlFor="price">상품가격</label>
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
                  value={item.description}
                  readOnly
                  style={{ height: 100 }}
                ></textarea>
                <label className="active" htmlFor="textarea">상품설명</label>
              </div>
            </div>
          </div>
          <br />
          <Link to="/" className="waves-effect waves-light btn">
            상품목록
          </Link>{' '}
          <Link to={`/edit/${itemId}`} className="waves-effect waves-light btn blue">수정</Link>{' '}
          <button onClick={onRemove} className="waves-effect waves-light btn red right">삭제</button>
        </div>
      )}
    </div>
  );
};

export default ItemRead;
