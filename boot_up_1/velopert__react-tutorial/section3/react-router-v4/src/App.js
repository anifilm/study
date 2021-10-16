import React from 'react';
import { BrowserRouter as Router, Route } from 'react-router-dom';

import Header from './components/Header';

// route url 구성
import Home from './routes/Home';
import About from './routes/About';
import Posts from './routes/Posts';
import Login from './routes/Login';
import MyPage from './routes/MyPage';

const App = () => {
  return (
    <Router>
      <div>
        <Header />
        <Route path="/" component={Home} exact />
        <Route path="/about/:username" component={About} />
        <Route path="/posts" component={Posts} />
        <Route path="/login" component={Login} />
        <Route path="/me" component={MyPage} />
      </div>
    </Router>
  );
}

export default App;
