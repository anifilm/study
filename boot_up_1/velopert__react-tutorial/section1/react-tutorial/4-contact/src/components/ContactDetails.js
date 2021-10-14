import React from 'react';
import PropTypes from 'prop-types';

class ContactDetails extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
      isEdit: false,
      name: '',
      phone: '',
    };
  }

  handleChange = (e) => {
    let nextState = {};
    nextState[e.target.name] = e.target.value;
    this.setState(nextState);
  };
  handleToggle = () => {
    // 아무것도 선택되어 있지 않으면 동작 안함
    if (!this.props.isSelected) return;
    // isEdit 활성화 상태
    if (!this.state.isEdit) {
      this.setState({
        name: this.props.contact.name,
        phone: this.props.contact.phone,
      })
    } else {
      this.handleEdit();
    }
    this.setState({
      isEdit: !this.state.isEdit,
    });
  };
  handleEdit = () => {
    this.props.onEdit(this.state.name, this.state.phone);
  }
  handleKeyPress = (e) => {
    if (e.charCode === 13) {
      this.handleToggle();
    }
  }

  render() {
    const details = (
      <div>
        <p>
          {this.props.contact.name} {this.props.contact.phone}
        </p>
      </div>
    );
    const edit = (
      <div>
        <input
          type="text"
          name="name"
          placeholder="name"
          value={this.state.name}
          onChange={this.handleChange}
          onKeyPress={this.handleKeyPress}
        />
        <input
          type="text"
          name="phone"
          placeholder="phone"
          value={this.state.phone}
          onChange={this.handleChange}
          onKeyPress={this.handleKeyPress}
        />
      </div>
    );
    const view = this.state.isEdit ? edit : details;
    const blank = <div>Not Selected</div>;

    return (
      <div>
        <h2>Contact Details</h2>
        {this.props.isSelected ? view : blank}
        <p>
          <button onClick={this.handleToggle}>
            {this.state.isEdit ? 'OK' : 'Edit'}
          </button>
          <button onClick={this.props.onRemove}>Remove</button>
        </p>
      </div>
    );
  }
}

ContactDetails.propTypes = {
  contact: PropTypes.object,
  onEdit: PropTypes.func,
  onRemove: PropTypes.func,
};

ContactDetails.defaultProps = {
  contact: {
    name: '',
    phone: '',
  },
  onEdit: () => {
    console.error('onEdit not defined.');
  },
  onRemove: () => {
    console.error('onRemove not defined.');
  },
};

export default ContactDetails;
