class Codelab extends React.Component {
  render() {
    let text = 'Hi I am codelab!';
    let style = {
      backgroundColor: 'aqua'
    }
    return (
      <div style={style}>{ text }</div>
    );
  }
}

class App extends React.Component {
  render() {
    return (
      <Codelab />
    );
  }
}

ReactDOM.render(<App />, document.getElementById('root'));
