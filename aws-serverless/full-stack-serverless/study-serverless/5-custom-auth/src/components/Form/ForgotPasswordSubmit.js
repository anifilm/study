import React from 'react';
import Button from './Button';
import { styles } from './Form';

const ForgotPasswordSubmit = (props) => {
  return (
    <div style={styles.container}>
      <input
        name="confirmationCode"
        placeholder="Confirmation code"
        onChange={(e) => {
          e.persist();
          props.updateFormState(e);
        }}
        style={styles.input}
      />
      <input
        type="password"
        name="password"
        placeholder="New password"
        onChange={(e) => {
          e.persist();
          props.updateFormState(e);
        }}
        style={styles.input}
      />
      <Button onClick={props.forgotPasswordSubmit} title="Save new password" />
    </div>
  );
};

export default ForgotPasswordSubmit;
