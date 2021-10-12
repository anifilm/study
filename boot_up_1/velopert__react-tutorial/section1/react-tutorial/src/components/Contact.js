import React from 'react';

import ContactInfo from './ContactInfo';
import ContactDetails from './ContactDetails';
import ContactCreate from './ContactCreate';

class Contact extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
      selectedKey: -1,
      keyword: '',
      contactData: [
        { name: 'Abet', phone: '010-0000-0001' },
        { name: 'Betty', phone: '010-0000-0002' },
        { name: 'Charlie', phone: '010-0000-0003' },
        { name: 'David', phone: '010-0000-0004' },
      ],
    };
  }

  handleChange = (e) => {
    this.setState({
      keyword: e.target.value,
    });
  };
  handleClick = (key) => {
    this.setState({
      selectedKey: key,
    });

    console.log(key, 'is selected');
  };

  handleCreate = (contact) => {
    // 배열에 내용 추가
    this.setState({
      contactData: this.state.contactData.concat(contact)
    });
  }
  handleEdit = () => {
    console.log("edit click");
  }
  handleRemove = (key) => {
    console.log("remove click");
    this.setState({
      contactData: this.state.contactData.filter((contact) => contact.key !== key)
    });
  }

  render() {
    const mapToComponent = (data) => {
      data.sort();
      data = data.filter((contact) => {
        return contact.name.toLowerCase().indexOf(this.state.keyword.trim()) > -1;
      });
      return data.map((contact, i) => {
        return (
          <ContactInfo
            contact={contact}
            key={i}
            onClick={() => {
              this.handleClick(i);
            }}
          />
        );
      });
    };
    return (
      <div>
        <ContactCreate onCreate={this.handleCreate} />
        <h1>Contacts</h1>
        <input
          name="keyword"
          placeholder="Search"
          value={this.state.keyword}
          onChange={this.handleChange}
        />
        <div>{mapToComponent(this.state.contactData)}</div>
        <ContactDetails
          isSelected={this.state.selectedKey !== -1}
          contact={this.state.contactData[this.state.selectedKey]}
        />
      </div>
    );
  }
}

export default Contact;
