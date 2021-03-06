import React, { Component } from 'react';

class MyComponent extends Component {
  state = {
    value: 0
  };

  static getDerivedStateFromProps(nextProps, prevState) {
    console.log('getDerivedStateFromProps', nextProps, prevState);
    // 여기서는 setState 를 하는 것이 아니라
    // 특정 props 가 바뀔 때 설정하고 설정하고 싶은 state 값을 리턴하는 형태로
    // 사용됩니다.
    if (nextProps.value !== prevState.value) {
      return {
        value: nextProps.value
      };
    }
    return null; // null 을 리턴하면 따로 업데이트 할 것은 없다라는 의미
  }

  shouldComponentUpdate(nextProps, nextState) {
    console.log('shouldComponentUpdate', nextProps, nextState);
    // return false 하면 업데이트를 안함 (상태값은 변경된다. 불필요한 리렌더링을 방지!)
    // return this.props.checked !== nextProps.checked
    if (nextProps.value > 10) return false;
    return true;
  }

  componentDidUpdate(prevProps, prevState) {
    console.log('componentDidUpdate', prevProps, prevState);
    // 현재 값과 이전 값을 비교 할 수 있다.
    if (this.props.value !== prevProps.value) {
      console.log('value 값이 바뀌었다!', this.props.value);
    }
  }

  componentWillUnmount() {
    // 이벤트, setTimeout, 외부 라이브러리 인스턴스 제거
    console.log('componentWillUnmount');
  }

  render() {
    return (
      <div>
        <p>props: {this.props.value}</p>
        <p>state: {this.state.value}</p>
      </div>
    );
  }
}

export default MyComponent;
