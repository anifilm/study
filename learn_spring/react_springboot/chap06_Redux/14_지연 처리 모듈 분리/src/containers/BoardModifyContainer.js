import React, { useEffect, useCallback } from 'react';
import { useDispatch, useSelector } from 'react-redux';
import { withRouter } from 'react-router';
import BoardModifyForm from '../components/BoardModifyForm';
import {
  //changeTitle,
  //changeContent,
  //fetchStart,
  fetchSuccess,
  fetchFailure,
} from '../modules/board';
import { startLoading, endLoading } from '../modules/loading';
import { fetchBoardApi, modifyBoardApi } from '../lib/api';

// match, history 객체를 전달 받음
const BoardModifyContainer = ({ match, history }) => {
  // match 객체의 params 속성값을 참조
  const { boardNo } = match.params;

  // 스토어 dispatch 사용
  const dispatch = useDispatch();
  // 스토어 상태 조회
  const { board, isLoading } = useSelector(({ board, loading}) => {
    return {
      board: board.board,
      isLoading: loading.FETCH,
    };
  });

  // 게시글 상세 조회
  const readBoard = useCallback(async (boardNo) => {
    //dispatch(fetchStart());
    dispatch(startLoading('FETCH'));
    try {
      const response = await fetchBoardApi(boardNo);
      dispatch(fetchSuccess(response.data));
      dispatch(endLoading('FETCH'));
    } catch (e) {
      dispatch(fetchFailure(e));
      dispatch(endLoading('FETCH'));
      throw e;
    }
  }, [dispatch]);

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

  // 제목 변경 함수 정의 (삭제)
  //const onChangeTitle = useCallback((title) => {
  //  return dispatch(changeTitle(title));
  //}, [dispatch]);
  // 내용 변경 함수 정의 (삭제)
  //const onChangeContent = useCallback((content) => {
  //  return dispatch(changeContent(content));
  //}, [dispatch]);

  // 마운트될 때 게시글 상세정보를 가져옴
  useEffect(() => {
    readBoard(boardNo);
  }, [boardNo, readBoard]);

  return (
    <BoardModifyForm
      //title={title}
      //content={content}
      board={board}
      isLoading={isLoading}
      //onChangeTitle={onChangeTitle}
      //onChangeContent={onChangeContent}
      onModify={onModify}
    />
  );
};

export default withRouter(BoardModifyContainer);
