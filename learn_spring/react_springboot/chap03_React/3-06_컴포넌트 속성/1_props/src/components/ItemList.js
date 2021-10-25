import React, { useState } from 'react';
import Item from './Item';

const ItemList = () => {
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
    <ul>
      {/* item 속성(props) 값 지정 */}
      {items.map((item) => {
        return <Item key={item.name} item={item} />;
      })}
    </ul>
  );
};

export default ItemList;
