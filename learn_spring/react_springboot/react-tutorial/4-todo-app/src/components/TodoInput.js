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
    <div className="row">
      <form onSubmit={onSubmit}>
        <div className="col s5 offset-s3">
          <input
            type="text"
            value={input}
            onChange={onChange}
            placeholder="할 일을 입력하세요"
            />
        </div>
        <div className="col s4">
          <button type="submit" class="waves-effect waves-light btn">추가</button>
        </div>
      </form>
    </div>
  );
};

export default TodoInput;
