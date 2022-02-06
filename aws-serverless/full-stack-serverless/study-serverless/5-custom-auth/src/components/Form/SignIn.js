import React from 'react';
import Button from './Button';
import { styles } from './Form';

const SignIn = ({ updateFormState, signIn }) => {
  return (
    <div style={styles.container}>
      <input
        name="username"
        placeholder="username"
        onChange={(e) => {
          e.persist();
          updateFormState(e);
        }}
        style={styles.input}
      />
      <input
        type="password"
        name="password"
        placeholder="password"
        onChange={(e) => {
          e.persist();
          updateFormState(e);
        }}
        style={styles.input}
      />
      <Button onClick={signIn} title="Sign In" />
    </div>
  );
};

export default SignIn;
