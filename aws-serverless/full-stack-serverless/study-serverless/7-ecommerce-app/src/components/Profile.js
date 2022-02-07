import React from 'react';
import '../App.css';

import { withAuthenticator, AmplifySignOut} from '@aws-amplify/ui-react';

const Profile = () => {
  return (
    <div style={containerStyle}>
      <AmplifySignOut />
    </div>
  );
};

const containerStyle = {
  width: 400,
  margin: '20px auto',
};

export default withAuthenticator(Profile);
