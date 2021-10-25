import React, { useState, useCallback, useEffect } from 'react';
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

  // useState 훅
  const [items, setItems] = useState(itemDataArray);

  // useCallback 훅
  // 이벤트 처리 함수를 필요할 때만 생성하여 렌더링 성능을 향상 시킴
  const onChangePrice = useCallback((name, price) => {
    console.log('onChangePrice name:', name, 'price:', price);
    setItems((items) => {
      return items.map((item) => {
        return item.name === name ? { ...item, price: price } : item;
      });
    });
  }, []);

  // useEffect 훅
  // 리액트 컴포넌트가 렌더링될 때마다 특정 작업을 수행하도록 설정
  useEffect(() => {
    console.log('componentDidMount');
    console.log('componentDidUpdate');
    return () => {
      console.log('cleanUp');
    };
  }, [items]);

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
