import React from 'react';
import { Link } from 'react-router-dom';

// 로그인 레이아웃 템플릿 헤더 영역 표시
const HomeHeader = () => {
  return (
    <div align="center">
      <Link to="/">홈</Link>
    </div>
  );
}

export default HomeHeader;
