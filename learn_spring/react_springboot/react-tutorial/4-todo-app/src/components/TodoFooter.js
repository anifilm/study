import React from 'react';
import { useSelector } from 'react-redux';

const TodoFooter = ({ onClearAll }) => {
  // 스토어 상태 조회
  const { todos, nextTodoId } = useSelector((state) => {
    return {
      todos: state.todos,
      nextTodoId: state.nextTodoId,
    };
  });
  // 저장할 데이터 객체 생성
  const data = {
    todos,
    nextTodoId,
  };
  // 애플리케이션 데이터 저장
  const onSave = () => {
    localStorage.setItem('todo-app-data', JSON.stringify(data))
  };

  return (
    <div className="row">
      <div className="col s5 right">
        <br />
        <button onClick={onClearAll} class="waves-effect waves-light btn red lighten-2">완료 항목 삭제</button>{' '}
        <button onClick={onSave} class="waves-effect waves-light btn blue" style={{width: 80}}>저장</button>
      </div>
    </div>
  );
};

export default TodoFooter;
