import React, { useEffect, useState } from 'react';

const App = () => {
  const [userName, setUserName] = useState('Alex');

  // useEffect 훅: 업데이트될 때만 실행
  useEffect(() => {
    console.log('useEffect');
    console.log('userName:', userName);
  }, [userName]);

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
