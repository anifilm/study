import React, { Component } from 'react';

class App extends Component {
  constructor(props) {
    super(props);
    // 상태 정의
    this.state = {
      userName: 'Alex',
    };
  }

  handleClickTyler = () => {
    console.log('handleClickTyler');
    // 상태 설정함수
    this.setState({
      userName: 'Tyler',
    });
  };
  handleClickJulian = () => {
    console.log('handleClickJulian');
    // 상태 설정함수
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
