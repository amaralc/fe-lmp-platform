/* --------------------------------- IMPORTS ---------------------------------*/
import React from 'react';
import { Router } from 'react-router-dom';

import Routes from './routes';
import History from './services/history';

/* --------------------------------- CONTENT ---------------------------------*/
function App() {
  return (
    <Router history={history}>
      <Routes />
    </Router>
  );
}

/* --------------------------------- EXPORTS ---------------------------------*/
export default App;
