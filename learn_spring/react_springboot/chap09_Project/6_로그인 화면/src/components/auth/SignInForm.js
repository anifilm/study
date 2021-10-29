import React from 'react';

// 로그인 폼 구성
const SignInForm = () => {
  return (
    <div className="container">
      <h3 className="center">로그인</h3>
      <form>
        <table className="centered">
          <tbody>
            <tr>
              <td>아이디</td>
              <td>
                <input type="text" />
              </td>
            </tr>
            <tr>
              <td>비밀번호</td>
              <td>
                <input type="password" />
              </td>
            </tr>
            <tr>
              <td colSpan="2">
                <button type="submit" className="waves-effect waves-light btn">로그인</button>
              </td>
            </tr>
          </tbody>
        </table>
      </form>
    </div>
  );
}

export default SignInForm;
