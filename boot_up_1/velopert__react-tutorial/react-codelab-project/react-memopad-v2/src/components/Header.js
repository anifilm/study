import React, { Component } from 'react';
import PropTypes from 'prop-types';

class Header extends Component {
  render() {
    return (
      <nav>
        <div className="nav-wrapper blue darken-1">
          <a href="#" className="brand-logo center">
            MEMOPAD
          </a>
          <ul>
            <li>
              <a>
                <i className="material-icons">search</i>
              </a>
            </li>
          </ul>
          <div className="right">
            <ul>
              <li>
                <a>
                  <i className="material-icons">vpn_key</i>
                </a>
              </li>
              <li>
                <a>
                  <i className="material-icons">lock_open</i>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    );
  }
}

Header.propTypes = {
  isLoggedIn: PropTypes.bool,
  onLogout: PropTypes.func,
};

Header.defaultProps = {
  isLoggedIn: false,
  onLogout: () => {
    console.error('logout function not defined');
  },
};

export default Header;
