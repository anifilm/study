import React, { Component } from 'react';
import logo from './logo.svg';
import '../App.css';

import { inject, observer } from 'mobx-react';

@inject('TodoStore')
@observer
class App extends Component {
  render() {
    const TodoStore = this.props.TodoStore;

    return (
      <div className="App">
        <header className="App-header">
          <img src={logo} className="App-logo" alt="logo" />
        </header>
        <div className="Todo-container">

        </div>
      </div>
    );
  }
}

export default App;
