import React from 'react';
import { Link } from 'react-router-dom';

const BoardRegisterForm = () => {
  return (
    <div class="container">
      <h3>새로운 글 작성</h3>
      <form>
        <table>
          <tbody>
            <tr>
              <td>제목</td>
              <td>
                <input type="text" />
              </td>
            </tr>
            <tr>
              <td>글쓴이</td>
              <td>
                <input type="text" />
              </td>
            </tr>
            <tr>
            <td>내용</td>
              <td>
                <textarea rows="5"></textarea>
              </td>
            </tr>
          </tbody>
        </table>
        <br />
        <div>
          <Link to="/" class="waves-effect waves-light btn">취소</Link>{' '}
          <button type="submit" class="waves-effect waves-light btn blue">등록</button>
        </div>
      </form>
    </div>
  );
}

export default BoardRegisterForm;
