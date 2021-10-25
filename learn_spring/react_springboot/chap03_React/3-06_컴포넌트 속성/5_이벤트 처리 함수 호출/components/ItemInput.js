import React from 'react';

const ItemInput = ({ items, onChangePrice }) => {
  const handleChange = (e) => {
    // 데이터 세트(dataset)로 값 획득
    const selectedName = e.target.dataset.itemName;

    console.log('name', selectedName);
    console.log('value', e.target.value);

    // 부모 컴포넌트 함수 호출
    onChangePrice(selectedName, e.target.value);
  };

  return (
    <ul>
      {/* 데이터 세트(dataset)로 값 전달 */}
      {items.map((item) => {
        return (
          <li key={item.name}>
            {item.name}의 가격:{' '}
            <input
              type="text"
              data-item-name={item.name}
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
