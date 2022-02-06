import React, { useEffect, useState } from 'react';
import { Auth } from 'aws-amplify';
import { withAuthenticator, AmplifySignOut } from '@aws-amplify/ui-react';
import './App.css';

function App() {
  const [user, updateUser] = useState(null);

  useEffect(() => {
    Auth.currentAuthenticatedUser()
      .then((user) => updateUser(user))
      .catch((err) => console.log(err));
  }, []);

  let isAdmin = false;
  if (user) {
    const { signInUserSession: { idToken: { payload } } } = user;
    console.log('payload:', payload);
    if (payload['cognito:groups'] && payload['cognito:groups'].includes('Admin')) {
      isAdmin = true;
    }
  }

  return (
    <div className="App">
      <header>
        <h1>Hello, world!</h1>
        {isAdmin && <p>Welcome, Admin</p>}
      </header>
      <AmplifySignOut />
    </div>
  );
}

export default withAuthenticator(App);
