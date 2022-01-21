import React, { Component } from 'react';
import { Authentication } from '../components';

class Register extends Component {
  render() {
    return (
      <div>
        Register
        <Authentication mode={false}/>
      </div>
    );
  }
}

export default Register;
