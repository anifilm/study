import React, { Component } from 'react';

class PhoneForm extends Component {
  state = {
    name: '',
    phone: '',
  }

  handleChange = (e) => {
    this.setState({
      [e.target.name]: e.target.value
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
    return (
      <form onSubmit={this.handleSubmit}>
        <input name="name" placeholder="이름" value={this.state.name} onChange={this.handleChange} />
        <input name="phone" placeholder="전화번호" value={this.state.phone} onChange={this.handleChange} />
        <button type="submit">등록</button>
      </form>
    );
  }
}

export default PhoneForm;
