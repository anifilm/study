import React, { Component } from 'react';

class PhoneInfo extends Component {
  static defaultProps = {
    info: {
      id: 0,
      name: '이름',
      phone: '010-0000-0000',
    }
  }

  render() {
    const style = {
      border: '1px solid black',
      width: '360px',
      marginTop: '20px',
      padding: '12px',
    };
    const { name, phone } = this.props.info;

    return (
      <div style={style}>
        <div><b>{name}</b></div>
        <div>{phone}</div>
      </div>
    );
  }
}

export default PhoneInfo;
