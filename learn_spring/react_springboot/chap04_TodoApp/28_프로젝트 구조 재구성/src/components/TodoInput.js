import React from 'react';
import styles from '../Todo.module.css';

// 부모 컴포넌트에서 컴포넌트 속성으로 수신
const TodoInput = ({ input, onInsert, onChangeInput }) => {
  // 폼 submit 이벤트 처리
  const onSubmit = (e) => {
    e.preventDefault();
    if (input.trim() === '') {
      alert('내용을 입력하세요.');
      onChangeInput('');
      return;
    }
    onInsert(input.trim());
    onChangeInput('');
  };
  // 텍스트 입력 요소 변견 이벤트 처리
  const onChange = (e) => {
    return onChangeInput(e.target.value);
  };

  return (
    <div className={styles.input}>
      <form onSubmit={onSubmit}>
        <input
          type="text"
          value={input}
          onChange={onChange}
          placeholder="할 일을 입력하세요"
        />
        <button type="submit">추가</button>
      </form>
    </div>
  );
};

export default TodoInput;
