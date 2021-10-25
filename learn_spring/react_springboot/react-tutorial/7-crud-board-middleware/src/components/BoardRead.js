import React from 'react';
import { Link } from 'react-router-dom';

const BoardRead = () => {
  return (
    <div class="container">
      <h3>작성글 상세보기</h3>
      <table>
        <tbody>
          <tr>
            <td>번호</td>
            <td>
              <input type="text" value="100" readOnly />
            </td>
          </tr>
          <tr>
            <td>작성일자</td>
            <td>
              <input type="text" value="2021-10-26" readOnly />
            </td>
          </tr>
          <tr>
            <td>제목</td>
            <td>
              <input type="text" value="게시물 제목" readOnly />
            </td>
          </tr>
          <tr>
            <td>글쓴이</td>
            <td>
              <input type="text" value="글쓴이" readOnly />
            </td>
          </tr>
          <tr>
            <td>내용</td>
            <td>
              <textarea value="내용없음" readOnly></textarea>
            </td>
          </tr>
        </tbody>
      </table>
      <br />
      <div>
        <Link to="/" class="waves-effect waves-light btn">글 목록</Link>{' '}
        <Link to={`/edit/100`} class="waves-effect waves-light btn blue">수정</Link>{' '}
        <button class="waves-effect waves-light btn red right">삭제</button>{' '}
      </div>
    </div>
  );
}

export default BoardRead;
