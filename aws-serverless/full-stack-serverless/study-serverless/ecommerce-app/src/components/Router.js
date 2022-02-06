import React, { useState, useEffect } from 'react';
import { HashRouter, Switch, Route } from 'react-router-dom';

import Nav from './Nav';
import Admin from './Admin';
import Main from './Main';
import Profile from './Profile';

const Router = () => {
  const [current, setCurrent] = useState('home');

  function setRoute() {
    const location = window.location.href.split('/');
    const pathname = location[location.length-1];
    console.log('pathname:', pathname);
    setCurrent(pathname ? pathname : 'home');
  }

  useEffect(() => {
    setRoute();
    window.addEventListener('hashchange', setRoute);
    return () => window.removeEventListener('hashchange', setRoute);
  }, []);

  return (
    <HashRouter>
      <Nav current={current} />
      <Switch>
        <Route exact path="/" component={Main} />
        <Route exact path="/admin" component={Admin} />
        <Route exact path="/profile" component={Profile} />
        <Route component={Main} />
      </Switch>
    </HashRouter>
  );
};

export default Router;
