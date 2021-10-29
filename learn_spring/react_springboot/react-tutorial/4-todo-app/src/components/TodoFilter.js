import React from 'react';

// filter, onChagneFilter props로 수신
const TodoFilter = ({ filter, onChangeFilter }) => {
  // 필터링 유형 변경 이벤트를 처리
  const handleFilter = (e) => {
    return onChangeFilter(e.target.value);
  };

  // 필터링 유형 변경 이벤트 처리
  return (
    <div className="row">
      <div className="col s1.5 offset-s3">
        <label>
          <input
            className="with-gap"
            type="radio"
            value="ALL"
            checked={filter === 'ALL'}
            onChange={handleFilter}
          />
          <span>전체</span>
        </label>
      </div>
      <div className="col s1.5">
        <label>
          <input
            className="with-gap"
            type="radio"
            value="A"
            checked={filter === 'A'}
            onChange={handleFilter}
          />
          <span>미완료</span>
        </label>
      </div>
      <div className="col s1.5">
        <label>
          <input
            className="with-gap"
            type="radio"
            value="B"
            checked={filter === 'B'}
            onChange={handleFilter}
          />
          <span>완료</span>
        </label>
      </div>
    </div>
  );
};

export default TodoFilter;
