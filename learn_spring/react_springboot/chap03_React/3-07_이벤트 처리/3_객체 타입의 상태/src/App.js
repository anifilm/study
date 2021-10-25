import React, { useState } from 'react';

const App = () => {
  // 객체 타입의 컴포넌트 상태(form) 정의
  const [form, setForm] = useState({
    userId: '',
    password: '',
    introduction: '',
    foreigner: false,
    gender: '',
    nationality: '',
  });

  // 객체 비구조화 할당 문법으로 분리하여 각각의 변수에 저장
  const {
    userId,
    password,
    introduction,
    foreigner,
    gender,
    nationality,
  } = form;

  // 입력 요소 이벤트 처리 함수 정의
  const handleChange = (e) => {
    let inputValue = '';
    if (e.target.name === 'foreigner') {
      console.log('e.target.value:', e.target.value);
      console.log('e.target.checked:', e.target.checked);
      inputValue = !(e.target.value === 'true');
    } else {
      inputValue = e.target.value;
    }

    const nextForm = {
      ...form,
      [e.target.name]: inputValue,
    };

    setForm(nextForm);
  }
  // 폼 submit 이벤트 처리 함수 정의
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
              <input type="text" name="userId" value={userId} onChange={handleChange} />
            </td>
          </tr>
          <tr>
            <td>비밀번호</td>
            <td>
              {/* 이벤트 처리 함수 지정 */}
              <input type="password" name="password" value={password} onChange={handleChange} />
            </td>
          </tr>
          <tr>
            <td>소개</td>
            <td>
              {/* 이벤트 처리 함수 지정 */}
              <textarea name="introduction" rows="5" value={introduction} onChange={handleChange}></textarea>
            </td>
          </tr>
          <tr>
            <td>외국인 여부</td>
            <td>
              {/* 이벤트 처리 함수 지정 */}
              <input type="checkbox" name="foreigner" checked={foreigner} onChange={handleChange} />
            </td>
          </tr>
          <tr>
            <td>성별</td>
            <td>
              {/* 이벤트 처리 함수 지정 */}
              <input type="radio" name="gender" value="male" checked={gender === 'male'} onChange={handleChange} />
              남성{' '}
              <input type="radio" name="gender" value="female" checked={gender === 'female'} onChange={handleChange} />
              여성{' '}
              <input type="radio" name="gender" value="none" checked={gender === 'none'} onChange={handleChange} />
              해당없음
            </td>
          </tr>
          <tr>
            <td>국적</td>
            <td>
              {/* 이벤트 처리 함수 지정 */}
              <select name="nationality" onChange={handleChange} value={nationality}>
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
