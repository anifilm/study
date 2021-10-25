import React from 'react';

// props 값 수신
const UserForm = ({
  userId,
  password,
  introduction,
  foreigner,
  gender,
  nationality,
  onChangeUserId,
  onChangePassword,
  onChangeIntroduction,
  onChangeForeigner,
  onChangeGender,
  onChangeNationality,
  onSubmit,
}) => {
  return (
    <form onSubmit={onSubmit}>
      <table>
        <tbody>
          <tr>
            <td>아이디</td>
            <td>
              {/* 이벤트 처리 함수 지정 */}
              <input type="text" value={userId} onChange={onChangeUserId} />
            </td>
          </tr>
          <tr>
            <td>비밀번호</td>
            <td>
              {/* 이벤트 처리 함수 지정 */}
              <input type="password" value={password} onChange={onChangePassword} />
            </td>
          </tr>
          <tr>
            <td>소개</td>
            <td>
              {/* 이벤트 처리 함수 지정 */}
              <textarea rows="5" value={introduction} onChange={onChangeIntroduction}></textarea>
            </td>
          </tr>
          <tr>
            <td>외국인 여부</td>
            <td>
              {/* 이벤트 처리 함수 지정 */}
              <input type="checkbox" checked={foreigner} onChange={onChangeForeigner} />
            </td>
          </tr>
          <tr>
            <td>성별</td>
            <td>
              {/* 이벤트 처리 함수 지정 */}
              <input type="radio" value="male" checked={gender === 'male'} onChange={onChangeGender} />
              남성{' '}
              <input type="radio" value="female" checked={gender === 'female'} onChange={onChangeGender} />
              여성{' '}
              <input type="radio" value="none" checked={gender === 'none'} onChange={onChangeGender} />
              해당없음
            </td>
          </tr>
          <tr>
            <td>국적</td>
            <td>
              {/* 이벤트 처리 함수 지정 */}
              <select onChange={onChangeNationality} value={nationality}>
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

export default UserForm;
