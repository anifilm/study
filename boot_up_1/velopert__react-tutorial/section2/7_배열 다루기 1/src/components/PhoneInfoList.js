import React, { Component } from 'react';

import PhoneInfo from './PhoneInfo';

class PhoneInfoList extends Component {

  render() {
    const { data } = this.props;
    const list = data.map((info) => {
      return (
        <PhoneInfo key={info.id} info={info} />
      );
    });

    return (
      <div>
        {list}
      </div>
    );
  }
}

export default PhoneInfoList;
