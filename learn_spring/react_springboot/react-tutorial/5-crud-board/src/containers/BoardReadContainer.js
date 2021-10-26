import React, { useState, useEffect } from 'react';
import { withRouter } from 'react-router';
import BoardRead from '../components/BoardRead';
import * as client from '../lib/api';

// match 객체의 params 값을 참조
const BoardReadContainer = ({ match, history }) => {
  // match 객체의 params 속성값을 참조
  const { boardNo } = match.params;
  // 컴포넌트 상태 선언
  const [board, setBoard] = useState(null);
  const [isLoading, setLoading] = useState(false);

  // 게시글 상세 조회
  const readBoard = async (boardNo) => {
    setLoading(true);
    try {
      const response = await client.fetchBoard(boardNo);
      setBoard(response.data);
      setLoading(false);
    } catch (e) {
      throw e;
    }
  };
  // 마운트될 때 게시글 상세정보를 가져옴
  useEffect(() => {
    readBoard(boardNo);
  }, [boardNo]);

  // 삭제 처리 함수 정의
  const onRemove = async () => {
    //console.log('boardNo:', boardNo);
    try {
      // 게시글 삭제 API 호출
      await client.removeBoard(boardNo);
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
