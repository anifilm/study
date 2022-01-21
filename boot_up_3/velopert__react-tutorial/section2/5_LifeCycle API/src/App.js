import React, { Component } from 'react';

import MyComponent from './components/MyComponent';

class App extends Component {
  state = {
    counter: 1
  };

  constructor(props) {
    super(props);
    console.log('constructor');
  }

  componentDidMount() {
    // 외부 라이브러리 연동: D3, masonry, etc
    // 컴포넌트에서 필요한 데이터 요청: Ajax, GraphQL, etc
    // DOM 에 관련된 작업: 스크롤 설정, 크기 읽어오기 등
    console.log('componentDidMount');
  }

  handleClick = () => {
    this.setState({
      counter: this.state.counter + 1
    });
  }

  render() {
    return (
      <div>
        <h1>안녕하세요. 리액트!</h1>
        {this.state.counter <= 10 && <MyComponent value={this.state.counter} />}
        <button onClick={this.handleClick}>Click Me</button>
      </div>
    );
  }
}

export default App;
