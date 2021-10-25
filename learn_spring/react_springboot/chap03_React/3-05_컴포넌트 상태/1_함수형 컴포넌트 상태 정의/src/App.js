import React, { useState } from 'react';

const App = () => {
  // 상태와 설정함수를 정의
  const [userName, setUserName] = useState('Alex');

  const handleClickTyler = () => {
    setUserName('Tyler');
  };
  const handleClickJulian = () => {
    setUserName('Julian');
  };

  return (
    <div>
      <h1>Hello {userName}!</h1>
      <button onClick={handleClickTyler}>Tyler</button>
      <button onClick={handleClickJulian}>Julian</button>
    </div>
  );
};

export default App;
