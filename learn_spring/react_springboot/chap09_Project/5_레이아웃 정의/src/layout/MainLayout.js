import React from 'react';

import MainHeader from '../components/common/MainHeader';
import MenuBar from '../components/common/MenuBar';
import Footer from '../components/common/Footer';

const MainLayout = ({ children }) => {
  return (
    <div>
      <MainHeader />
      <MenuBar />
      {children}
      <Footer />
    </div>
  );
}

export default MainLayout;
