import React from 'react';

class ContactInfo extends React.Component {
  render() {
    return <div onClick={this.props.onClick}>{this.props.contact.name}</div>;
  }
}

export default ContactInfo;
