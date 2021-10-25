import React, { useState } from 'react';
import ItemInput from './ItemInput';
import ItemList from './ItemList';
import ItemTotal from './ItemTotal';

const ItemMain = () => {
  const itemDataArray = [
    {
      name: 'CPU',
      price: 462984,
      quantity: 1,
    },
    {
      name: '메인보드',
      price: 112053,
      quantity: 1,
    },
    {
      name: '메모리',
      price: 79608,
      quantity: 2,
    },
  ];

  const [items, setItems] = useState(itemDataArray);

  // 이벤트 처리 함수 정의
  const onChangePrice = (name, price) => {
    console.log('onChangePrice name:', name, 'price:', price);
    setItems((items) => {
      return items.map((item) => {
        return item.name === name ? { ...item, price: price } : item;
      });
    });
  };

  return (
    <div>
      {/* onChangePrice 속성(props) 값 지정 */}
      <ItemInput items={items} onChangePrice={onChangePrice} />
      <hr />
      <ItemList items={items} />
      <ItemTotal items={items} />
    </div>
  );
};

export default ItemMain;
