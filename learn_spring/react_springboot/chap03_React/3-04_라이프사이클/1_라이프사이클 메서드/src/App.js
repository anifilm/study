import React, { Component } from 'react';

class App extends Component {
  // constructor 메서드
  constructor(props) {
    super(props);
    console.log('constructor');
    this.state = {
      userName: 'Alex',
    };
  }

  // getDerivedStateFromProps 메서드
  static getDerivedStateFromProps(nextProps, prevState) {
    console.log('getDerivedStateFromProps', nextProps, prevState);
    return null;
  }

  // componentDidMount 메서드
  componentDidMount() {
    console.log('componentDidMount');
  }

  // shouldComponentUpdate 메서드
  shouldComponentUpdate(nextProps, nextState) {
    console.log('shouldComponentUpdate', nextProps, nextState);
    return true;
  }

  // componentDidUpdate 메서드
  componentDidUpdate(prevProps, prevState) {
    console.log('componentDidUpdate', prevProps, prevState);
  }

  // componentWillUnmount 메서드
  componentWillUnmount() {
    console.log('componentWillUnmount');
  }

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
    console.log('render');
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
