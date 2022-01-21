import React, { Component } from 'react';

import PhoneInfo from './PhoneInfo';

class PhoneInfoList extends Component {
  static defaultProps = {
    list: [],
    onUpdate: () => { console.warn('onUpdate not defined') },
    onRemove: () => { console.warn('onRemove not defined') },
  };

  render() {
    const { data, onUpdate, onRemove } = this.props;
    const list = data.map((info, index) => {
      return (
        <PhoneInfo key={index} info={info} onUpdate={onUpdate} onRemove={onRemove} />
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
