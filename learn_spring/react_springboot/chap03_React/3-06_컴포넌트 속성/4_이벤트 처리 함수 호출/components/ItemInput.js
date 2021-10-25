import React from 'react';

const ItemInput = ({ items, onChangePrice }) => {
  // 삭제
  //const handleChange = (e) => {
  //  console.log('name:', e.target.name);
  //  console.log('value:', e.target.value);
  //  onChangePrice(e.target.name, e.target.value);
  //};

  return (
    <ul>
      {/* 이벤트 처리 함수(handleChange) 지정 */}
      {items.map((item) => {
        return (
          <li key={item.name}>
            {item.name}의 가격:{' '}
            <input
              type="text"
              name={item.name}
              value={item.price}
              onChange={(e) => onChangePrice(item.name, e.target.value)}
            />
          </li>
        );
      })}
    </ul>
  );
};

export default ItemInput;
