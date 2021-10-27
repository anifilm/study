import React, { useState, useEffect } from 'react';
import { Link } from 'react-router-dom';

// 컴포넌트 속성값 수신
const BoardModifyForm = ({
  //title,
  //content,
  board,
  isLoading,
  //onChangeTitle,
  //onChangeContent,
  onModify,
}) => {
  // 컴포넌트 상태 정의
  const [title, setTitle] = useState('');
  const [content, setContent] = useState('');

  // 제목의 변경을 처리하는 함수
  const handleChangeTitle = (e) => {
    //onChangeTitle(e.target.value);
    setTitle(e.target.value); // 제목 상태값 변경
  };
  // 내용의 변경을 처리하는 함수
  const handleChangeContent = (e) => {
    //onChangeContent(e.target.value);
    setContent(e.target.value); // 내용 상태값 변경
  };

  // 폼 submit 이벤트 처리
  const handleSubmit = (e) => {
    e.preventDefault();
    onModify(board.boardNo, title, content);
  };

  // 마운트될 때 기존의 제목, 내용을 가져옴
  useEffect(() => {
    if (board) {
      setTitle(board.title);
      setContent(board.content);
    }
  }, [board]);

  return (
    <div className="container">
      <h3>작성글 수정</h3>
      {isLoading && (
        <div className="progress">
          <div className="indeterminate"></div>
        </div>
      )}
      {!isLoading && board && (
        <div className="row">
          <form onSubmit={handleSubmit} className="col s12">
            <div className="row">
              <div className="input-field col s4">
                <input type="text" id="board-no" value={board.boardNo} disabled />
                <label className="active" htmlFor="board-no">번호</label>
              </div>
              <div className="input-field col s4">
                <input type="text" id="writer" value={board.writer} disabled />
                <label className="active" htmlFor="writer">글쓴이</label>
              </div>
              <div className="input-field col s4">
                <input type="text" id="reg-date" value={board.regDate} disabled />
                <label className="active" htmlFor="reg-date">작성일자</label>
              </div>
              <div className="input-field col s12">
                <input
                  type="text"
                  id="title"
                  value={title}
                  onChange={handleChangeTitle}
                  required
                />
                <label className="active" htmlFor="title">제목</label>
              </div>
            </div>
            <div className="row">
              <div className="input-field col s12">
                <textarea
                  id="textarea"
                  className="materialize-textarea"
                  value={content}
                  onChange={handleChangeContent}
                  style={{ height: 200 }}
                  required
                ></textarea>
                <label className="active" htmlFor="textarea">내용</label>
              </div>
            </div>
            <br />
            <Link to={`/read/${board.boardNo}`} className="waves-effect waves-light btn">취소</Link>{' '}
            <button type="submit"className="waves-effect waves-light btn blue">완료</button>
          </form>
        </div>
      )}
    </div>
  );
}

export default BoardModifyForm;
