import React from 'react';

const Container = ({ children }) => {
  return (
    <div style={containerStyle}>
      {children}
    </div>
  );
};

const containerStyle = {
  width: 900,
  margin: '0 auto',
  padding: '20px 0px',
};

export default Container;
