import React from 'react';

// props 값 수신
const UserForm = ({ form, onChange, onSubmit }) => {
  // 객체 비구조화 할당 문법으로 분리하여 각각의 변수에 저장
  const {
    userId,
    password,
    introduction,
    foreigner,
    gender,
    nationality,
  } = form;

  return (
    <form onSubmit={onSubmit}>
      <table>
        <tbody>
          <tr>
            <td>아이디</td>
            <td>
              {/* 이벤트 처리 함수 지정 */}
              <input
                type="text"
                name="userId"
                value={userId}
                onChange={onChange}
              />
            </td>
          </tr>
          <tr>
            <td>비밀번호</td>
            <td>
              {/* 이벤트 처리 함수 지정 */}
              <input
                type="password"
                name="password"
                value={password}
                onChange={onChange}
              />
            </td>
          </tr>
          <tr>
            <td>소개</td>
            <td>
              {/* 이벤트 처리 함수 지정 */}
              <textarea
                name="introduction"
                rows="5"
                value={introduction}
                onChange={onChange}
              ></textarea>
            </td>
          </tr>
          <tr>
            <td>외국인 여부</td>
            <td>
              {/* 이벤트 처리 함수 지정 */}
              <input
                type="checkbox"
                name="foreigner"
                checked={foreigner}
                onChange={onChange}
              />
            </td>
          </tr>
          <tr>
            <td>성별</td>
            <td>
              {/* 이벤트 처리 함수 지정 */}
              <input
                type="radio"
                name="gender"
                value="male"
                checked={gender === 'male'}
                onChange={onChange}
              />
              남성{' '}
              <input
                type="radio"
                name="gender"
                value="female"
                checked={gender === 'female'}
                onChange={onChange}
              />
              여성{' '}
              <input
                type="radio"
                name="gender"
                value="none"
                checked={gender === 'none'}
                onChange={onChange}
              />
              해당없음
            </td>
          </tr>
          <tr>
            <td>국적</td>
            <td>
              {/* 이벤트 처리 함수 지정 */}
              <select
                name="nationality"
                onChange={onChange}
                value={nationality}
              >
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
};

export default UserForm;
