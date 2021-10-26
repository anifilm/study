import React, { useState, useEffect } from 'react';
import { Link } from 'react-router-dom';

// 컴포넌트 속성값 수신
const BoardModifyForm = ({ board, isLoading, onModify }) => {
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
    //console.log('useEffect board:', board);
    if (board) {
      //console.log('board.title:', board.title);
      //console.log('board.content:', board.content);
      setTitle(board.title);
      setContent(board.content);
    }
  }, [board]);

  // 폼 submit 이벤트 처리
  const handleSubmit = (e) => {
    e.preventDefault();
    onModify(board.boardNo, title, content);
  };

  return (
    <div className="container">
      <h3>작성글 수정</h3>
      {isLoading && (
        <div className="progress">
          <div className="indeterminate"></div>
        </div>
      )}
      {!isLoading && board && (
        <form onSubmit={handleSubmit}>
          <table>
            <tbody>
              <tr>
                <td>번호</td>
                <td>
                  <input type="text" value={board.boardNo} disabled />
                </td>
              </tr>
              <tr>
                <td>작성일자</td>
                <td>
                  <input type="text" value={board.regDate} disabled />
                </td>
              </tr>
              <tr>
                <td>제목</td>
                <td>
                  <input type="text" value={title} onChange={handleChangeTitle} />
                </td>
              </tr>
              <tr>
                <td>글쓴이</td>
                <td>
                  <input type="text" value={board.writer} disabled />
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
          <div>
            <Link to={`/read/${board.boardNo}`} className="waves-effect waves-light btn">취소</Link>{' '}
            <button type="submit"className="waves-effect waves-light btn blue">완료</button>
          </div>
        </form>
      )}
    </div>
  );
}

export default BoardModifyForm;
