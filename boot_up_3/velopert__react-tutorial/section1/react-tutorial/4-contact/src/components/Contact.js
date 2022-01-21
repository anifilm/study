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

  componentWillMount() {
    //console.log('componentWillMount');
    const contactData = localStorage.contactData;
    console.log(JSON.parse(contactData));
    if (contactData) {
      this.setState({
        contactData: JSON.parse(contactData),
      });
    }
  }

  componentDidUpdate(prevProps, prevState) {
    //console.log('componentDidUpdate');
    if (JSON.stringify(prevState.contactData) !== JSON.stringify(this.state.contactData)) {
      localStorage.contactData = JSON.stringify(this.state.contactData);
    }
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
  };

  handleCreate = (contact) => {
    this.setState({
      // contactData 배열에 내용 추가 (요소 추가)
      //contactData: this.state.contactData.concat(contact),
      contactData: [...this.state.contactData, contact],
    });
  };
  handleEdit = (name, phone) => {
    this.setState({
      // contactData 배열 요소중 같은 요소의 내용 수정
      contactData: this.state.contactData.map((contact) => {
        return contact === this.state.contactData[this.state.selectedKey]
          ? { name, phone }
          : contact;
      }),
    });
  };
  handleRemove = () => {
    this.setState({
      // contactData 배열에서 해당하는 요소를 제외하여 리스트를 반환 (요소 삭제)
      contactData: this.state.contactData.filter((contact) => {
        return contact !== this.state.contactData[this.state.selectedKey];
      }),
      selectedKey: -1,
    });
  };

  render() {
    const mapToComponent = (data) => {
      data.sort();
      data = data.filter((contact) => {
        return (
          contact.name.toLowerCase().indexOf(this.state.keyword.trim()) > -1
        );
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
          onEdit={this.handleEdit}
          onRemove={this.handleRemove}
        />
      </div>
    );
  }
}

export default Contact;
