import React, { Component } from 'react';
import './App.css';

import MyName from './components/MyName';

class App extends Component {
  render() {
    return (
      <>
        <div className="App">리액트</div>
        <MyName name="리액트" />
        <MyName />
      </>
    );
  }
}

export default App;
