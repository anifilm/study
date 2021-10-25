import React from 'react';

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

  return (
    <ul>
      {items.map((item) => (
        <li key={item.name}>
          {item.name}: {item.price} x {item.quantity} = {item.price * item.quantity}원
        </li>
      ))}
    </ul>
  );
}

export default App;
