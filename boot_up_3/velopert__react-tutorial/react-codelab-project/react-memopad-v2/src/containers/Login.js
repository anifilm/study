import React, { Component } from 'react';
import { Authentication } from '../components';

class Login extends Component {
  render() {
    return (
      <div>
        Login
        <Authentication mode={true}/>
      </div>
    );
  }
}

export default Login;
