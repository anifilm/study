import React, { Component } from 'react';

import PhoneInfo from './PhoneInfo';

class PhoneInfoList extends Component {
  static defaultProps = {
    list: [],
    onUpdate: () => { console.warn('onUpdate not defined') },
    onRemove: () => { console.warn('onRemove not defined') },
  };

  shouldComponentUpdate(nextProps, nextState) {
    // TODO: 검색 내용이 없다면 기존 리스트를 보여주는 부분은 추가하면서 비교 대상이 달라서 리렌더링 되는 부분은 개선 필요
    return nextProps.data !== this.props.data;
  }

  render() {
    console.log('render PhoneInfoList');

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
