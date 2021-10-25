import React from 'react';
import styles from '../Todo.module.css';

const TodoInput = () => {
  return (
    <div className={styles.input}>
      <form>
        <input type="text" placeholder="할 일을 입력하세요" />
        <button type="submit">추가</button>
      </form>
    </div>
  );
};

export default TodoInput;
