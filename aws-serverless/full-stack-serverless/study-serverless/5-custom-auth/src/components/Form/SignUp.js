import React from 'react';
import Button from './Button';
import { styles } from './Form';

const SignUp = ({ updateFormState, signUp }) => {
  return (
    <div style={styles.container}>
      <input
        name="username"
        onChange={(e) => {
          e.persist();
          updateFormState(e);
        }}
        style={styles.input}
        placeholder="username"
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
      <input
        type="email"
        name="email"
        placeholder="email"
        onChange={(e) => {
          e.persist();
          updateFormState(e);
        }}
        style={styles.input}
      />
      <Button onClick={signUp} title="Sign Up" />
    </div>
  );
};

export default SignUp;
