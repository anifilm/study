import React from 'react';

const containerStyle = {
  width: 900,
  margin: '0 auto',
  padding: '20px 0px',
};

const Container = ({ children }) => {
  return (
    <div style={containerStyle}>
      {children}
    </div>
  );
};

export default Container;
