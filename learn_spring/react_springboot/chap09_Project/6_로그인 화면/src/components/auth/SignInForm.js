import React from 'react';

// 로그인 폼 구성
const SignInForm = () => {
  return (
    <div className="container">
      <h3 className="center">로그인</h3>
      <br />
      <form>
        <div className="row">
          <div className="col s6 offset-s3">
            <div>
              <div>아이디</div>
              <div>
                <input type="text" />
              </div>
            </div>
            <div>
              <div>비밀번호</div>
              <div>
                <input type="password" />
              </div>
            </div>
          </div>
        </div>
        <div className="row">
          <div className="col s12">
            <div className="center">
              <button type="submit" className="waves-effect waves-light btn">로그인</button>
            </div>
          </div>
        </div>
      </form>
    </div>
  );
}

export default SignInForm;
