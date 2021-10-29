import React, { useState, useCallback } from 'react';

// 등록 처리 함수를 컴포넌트 속성으로 전달받음
const AdminSetupForm = ({ onRegister }) => {
  // 컴포넌트 상태 설정
  const [userId, setUserId] = useState('');
  const [password, setPassword] = useState('');
  const [userName, setUserName] = useState('');

  // 회원 아이디의 변경을 처리하는 함수
  const handleChangeUserId = useCallback((e) => {
    setUserId(e.target.value);
  }, []);
  // 비밀번호의 변경을 처리하는 함수
  const handleChangePassword = useCallback((e) => {
    setPassword(e.target.value);
  }, []);
  // 사용자명의 변경을 처리하는 함수
  const handleChangeUserName = useCallback((e) => {
    setUserName(e.target.value);
  }, []);

  // 폼 submit 이벤트 처리
  const handleSubmit = useCallback((e) => {
    e.preventDefault();
    onRegister(userId, userName, password);
  }, [userId, userName, password, onRegister]);

  // 회원 등록 폼 화면 표시
  return (
    <div className="container">
      <h3 className="center">최초관리자 등록</h3>
      <br />
      <form onSubmit={handleSubmit}>
        <div className="row">
          <div className="col s6 offset-s3">
            <div>
              <div>관리자이름</div>
              <div>
                <input type="text" value={userName} onChange={handleChangeUserName} />
              </div>
            </div>
            <div>
              <div>관리자아이디</div>
              <div>
                <input type="text" value={userId} onChange={handleChangeUserId} />
              </div>
            </div>
            <div>
              <div>비밀번호</div>
              <div>
                <input type="password" value={password} onChange={handleChangePassword} />
              </div>
            </div>
          </div>
        </div>
        <div className="row">
          <div className="col s12">
            <div className="center">
              <button type="submit" className="waves-effect waves-light btn">등록</button>
            </div>
          </div>
        </div>
      </form>
    </div>
  );
};

export default AdminSetupForm;
