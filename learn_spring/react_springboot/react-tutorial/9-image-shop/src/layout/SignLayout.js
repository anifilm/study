import React from 'react';

import HomeHeader from '../components/common/HomeHeader';
import Footer from '../components/common/Footer';

const SignLayout = ({ children }) => {
  return (
    <div>
      <HomeHeader />
      {children}
      <Footer />
    </div>
  );
}

export default SignLayout;
