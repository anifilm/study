import React, { useState, useEffect } from 'react';
import { Auth } from 'aws-amplify';
import { withAuthenticator, AmplifySignOut } from '@aws-amplify/ui-react';

import Container from './Container';

const Profile = () => {
  const [user, setUser] = useState({});

  async function checkUser() {
    try {
      const data = await Auth.currentUserPoolUser();
      const userInfo = {
        username: data.username,
        ...data.attributes,
      };
      setUser(userInfo);
    } catch (err) {
      console.log('error:', err);
    }
  }

  useEffect(() => {
    checkUser();
  }, []);

  return (
    <Container>
      <h1>Profile</h1>
      <h2>Username: {user.username}</h2>
      <h3>Email: {user.email}</h3>
      <h4>Phone: {user.phone_number}</h4>
      <AmplifySignOut />
    </Container>
  );
};

export default withAuthenticator(Profile);
