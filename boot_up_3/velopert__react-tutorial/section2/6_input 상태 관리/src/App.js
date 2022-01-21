import React, { Component } from 'react';

import PhoneForm from './components/PhoneForm';

class App extends Component {
  handleCreate = (data) => {
    console.log(data);
  };

  render() {
    return (
      <div>
        <h2>리액트! 전화번호부</h2>
        <PhoneForm onCreate={this.handleCreate}/>
      </div>
    );
  }
}

export default App;
