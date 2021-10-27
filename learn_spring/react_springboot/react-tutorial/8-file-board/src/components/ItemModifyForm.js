import React, { useState, useEffect } from 'react';
import { Link } from 'react-router-dom';

// 컴포넌트 속성값 수신
const ItemModifyForm = ({ item, isLoading, onModify }) => {
  // 컴포넌트 상태 설정
  const [title, setTitle] = useState('');
  const [content, setContent] = useState('');

  const handleChangeTitle = (e) => {
    setTitle(e.target.value);
  };
  const handleChangeContent = (e) => {
    setContent(e.target.value);
  };
  // 마운트될 때 게시글 상세정보를 자겨옴
  useEffect(() => {
    //console.log('useEffect item:', item);
    if (item) {
      //console.log('item.title:', item.title);
      //console.log('item.content:', item.content);
      setTitle(item.title);
      setContent(item.content);
    }
  }, [item]);

  // 폼 submit 이벤트 처리
  const handleSubmit = (e) => {
    e.preventDefault();
    onModify(item.itemNo, title, content);
  };

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
            </div>
            <div className="row">
              <div className="file-field input-field col s12">
                <div className="btn">
                  <span>File</span>
                  <input type="file" />
                </div>
                <div className="file-path-wrapper">
                <input class="file-path validate" type="text" placeholder="상품파일" />
                </div>
              </div>
            </div>
            <div className="row">
              <div className="input-field col s12">
                <textarea
                  id="textarea"
                  className="materialize-textarea"
                  value={content}
                  onChange={handleChangeContent}
                  style={{ height: 100 }}
                  required
                ></textarea>
                <label className="active" htmlFor="textarea">상품설명</label>
              </div>
            </div>
            <br />
            <Link to={`/read/${item.itemNo}`} className="waves-effect waves-light btn">취소</Link>{' '}
            <button type="submit"className="waves-effect waves-light btn blue">완료</button>
          </form>
        </div>
      )}
    </div>
  );
}

export default ItemModifyForm;
