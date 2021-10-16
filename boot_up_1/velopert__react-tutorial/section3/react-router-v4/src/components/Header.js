import React from 'react';
import { Link } from 'react-router-dom';

import './Header.css';

const Header = () => {
  return (
    <div className="header">
      <Link to="/" className="item">홈</Link>
      <Link to="/about" className="item">소개</Link>
    </div>
  );
}

export default Header;
