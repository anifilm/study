import React, { useState } from 'react';
import UserForm from './components/UserForm';

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

  // 개체 비구조화 할당 문법으로 분리하여 각각의 변수에 저장
  //const {
  //  userId,
  //  password,
  //  introduction,
  //  foreigner,
  //  gender,
  //  nationality
  //} = form;

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

    console.log('userId:', form.userId);
    console.log('password:', form.password);
    console.log('introduction:', form.introduction);
    console.log('foreigner:', form.foreigner);
    console.log('gender:', form.gender);
    console.log('nationality:', form.nationality);
  };

  return (
    <UserForm
      form={form}
      onChange={handleChange}
      onSubmit={handleSubmit}
    />
  );
}

export default App;
