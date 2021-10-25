import React, { useState, useMemo } from 'react';

const App = () => {
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

  // 상태값 계산 함수
  const calcTotalPrice = (item) => {
    return items.reduce(function (sum, item) {
      return sum + item.price * item.quantity;
    }, 0);
  };

  // useMemo 훅 사용
  const totalPrice = useMemo(() => calcTotalPrice(items), [items]);

  return (
    <div>
      <ul>
        {items.map((item) => (
          <li key={item.name}>
            {item.name}: {item.price} x {item.quantity} ={' '}
            {item.price * item.quantity}원
          </li>
        ))}
      </ul>
      {/* 계산값 표시 */}
      <p>합계: {totalPrice}원</p>
    </div>
  );
};

export default App;
