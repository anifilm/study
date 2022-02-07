import React from 'react';
import { withAuthenticator, AmplifySignOut } from '@aws-amplify/ui-react';

const Admin = () => {
  return (
    <div>
      <h1 style={titleStyle}>Admin</h1>
      <AmplifySignOut />
    </div>
  );
};

const titleStyle = {
  fontWeight: 'normal',
  margin: '0px 0px 0px 10px 0px',
};

export default withAuthenticator(Admin);
