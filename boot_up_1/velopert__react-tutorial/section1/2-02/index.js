class Codelab extends React.Component {
  render() {
    return (
      <div>Codelab</div>
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
