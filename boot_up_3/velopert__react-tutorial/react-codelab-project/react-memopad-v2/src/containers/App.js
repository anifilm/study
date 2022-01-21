import React, { Component } from 'react';

import { Header } from '../components';

class App extends Component {
  constructor(props) {
    super(props);
  }

  render() {
    // this.props -> 아무것도 전달되지 않는다. 확인필요
    console.log(this.props);
    //let re = /(login|register)/;
    //let isAuth = re.test(this.props.location.pathname);
    const isAuth = false;

    return (
      <div>
        <Header />
        {isAuth ? 'isAuth' : 'Header'}
        {this.props.children}
      </div>
    );
  }
}

export default App;
