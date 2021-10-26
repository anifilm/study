import React, { useState, useCallback } from 'react';
import { Link } from 'react-router-dom';

// 등록 처리 함수를 컴포넌트 속성으로 전달 받음
const BoardRegisterForm = ({ onRegister }) => {
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

  const handleSubmit = useCallback((e) => {
    e.preventDefault();
    // 등록 처리 함수 호출
    onRegister(title, content, writer);
  }, [title, content, writer, onRegister]);

  return (
    <div className="container">
      <h3>새로운 글 작성</h3>
      <form onSubmit={handleSubmit}>
        <table>
          <tbody>
            <tr>
              <td>제목</td>
              <td>
                <input type="text" value={title} onChange={handleChangeTitle} />
              </td>
            </tr>
            <tr>
              <td>글쓴이</td>
              <td>
                <input type="text" value={writer} onChange={handleChangeWriter} />
              </td>
            </tr>
            <tr>
            <td>내용</td>
              <td>
                <textarea rows="5" value={content} onChange={handleChangeContent}></textarea>
              </td>
            </tr>
          </tbody>
        </table>
        <br />
        <Link to="/" className="waves-effect waves-light btn">취소</Link>{' '}
        <button type="submit" className="waves-effect waves-light btn blue">등록</button>
      </form>
    </div>
  );
}

export default BoardRegisterForm;
