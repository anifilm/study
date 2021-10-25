import React, { useState } from 'react';

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

  // 상태와 설정함수를 정의
  const [items, setItems] = useState(itemDataArray);
  const [userName, setUserName] = useState('Alex');

  return (
    <div>
      <h1>Hello {userName}!</h1>
      <hr />
      <ul>
        {items.map((item) => {
          return (
            <li key={item.name}>
              {item.name}: {item.price} x {item.quantity} = {item.price * item.quantity}원
            </li>
          );
        })}
      </ul>
    </div>
  );
};

export default App;
