import React, { useState, useEffect, useCallback } from 'react';
import { useSelector, useDispatch } from 'react-redux';
import { setEditingId, resetEditingId } from '../actions/todos';

const TodoItem = ({ todo, onToggle, onRemove, onEdit }) => {
  const { id, text, done } = todo;

  // 스토어 상태 조회
  const { editingId } = useSelector((state) => ({
    editingId: state.editingId,
  }));
  // 편집 상태 확인
  const showInput = id === editingId;

  //const [showInput, setShowInput] = useState(false);
  const [inputText, setInputText] = useState('');
  const editInput = React.createRef();

  // 스토어 didpatch 사용 설정
  const dispatch = useDispatch();

  // 편집 항목 ID 설정 액션 디스패치 함수
  const onSetEditingId = useCallback(
    (id) => dispatch(setEditingId(id)),
    [dispatch],
  );
  // 편집 항목 ID 리셋 액션 디스패치 함수
  const onReSetEditingId = useCallback(
    (id) => dispatch(resetEditingId(id)),
    [dispatch],
  );

  const onDoubleClick = () => {
    onSetEditingId(id); // 편집 항목 ID 설정
    setInputText(text);
  };
  const onChange = (e) => {
    //console.log('onChange', e.target.value);
    setInputText(e.target.value);
  };
  const handleKeyPress = (e) => {
    if (e.key === 'Enter') {
      //console.log('handleKeyPress Enter inputText:', inputText);
      onEdit(id, inputText);
      onReSetEditingId(); // 편집 항목 ID 리셋
    }
  };
  const handleBlur = () => {
    //console.log('handleBlur inputText:', inputText);
    onReSetEditingId(); // 편집 항목 ID 리셋
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
    <div className="row">
      <div className="col s8 offset-s2" style={{ border: '1px solid #ffe0e0', padding: 10}}>
        <label>
          <input
            type="checkbox"
            className="filled-in"
            checked={done}
            onChange={() => onToggle(id)}
          />
          <span style={{ color: 'white' }}>d</span>
        </label>
        {showInput && (
          <input
            value={inputText}
            onChange={onChange}
            onKeyPress={handleKeyPress}
            onBlur={handleBlur}
            ref={editInput}
          />
        )}
        {!showInput && (
          <>
            <span onDoubleClick={onDoubleClick}>{text}</span>
            <button
              onClick={() => {
                onRemove(id);
              }}
              className="waves-effect waves-light btn-small red lighten-2 right"
            >
              삭제
            </button>
          </>
        )}
      </div>
    </div>
  );
};

export default TodoItem;
