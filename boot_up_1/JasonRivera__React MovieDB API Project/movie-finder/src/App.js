import React, { Component } from 'react';
import Nav from './components/Nav';

class App extends Component {
  render() {
    return (
      <div className="App">
        <Nav />
        <h1>Movie Finder</h1>
      </div>
    );
  }
}

export default App;
