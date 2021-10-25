import React from 'react';

const Item = ({ item }) => {
  return (
    <li key={item.name}>
      {item.name}: {item.price} x {item.quantity} = {item.price * item.quantity}원
    </li>
  );
};

export default Item;
