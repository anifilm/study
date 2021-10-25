import React, { useState } from 'react';
import styles from '../Todo.module.css';

const TodoInput = ({ onInsert }) => {
  const [value, setValue] = useState('');

  const onChange = (e) => {
    setValue(e.target.value);
  };
  const onSubmit = (e) => {
    e.preventDefault();
    if (value.trim() === '') {
      alert('내용을 입력하세요.');
      setValue('');
      return;
    }
    onInsert(value.trim());
    setValue('');
  };

  return (
    <div className={styles.input}>
      <form onSubmit={onSubmit}>
        <input
          type="text"
          value={value}
          onChange={onChange}
          placeholder="할 일을 입력하세요"
        />
        <button type="submit">추가</button>
      </form>
    </div>
  );
};

export default TodoInput;
