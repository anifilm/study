import React from 'react';
import { withRouter } from 'react-router-dom';
import BoardRegisterForm from '../components/BoardRegisterForm';
import * as client from '../lib/api';

// withRouter 함수의 기능이 적용되어 속성으로 history를 전달받음
const BoardRegisterContainer = ({ history }) => {
  // 등록 정보 전달
  const onRegister = async (title, content, writer) => {
    try {
      // 게시글 등록 서버 API 호출 함수 실행
      const response = await client.registerBoard(title, content, writer);
      alert('등록 되었습니다.');
      // 게시글 상세보기 페이지로 이동
      history.push('/read/' + response.data.boardNo);
    } catch (e) {
      console.log(e);
    }
  };
  // 등록 처리 함수 전달
  return <BoardRegisterForm onRegister={onRegister} />;
}

// withRouter 함수를 사용하여 history 객체에 접근
export default withRouter(BoardRegisterContainer);
