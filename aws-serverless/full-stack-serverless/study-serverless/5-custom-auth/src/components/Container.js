import React from 'react';

const styles = {
  container: {
    margin: '0 auto',
    padding: '50px 100px',
  },
};

const Container = ({ children }) => {
  return (
    <div style={styles.container}>
      {children}
    </div>
  );
};

export default Container;
