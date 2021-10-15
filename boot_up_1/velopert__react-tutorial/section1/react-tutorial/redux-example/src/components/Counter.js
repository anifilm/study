import React, { Component } from 'react';

import Value from './Value';
import Control from './Control';

class Counter extends Component {
  render() {
    return (
      <div>
        <Value />
        <Control />
      </div>
    );
  }
}

export default Counter;
