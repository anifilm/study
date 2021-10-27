import React, { useEffect, useCallback } from 'react';
import { useDispatch, useSelector } from 'react-redux';
import BoardList from '../components/BoardList';
import {
  //fetchListStart,
  fetchListSuccess,
  fetchListFailure,
} from '../modules/board';
import { startLoading, endLoading } from '../modules/loading';
import { fetchBoardListApi } from '../lib/api';

const BoardListContainer = () => {
  // 스토어 dispatch 사용
  const dispatch = useDispatch();
  // 스토어 상태 조회
  const { boards, isLoading } = useSelector(({ board, loading }) => {
    return {
      boards: board.boards,
      isLoading: loading.FETCH_LIST,
    };
  });

  // 게시글 목록 조회
  const listBoard = useCallback(async () => {
    //dispatch(fetchListStart());
    dispatch(startLoading('FETCH_LIST'));
    try {
      const response = await fetchBoardListApi();
      dispatch(fetchListSuccess(response.data));
      dispatch(endLoading('FETCH_LIST'));
    } catch (e) {
      dispatch(fetchListFailure(e));
      dispatch(endLoading('FETCH_LIST'));
      throw e;
    }
  }, [dispatch]);

  // 마운트될 때 게시글 목록을 가져옴
  useEffect(() => {
    listBoard();
  }, [listBoard]);

  return <BoardList boards={boards} isLoading={isLoading} />;
};

export default BoardListContainer;
