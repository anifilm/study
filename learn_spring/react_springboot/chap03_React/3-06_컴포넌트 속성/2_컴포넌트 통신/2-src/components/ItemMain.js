import React, { useState } from 'react';
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

  return (
    <div>
      {/* items 속성(props) 값 지정 */}
      <ItemList items={items} />
      <ItemTotal items={items} />
    </div>
  );
};

export default ItemMain;
