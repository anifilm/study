import React from 'react';
import { Link } from 'react-router-dom';

// 부모 컴포넌트에서 컴포넌트 속성으로 수신
const BoardRead = ({ boardNo, board, isLoading, onRemove }) => {
  return (
    <div className="container">
      <h3>작성글 상세보기</h3>
      {isLoading && '로딩중...'}
      {!isLoading && board && (
        <>
          <table>
            <tbody>
              <tr>
                <td>번호</td>
                <td>
                  <input type="text" value={board.boardNo} readOnly />
                </td>
              </tr>
              <tr>
                <td>작성일자</td>
                <td>
                  <input type="text" value={board.regDate} readOnly />
                </td>
              </tr>
              <tr>
                <td>제목</td>
                <td>
                  <input type="text" value={board.title} readOnly />
                </td>
              </tr>
              <tr>
                <td>글쓴이</td>
                <td>
                  <input type="text" value={board.writer} readOnly />
                </td>
              </tr>
              <tr>
                <td>내용</td>
                <td>
                  <textarea value={board.content} readOnly></textarea>
                </td>
              </tr>
            </tbody>
          </table>
          <br />
          <Link to="/" className="waves-effect waves-light btn">
            글 목록
          </Link>{' '}
          <Link to={`/edit/${boardNo}`} className="waves-effect waves-light btn blue">수정</Link>{' '}
          <button onClick={onRemove} className="waves-effect waves-light btn red right">삭제</button>
        </>
      )}
    </div>
  );
};

export default BoardRead;
