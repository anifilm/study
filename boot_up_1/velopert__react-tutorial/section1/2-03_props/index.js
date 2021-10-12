class Codelab extends React.Component {
  render() {
    return (
      <div>
        <h1>Hello {this.props.name}</h1>
        <h2>{this.props.number}</h2>
        <div>{this.props.children}</div>
      </div>
    );
  }
}

Codelab.propTypes = {
  name: PropTypes.string,
  number: PropTypes.number.isRequired
};

Codelab.defaultProps = {
  name: 'Unknown'
};

class App extends React.Component {
  render() {
    return (
      <Codelab name="velopert" number={5}>children은 이 사이에 있는거</Codelab>
    );
  }
}

ReactDOM.render(<App />, document.getElementById('root'));
