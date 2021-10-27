import React from 'react';
import { Link } from 'react-router-dom';

// 부모 컴포넌트에서 컴포넌트 속성으로 수신
const ItemRead = ({ itemNo, item, isLoading, onRemove }) => {
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
                <input type="text" id="item-no" value={item.itemNo} disabled />
                <label className="active" htmlFor="item-no">상품번호</label>
              </div>
              <div className="input-field col s4">
                <input type="text" id="writer" value={item.writer} disabled />
                <label className="active" htmlFor="writer">상품명</label>
              </div>
              <div className="input-field col s4">
                <input type="text" id="reg-date" value={item.regDate} disabled />
                <label className="active" htmlFor="reg-date">상품가격</label>
              </div>
              <div className="input-field col s12">
                <input type="text" id="title" value={item.title} readOnly />
                <label className="active" htmlFor="title">미리보기</label>
              </div>
            </div>
            <div className="row">
              <div className="input-field col s12">
                <textarea
                  id="textarea"
                  className="materialize-textarea"
                  value={item.content}
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
          <Link to={`/edit/${itemNo}`} className="waves-effect waves-light btn blue">수정</Link>{' '}
          <button onClick={onRemove} className="waves-effect waves-light btn red right">삭제</button>
        </div>
      )}
    </div>
  );
};

export default ItemRead;
