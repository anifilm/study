import React, { useState, useMemo } from 'react';
import ItemList from './ItemList';

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

  const calcTotalPrice = (items) => {
    return items.reduce(function (sum, item) {
      return sum + item.price * item.quantity;
    }, 0);
  };

  const totalPrice = useMemo(() => {
    return calcTotalPrice(items);
  }, [items]);

  return (
    <div>
      {/* items, totalPrice 속성(props) 값 지정 */}
      <ItemList items={items} totalPrice={totalPrice} />
    </div>
  );
};

export default ItemMain;
