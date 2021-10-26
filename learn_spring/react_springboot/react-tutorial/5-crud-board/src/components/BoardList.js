import React from 'react';
import { Link } from 'react-router-dom';

const BoardList = () => {
  return (
    <div className="container">
      <h3>게시판 목록</h3>
      <table>
        <thead>
          <tr>
            <th width="80">번호</th>
            <th width="320">제목</th>
            <th width="100">글쓴이</th>
            <th width="180">작성일자</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>100</td>
            <td>
              <Link to="/read/100">게시물 제목</Link>
            </td>
            <td>글쓴이</td>
            <td>2021-10-26</td>
          </tr>
        </tbody>
      </table>
      <br />
      <Link to="/create" className="waves-effect waves-light btn blue">새로운 글 작성</Link>
    </div>
  );
}

export default BoardList;
