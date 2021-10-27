import React, { useState, useCallback } from 'react';
import { Link } from 'react-router-dom';

// 등록 처리 함수를 컴포넌트 속성으로 전달 받음
const ItemRegisterForm = ({ onRegister }) => {
  // 컴포넌트 상태 설정
  const [title, setTitle] = useState('');
  const [content, setContent] = useState('');
  const [writer, setWriter] = useState('');

  const handleChangeTitle = useCallback((e) => {
    setTitle(e.target.value);
  }, []);
  const handleChangeContent = useCallback((e) => {
    setContent(e.target.value);
  }, []);
  const handleChangeWriter = useCallback((e) => {
    setWriter(e.target.value);
  }, []);

  const handleSubmit = useCallback(
    (e) => {
      e.preventDefault();
      // 등록 처리 함수 호출
      onRegister(title, content, writer);
    },
    [title, content, writer, onRegister],
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
              value={title}
              onChange={handleChangeTitle}
              required
            />
            <label htmlFor="title">상품명</label>
          </div>
          <div className="input-field col s5">
            <input
              type="text"
              //id="writer"
              //value={writer}
              //onChange={handleChangeWriter}
              required
            />
            <label htmlFor="writer">상품가격 (원)</label>
          </div>
        </div>
        <div className="row">
          <div className="file-field input-field col s12">
            <div className="btn">
              <span>File</span>
              <input type="file" />
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
              value={content}
              onChange={handleChangeContent}
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
