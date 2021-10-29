import React from 'react';

const Home = () => {
  return (
    <div className="container center">
      <h2>Image Shop에 오신 것을 환영합니다.</h2>
      <p>{new Date().toString()}</p>
    </div>
  );
}

export default Home;
