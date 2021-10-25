import React from 'react';
import { Route } from 'react-router-dom';

import BoardListContainer from './components/BoardListContainer';
import BoardRegisterContainer from './components/BoardRegisterContainer';
import BoardModifyContainer from './components/BoardModifyContainer';
import BoardReadContainer from './components/BoardReadContainer';

const App = () => {
  return (
    <div>
      <Route path="/" component={BoardListContainer} exact />
      <Route path="/create" component={BoardRegisterContainer} />
      <Route path="/edit/:boardNo" component={BoardModifyContainer} />
      <Route path="/read/:boardNo" component={BoardReadContainer} />
    </div>
  );
}

export default App;
