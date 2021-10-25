import React, { useState, useEffect, useCallback } from 'react';
import { useSelector, useDispatch } from 'react-redux';
import { setEditingId, resetEditingId } from '../modules/todos';
import styles from '../Todo.module.css';

const TodoItem = ({ todo, onToggle, onRemove, onEdit }) => {
  const { id, text, done } = todo;

  // 스토어 상태 조회
  const { editingId } = useSelector((state) => ({
    editingId: state.editingId,
  }));
  // 편집 상태 확인
  const showInput = (id === editingId);

  //const [showInput, setShowInput] = useState(false);
  const [inputText, setInputText] = useState('');
  const editInput = React.createRef();

  // 스토어 didpatch 사용 설정
  const dispatch = useDispatch();

  // 편집 항목 ID 설정 액션 디스패치 함수
  const onSetEditingId = useCallback((id) => dispatch(setEditingId(id)), [dispatch]);
  // 편집 항목 ID 리셋 액션 디스패치 함수
  const onReSetEditingId = useCallback((id) => dispatch(resetEditingId(id)), [dispatch]);

  const onDoubleClick = () => {
    //console.log('onDoubleClick');
    //setShowInput(true);
    onSetEditingId(id); // 편집 항목 ID 설정
    setInputText(text);
  };
  const onChange = (e) => {
    //console.log('onChange', e.target.value);
    setInputText(e.target.value);
  };
  const handleClick = () => {
    // TODO: 클릭보다 handleBlur가 먼저 동작한다. (버튼 클릭 불가)
    //console.log('handleClick inputText:', inputText);
    onEdit(id, inputText);
    //setShowInput(false);
    onReSetEditingId(); // 편집 항목 ID 리셋
  }
  const handleKeyPress = (e) => {
    if (e.key === 'Enter') {
      //console.log('handleKeyPress Enter inputText:', inputText);
      onEdit(id, inputText);
      //setShowInput(false);
      onReSetEditingId(); // 편집 항목 ID 리셋
    }
  };
  const handleBlur = () => {
    //console.log('handleBlur inputText:', inputText);
    //setShowInput(false);
    onReSetEditingId(); // 편집 항목 ID 리셋
  };

  // 마운트 될 때 편집 입력 요소값 설정
  useEffect(() => {
    //console.log('useEffect todo:', todo);
    if (todo) {
      //console.log('todo.text:', todo.text);
      //setInputText(todo.text);
    }
  }, [todo]);
  // 마운트 될 때 편집 입력 요소 포커스 처리
  useEffect(() => {
    if (editInput.current) {
      editInput.current.focus();
    }
  }, [editInput]);

  return (
    <div className={styles.item}>
      <input type="checkbox" checked={done} onChange={() => onToggle(id)} />
      {showInput && (
        <>
          <input
            value={inputText}
            onChange={onChange}
            onKeyPress={handleKeyPress}
            onBlur={handleBlur}
            ref={editInput}
          />
          <button onClick={handleClick}>수정</button>
        </>
      )}
      {!showInput && (
        <>
          <span onDoubleClick={onDoubleClick}>{text}</span>
          <button onClick={() => { onRemove(id); }}>삭제</button>
        </>
      )}
    </div>
  );
};

export default TodoItem;
