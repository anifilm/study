import React from 'react';

import Container from './Container';
import protectedRoute from '../hooks/protectedRoute';

function Protected() {
  return (
    <Container>
      <h1>Protected route</h1>
    </Container>
  );
};

export default protectedRoute(Protected);
