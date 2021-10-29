import React from 'react';
import { Route } from 'react-router-dom';

import HomePage from './pages/HomePage';
import SignInPage from './pages/auth/SignInPage';
import AdminSetupPage from './pages/member/AdminSetupPage';

const App = () => {
  return (
    <div>
      <Route path="/" component={HomePage} exact />
      <Route path="/signin" component={SignInPage} exact />
      <Route path="/member/setup" component={AdminSetupPage} />
    </div>
  );
}

export default App;
