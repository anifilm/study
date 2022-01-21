import React, { Component } from 'react';

import PhoneForm from './components/PhoneForm';
import PhoneInfoList from './components/PhoneInfoList';

class App extends Component {
  id = 2;
  state = {
    information: [
      {
        id: 0,
        name: '김민준',
        phone: '010-0000-0000',
      },
      {
        id: 1,
        name: '임채영',
        phone: '010-1234-1234',
      },
    ],
    keyword: '',
  };

  handleCreate = (data) => {
    const { information } = this.state;
    this.setState({
      information: information.concat({
        id: this.id++,
        ...data,
      }),
    });
  };
  handleUpdate = (id, data) => {
    const { information } = this.state;
    this.setState({
      information: information.map((info) => {
        return id === info.id ? { ...information, ...data } : info;
      })
    });
  };
  handleRemove = (id) => {
    const { information } = this.state;
    this.setState({
      information: information.filter((info) => {
        return info.id !== id;
      })
    });
  };
  handleChange = (e) => {
    this.setState({
      keyword: e.target.value,
    });
  };
  handleKeyUp = (e) => {
    // Esc키 입력시, 검색 내용 초기화
    if (e.key === 'Escape') {
      this.setState({
        keyword: ''
      });
    }
  };

  render() {
    const styleInput = {
      width: '410px',
      padding: '5px',
      marginTop: '12px',
    };
    const { information, keyword } = this.state;
    const filteredList = information.filter((info) => {
      return info.name.indexOf(keyword) !== -1;
    });

    return (
      <div>
        <PhoneForm onCreate={this.handleCreate} />
        <p>
          <input
            style={styleInput}
            placeholder="검색"
            value={keyword}
            onChange={this.handleChange}
            onKeyUp={this.handleKeyUp}
          />
        </p>
        {filteredList.length === 0 ? (
          <PhoneInfoList
            data={information}
            onUpdate={this.handleUpdate}
            onRemove={this.handleRemove}
          />
        ) : (
          <PhoneInfoList
            data={filteredList}
            onUpdate={this.handleUpdate}
            onRemove={this.handleRemove}
          />

        )}
      </div>
    );
  }
}

export default App;
