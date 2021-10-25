import React, { useEffect, useState } from 'react';

const App = () => {
  const [userName, setUserName] = useState('Alex');

  // 마운트될 때와 값이 변경될 때 실행
  useEffect(() => {
    console.log('useEffect');
    console.log('userName:', userName);
  });

  const handleClickTyler = () => {
    setUserName('Tyler');
  };
  const handleClickJulian = () => {
    setUserName('Julian');
  };

  console.log('App userName:', userName);

  return (
    <div>
      <h1>Hello {userName}!</h1>
      <button onClick={handleClickTyler}>Tyler</button>
      <button onClick={handleClickJulian}>Julian</button>
    </div>
  );
};

export default App;
