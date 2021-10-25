import React from 'react';

const ItemInput = ({ items, onChangePrice }) => {
  // 텍스트 입력 요소 변경 이벤트 처리 함수
  const handleChange = (e) => {
    console.log('name:', e.target.name);
    console.log('value:', e.target.value);
    onChangePrice(e.target.name, e.target.value);
  };

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
              onChange={handleChange}
            />
          </li>
        );
      })}
    </ul>
  );
};

export default ItemInput;
