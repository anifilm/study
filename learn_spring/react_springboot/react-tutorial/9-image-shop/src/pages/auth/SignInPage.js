import React from 'react';

import SignInForm from '../../components/auth/SignInForm';
import SignLayout from '../../layout/SignLayout';

// 로그인 페이지
const SignInPage = () => {
  return (
    <SignLayout>
      <SignInForm />
    </SignLayout>
  );
}

export default SignInPage;
