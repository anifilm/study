import React from 'react';
import { Link } from 'react-router-dom';

const BoardModifyForm = () => {
  return (
    <div className="container">
      <h3>작성글 수정</h3>
      <form>
        <table>
          <tbody>
            <tr>
              <td>번호</td>
              <td>
                <input type="text" value="100" disabled />
              </td>
            </tr>
            <tr>
              <td>작성일자</td>
              <td>
                <input type="text" value="2021-10-26" disabled />
              </td>
            </tr>
            <tr>
              <td>제목</td>
              <td>
                <input type="text" value="게시물 제목" />
              </td>
            </tr>
            <tr>
              <td>글쓴이</td>
              <td>
                <input type="text" value="글쓴이" disabled />
              </td>
            </tr>
            <tr>
              <td>내용</td>
              <td>
                <textarea rows="5" value="내용없음"></textarea>
              </td>
            </tr>
          </tbody>
        </table>
        <br />
        <div>
          <Link to={`/read/100`} className="waves-effect waves-light btn">취소</Link>{' '}
          <button type="submit" className="waves-effect waves-light btn blue">수정</button>{' '}
        </div>
      </form>
    </div>
  );
}

export default BoardModifyForm;
