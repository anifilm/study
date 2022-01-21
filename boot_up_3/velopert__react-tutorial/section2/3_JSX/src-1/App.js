import React, { Component } from 'react';

class App extends Component {
  render() {
    const name = 'velopert!';
    return (
      <div>
        { name === 'velopert!' && <div>벨로퍼트!</div> }
      </div>
    );
  }
}

export default App;
