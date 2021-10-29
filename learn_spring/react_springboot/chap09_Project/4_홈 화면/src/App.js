import React from 'react';
import { Route } from 'react-router-dom';

import Home from './components/Home';

const App = () => {
  return <Route path="/" component={Home} exact />;
}

export default App;
