import React, { useEffect } from 'react';
import { withRouter } from 'react-router';
import { useDispatch, useSelector } from 'react-redux';
import BoardModifyForm from '../components/BoardModifyForm';
import { readBoardThunk } from '../modules/board';
import { modifyBoardApi } from '../lib/api';

// match, history 객체를 전달 받음
const BoardModifyContainer = ({ match, history }) => {
  // match 객체의 params 속성값을 참조
  const { boardNo } = match.params;

  // 스토어 dispatch 사용
  const dispatch = useDispatch();
  // 스토어 상태 조회
  const { board, isLoading } = useSelector((state) => {
    return {
      board: state.board,
      isLoading: state.loading.FETCH,
    };
  });

  // 수정 처리 함수 정의
  const onModify = async (boardNo, title, content) => {
    try {
      await modifyBoardApi(boardNo, title, content);
      alert('수정되었습니다.');
      history.push('/read/' + boardNo);
    } catch (e) {
      console.log(e);
    }
  };

  // 마운트될 때 게시글 상세정보를 가져옴
  useEffect(() => {
    dispatch(readBoardThunk(boardNo));
  }, [dispatch, boardNo]);

  return (
    <BoardModifyForm
      board={board}
      isLoading={isLoading}
      onModify={onModify}
    />
  );
};

export default withRouter(BoardModifyContainer);
