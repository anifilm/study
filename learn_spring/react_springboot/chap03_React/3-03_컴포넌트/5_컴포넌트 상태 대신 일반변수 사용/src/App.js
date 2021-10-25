import React, { Component } from 'react';

class App extends Component {
  // 일반 변수 선언
  userName = 'Alex';

  handleClickTyler = () => {
    console.log('handleClickTyler');
    // 일반 변수에 값 변경 후 forceUpdate() 함수 호출
    this.userName = 'Tyler';
    this.forceUpdate();
  };
  handleClickJulian = () => {
    console.log('handleClickJulian');
    // 일반 변수에 값만 변경
    this.userName = 'Julian';
    // forceUpdate() 호출이 없다면 내부 상태값은 변경되지만
    // 화면을 다시 렌더링하지 않음
    //this.forceUpdate();
  };

  render() {
    return (
      <div>
        <h1>Hello {this.userName}!</h1>
        <button onClick={this.handleClickTyler}>Tyler</button>
        <button onClick={this.handleClickJulian}>Julian</button>
      </div>
    );
  }
}

export default App;
