import React from 'react';
import { Route } from 'react-router-dom';

import BoardListContainer from './containers/BoardListContainer';
import BoardRegisterContainer from './containers/BoardRegisterContainer';
import BoardModifyContainer from './containers/BoardModifyContainer';
import BoardReadContainer from './containers/BoardReadContainer';

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
