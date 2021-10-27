import React, { useState, useEffect } from 'react';
import BoardList from '../components/BoardList';
import { fetchBoardListApi } from '../lib/api';

const BoardListContainer = () => {
  // 컴포넌트 상태 선언
  const [boards, setBoards] = useState([]);
  const [isLoading, setLoading] = useState(false);

  // 게시글 목록 조회
  const listBoard = async () => {
    setLoading(true);
    try {
      const response = await fetchBoardListApi();
      setBoards(response.data);
      setLoading(false);
    } catch (e) {
      setLoading(false);
      throw e;
    }
  }
  // 마운트될 때 게시글 목록을 가져옴
  useEffect(() => {
    listBoard();
  }, []);

  return <BoardList boards={boards} isLoading={isLoading} />;
};

export default BoardListContainer;
