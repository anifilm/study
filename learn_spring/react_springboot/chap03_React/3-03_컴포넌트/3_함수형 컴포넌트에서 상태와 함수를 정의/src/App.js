import React, { useState } from 'react';

const App = () => {
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
