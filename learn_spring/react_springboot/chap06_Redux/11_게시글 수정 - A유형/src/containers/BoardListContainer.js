import React, { useEffect, useCallback } from 'react';
import { useDispatch, useSelector } from 'react-redux';
import BoardList from '../components/BoardList';
import {
  fetchListStart,
  fetchListSuccess,
  fetchListFailure,
} from '../modules/board';
import { fetchBoardListApi } from '../lib/api';

const BoardListContainer = () => {
  // 스토어 dispatch 사용
  const dispatch = useDispatch();
  // 스토어 상태 조회
  const { boards, isLoading } = useSelector((state) => {
    return {
      boards: state.boards,
      isLoading: state.loading.FETCH_LIST,
    };
  });

  // 게시글 목록 조회
  const listBoard = useCallback(async () => {
    dispatch(fetchListStart());
    try {
      const response = await fetchBoardListApi();
      dispatch(fetchListSuccess(response.data));
    } catch (e) {
      dispatch(fetchListFailure(e));
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
