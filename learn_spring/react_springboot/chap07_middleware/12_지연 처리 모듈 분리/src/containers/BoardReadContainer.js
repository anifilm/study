import React, { useEffect } from 'react';
import { withRouter } from 'react-router';
import { useDispatch, useSelector } from 'react-redux';
import { readBoardThunk } from '../modules/board';
import BoardRead from '../components/BoardRead';
import { removeBoardApi } from '../lib/api';

// match 객체의 params 값을 참조
const BoardReadContainer = ({ match, history }) => {
  // match 객체의 params 속성값을 참조
  const { boardNo } = match.params;

  // 스토어 dispatch 사용
  const dispatch = useDispatch();
  // 스토어 상태 조회
  const { board, isLoading } = useSelector(({ board, loading }) => {
    return {
      board: board.board,
      isLoading: loading.FETCH,
    };
  });

  // 마운트될 때 게시글 상세정보를 가져옴
  useEffect(() => {
    dispatch(readBoardThunk(boardNo));
  }, [dispatch, boardNo]);

  // 삭제 처리 함수 정의
  const onRemove = async () => {
    //console.log('boardNo:', boardNo);
    try {
      // 게시글 삭제 API 호출
      await removeBoardApi(boardNo);
      alert('삭제되었습니다.');
      // 목록 화면으로 이동
      history.push('/');
    } catch (e) {
      console.log(e);
    }
  };

  return (
    <BoardRead
      boardNo={boardNo}
      board={board}
      isLoading={isLoading}
      onRemove={onRemove}
    />
  );
};

export default withRouter(BoardReadContainer);
