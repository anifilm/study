import React from 'react';
import '../App.css';

import { withAuthenticator, AmplifySignOut} from '@aws-amplify/ui-react';

const containerStyle = {
  width: 400,
  margin: '20px auto',
};

const Profile = () => {
  return (
    <div style={containerStyle}>
      <AmplifySignOut />
    </div>
  );
};

export default withAuthenticator(Profile);
