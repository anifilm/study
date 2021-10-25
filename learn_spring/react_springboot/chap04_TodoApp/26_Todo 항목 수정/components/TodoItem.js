import React, { useState, useEffect } from 'react';
import styles from '../Todo.module.css';

const TodoItem = ({ todo, onToggle, onRemove, onEdit }) => {
  const { id, text, done } = todo;

  const [showInput, setShowInput] = useState(false);
  const [inputText, setInputText] = useState('');
  const editInput = React.createRef();

  const onDoubleClick = () => {
    //console.log('onDoubleClick');
    //setInputText(text);
    setShowInput(true);
  };
  const onChange = (e) => {
    //console.log('onChange', e.target.value);
    setInputText(e.target.value);
  };
  const handleClick = () => {
    //console.log('handleClick inputText:', inputText);
    onEdit(id, inputText);
    setShowInput(false);
  }
  const handleKeyPress = (e) => {
    if (e.key === 'Enter') {
      //console.log('handleKeyPress Enter inputText:', inputText);
      onEdit(id, inputText);
      setShowInput(false);
    }
  };
  const handleBlur = () => {
    //console.log('handleBlur inputText:', inputText);
    //onEdit(id, inputText);
    setShowInput(false);
  };

  // 마운트 될 때 편집 입력 요소값 설정
  useEffect(() => {
    //console.log('useEffect todo:', todo);
    if (todo) {
      //console.log('todo.text:', todo.text);
      setInputText(todo.text);
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
