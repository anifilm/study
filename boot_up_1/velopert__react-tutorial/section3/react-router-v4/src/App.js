import React from 'react';
import { BrowserRouter as Router, Route } from 'react-router-dom';

import Header from './components/Header';

import Home from './routes/Home';
import About from './routes/About';

const App = () => {
  return (
    <Router>
      <div>
        <Header />
        <Route path="/" component={Home} exact />
        <Route path="/about" component={About} />
      </div>
    </Router>
  );
}

export default App;
