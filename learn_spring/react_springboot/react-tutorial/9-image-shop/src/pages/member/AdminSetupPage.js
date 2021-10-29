import React from 'react';
import AdminSetupContainer from '../../containers/member/AdminSetupContainer';
import MainLayout from '../../layout/MainLayout';

const AdminSetupPage = () => {
  // 메인 레이아웃 적용
  return (
    <MainLayout>
      <AdminSetupContainer />
    </MainLayout>
  );
}

export default AdminSetupPage;
