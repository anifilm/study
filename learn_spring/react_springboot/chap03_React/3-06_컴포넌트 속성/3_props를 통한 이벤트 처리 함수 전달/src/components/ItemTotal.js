import React, { useMemo } from 'react';

const ItemTotal = ({ items }) => {
  const calcTotalPrice = (items) => {
    return items.reduce(function (sum, item) {
      return sum + item.price * item.quantity;
    }, 0);
  };

  const totalPrice = useMemo(() => {
    return calcTotalPrice(items);
  }, [items]);

  return <p>합계: {totalPrice}원</p>;
};

export default ItemTotal;
