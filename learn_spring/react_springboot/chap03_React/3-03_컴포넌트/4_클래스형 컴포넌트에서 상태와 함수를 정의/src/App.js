import React, { Component } from 'react';

class App extends Component {
  constructor(props) {
    super(props);
    this.state = {
      userName: 'Alex',
    };
  }

  // 화살표함수를 사용하여 함수 정의
  handleClickTyler = () => {
    console.log('handleClickTyler');
    this.setState({
      userName: 'Tyler',
    });
  };
  handleClickJulian = () => {
    console.log('handleClickJulian');
    this.setState({
      userName: 'Julian',
    });
  };

  render() {
    const { userName } = this.state;
    return (
      <div>
        <h1>Hello {userName}!</h1>
        <button onClick={this.handleClickTyler}>Tyler</button>
        <button onClick={this.handleClickJulian}>Julian</button>
      </div>
    );
  }
}

export default App;
