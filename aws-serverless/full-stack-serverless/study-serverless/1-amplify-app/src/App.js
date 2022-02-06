import React from 'react';
import { withAuthenticator, AmplifySignOut } from '@aws-amplify/ui-react';

function App() {
  return (
    <div>
      <h1>Hello from AWS Amplify</h1>
      <AmplifySignOut />
    </div>
  );
}

export default withAuthenticator(App);
