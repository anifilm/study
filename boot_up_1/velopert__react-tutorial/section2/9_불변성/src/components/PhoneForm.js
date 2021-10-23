import React, { Component } from 'react';

class PhoneForm extends Component {
  state = {
    name: '',
    phone: '',
  };

  handleChange = (e) => {
    this.setState({
      [e.target.name]: e.target.value,
    });
  };
  handleSubmit = (e) => {
    e.preventDefault();
    // 상태값을 onCreate를 통해 부모로 전달
    this.props.onCreate(this.state);
    // 상태 초기화
    this.setState({
      name: '',
      phone: '',
    });
  };

  render() {
    const styleInput = {
      padding: '5px',
      marginRight: '5px'
    };

    return (
      <form onSubmit={this.handleSubmit}>
        <input
          style={styleInput}
          name="name"
          placeholder="이름"
          value={this.state.name}
          onChange={this.handleChange}
        />
        <input
          style={styleInput}
          name="phone"
          placeholder="전화번호"
          value={this.state.phone}
          onChange={this.handleChange}
        />
        <button
          type="submit"
          style={{
            border: '1px solid dodgerblue',
            borderRadius: '3px',
            marginTop: '10px',
            padding: '5px 15px',
            background: 'dodgerblue',
            color: 'white',
          }}
        >
          등록
        </button>
      </form>
    );
  }
}

export default PhoneForm;
