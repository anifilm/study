import React, { useState } from 'react';

const App = () => {
  // 컴포넌트 상태 정의
  const [userId, setUserId] = useState('');
  const [password, setPassword] = useState('');
  const [introduction, setIntroduction] = useState('');
  const [foreigner, setForeigner] = useState(false);
  const [gender, setGender] = useState('male');
  const [nationality, setNationality] = useState('');

  // 이벤트 처리 함수 정의
  const handleChangeUserId = (e) => {
    setUserId(e.target.value);
  };
  const handleChangePassword = (e) => {
    setPassword(e.target.value);
  };
  const handleChangeIntroduction = (e) => {
    setIntroduction(e.target.value);
  };
  const handleChangeForeigner = () => {
    setForeigner(!foreigner);
  };
  const handleChangeGender = (e) => {
    setGender(e.target.value);
  };
  const handleChangeNationality = (e) => {
    setNationality(e.target.value);
  };
  const handleSubmit = (e) => {
    e.preventDefault();

    console.log('userId:', userId);
    console.log('password:', password);
    console.log('introduction:', introduction);
    console.log('foreigner:', foreigner);
    console.log('gender:', gender);
    console.log('nationality:', nationality);
  };

  return (
    <form onSubmit={handleSubmit}>
      <table>
        <tbody>
          <tr>
            <td>아이디</td>
            <td>
              {/* 이벤트 처리 함수 지정 */}
              <input type="text" value={userId} onChange={handleChangeUserId} />
            </td>
          </tr>
          <tr>
            <td>비밀번호</td>
            <td>
              {/* 이벤트 처리 함수 지정 */}
              <input type="password" value={password} onChange={handleChangePassword} />
            </td>
          </tr>
          <tr>
            <td>소개</td>
            <td>
              {/* 이벤트 처리 함수 지정 */}
              <textarea rows="5" value={introduction} onChange={handleChangeIntroduction}></textarea>
            </td>
          </tr>
          <tr>
            <td>외국인 여부</td>
            <td>
              {/* 이벤트 처리 함수 지정 */}
              <input type="checkbox" checked={foreigner} onChange={handleChangeForeigner} />
            </td>
          </tr>
          <tr>
            <td>성별</td>
            <td>
              {/* 이벤트 처리 함수 지정 */}
              <input type="radio" value="male" checked={gender === 'male'} onChange={handleChangeGender} />
              남성{' '}
              <input type="radio" value="female" checked={gender === 'female'} onChange={handleChangeGender} />
              여성{' '}
              <input type="radio" value="none" checked={gender === 'none'} onChange={handleChangeGender} />
              해당없음
            </td>
          </tr>
          <tr>
            <td>국적</td>
            <td>
              {/* 이벤트 처리 함수 지정 */}
              <select onChange={handleChangeNationality} value={nationality}>
                <option value="">Please select one</option>
                <option value="01">Korea</option>
                <option value="02">Germany</option>
                <option value="02">Australia</option>
              </select>
            </td>
          </tr>
        </tbody>
      </table>
      <div>
        <button type="submit">등록</button>
      </div>
    </form>
  );
}

export default App;
