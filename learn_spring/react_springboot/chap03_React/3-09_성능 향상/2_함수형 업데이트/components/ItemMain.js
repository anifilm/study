import React, { useState } from 'react';
import ItemInput from './ItemInput';
import ItemList from './ItemList';
import ItemTotal from './ItemTotal';

const ItemMain = () => {
  // 더미 데이터 생성
  function createDummyItems() {
    const itemDataArray = [];

    for (let i = 1; i < 2000; i++) {
      itemDataArray.push({
        name: `item${i}`,
        price: parseInt(100000 * Math.random(), 10),
        quantity: 1 + parseInt(10 * Math.random(), 10),
      });
    }

    return itemDataArray;
  }

  // 더미 데이터를 상태 초기값으로 설정
  const [items, setItems] = useState(createDummyItems());

  const onChangePrice = (name, price) => {
    console.log('onChangePrice name:', name, 'price:', price);
    //setItems(
    //  items.map((item) => {
    //    return item.name === name ? { ...item, price: price } : item;
    //  }),
    //);
    // 함수형 업데이트
    setItems((items) => {
      return items.map((item) => {
        return item.name === name ? { ...item, price: price } : item;
      });
    });
  };

  return (
    <div>
      <ItemInput items={items} onChangePrice={onChangePrice} />
      <hr />
      <ItemList items={items} />
      <ItemTotal items={items} />
    </div>
  );
};

export default ItemMain;
