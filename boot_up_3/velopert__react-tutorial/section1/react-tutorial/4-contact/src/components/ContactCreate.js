import React from 'react';
import PropTypes from 'prop-types';

class ContactCreate extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
      name: '',
      phone: '',
    };
    this.nameInput = React.createRef();
  }

  handleChange = (e) => {
    let nextState = {};
    nextState[e.target.name] = e.target.value;
    this.setState(nextState);
  };
  handleClick = () => {
    if (this.state.name.trim() === '' || this.state.phone.trim() === '') {
      alert('내용을 입력해주세요.');
      // 입력 내용이 비어있는 경우 -> 기존 입력 내용 초기화
      this.setState({
        name: '',
        phone: '',
      });
      this.nameInput.current.focus();
      return;
    }
    const contact = {
      name: this.state.name.trim(),
      phone: this.state.phone.trim(),
    };
    this.props.onCreate(contact);
    // 입력 이후 -> 기존 입력 내용 초기화
    this.setState({
      name: '',
      phone: '',
    });
    this.nameInput.current.focus();
  };
  handleKeyPress = (e) => {
    if (e.charCode === 13) {
      this.handleClick();
    }
  }

  render() {
    return (
      <div>
        <h2>Create Contact</h2>
        <p>
          <input
            type="text"
            name="name"
            placeholder="name"
            value={this.state.name}
            onChange={this.handleChange}
            ref={this.nameInput}
          />
          <input
            type="text"
            name="phone"
            placeholder="phone"
            value={this.state.phone}
            onChange={this.handleChange}
            onKeyPress={this.handleKeyPress}
          />
        </p>
        <button onClick={this.handleClick}>Create</button>
      </div>
    );
  }
}

ContactCreate.propTypes = {
  onCreate: PropTypes.func,
};

ContactCreate.defaultProps = {
  onCreate: () => {
    console.error('onCreate not defined.');
  },
};

export default ContactCreate;
