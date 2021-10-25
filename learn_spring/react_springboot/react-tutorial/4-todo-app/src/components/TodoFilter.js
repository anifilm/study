import React from 'react';
import styles from '../Todo.module.css';

// filter, onChagneFilter props로 수신
const TodoFilter = ({ filter, onChangeFilter }) => {
  // 필터링 유형 변경 이벤트를 처리
  const handleFilter = (e) => {
    console.log(e.target.value);
    return onChangeFilter(e.target.value);
  };

  // 필터링 유형 변경 이벤트 처리
  return (
    <div className={styles.filter}>
      <input
        type="radio"
        value="ALL"
        checked={filter === 'ALL'}
        onChange={handleFilter}
      />
      전체{' '}
      <input
        type="radio"
        value="A"
        checked={filter === 'A'}
        onChange={handleFilter}
      />
      미완료{' '}
      <input
        type="radio"
        value="B"
        checked={filter === 'B'}
        onChange={handleFilter}
      />
      완료
    </div>
  );
};

export default TodoFilter;
