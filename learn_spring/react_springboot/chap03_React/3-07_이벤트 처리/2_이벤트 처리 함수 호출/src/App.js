import React, { useState } from 'react';
import UserForm from './components/UserForm';

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
    <UserForm
      userId={userId}
      password={password}
      introduction={introduction}
      foreigner={foreigner}
      gender={gender}
      nationality={nationality}
      onChangeUserId={handleChangeUserId}
      onChangePassword={handleChangePassword}
      onChangeIntroduction={handleChangeIntroduction}
      onChangeForeigner={handleChangeForeigner}
      onChangeGender={handleChangeGender}
      onChangeNationality={handleChangeNationality}
      onSubmit={handleSubmit}
    />
  );
}

export default App;
