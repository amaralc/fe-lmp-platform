/* --------------------------------- IMPORTS ---------------------------------*/
import React from 'react';
import { Router } from 'react-router-dom';
import { Provider } from 'reactotron-redux';

import './config/ReactotronConfig';

import Routes from './routes';
import history from './services/history';
import store from './store';
import GlobalStyle from './styles/global';

/* --------------------------------- CONTENT ---------------------------------*/
function App() {
  return (
    <Provider store={store}>
      <Router history={history}>
        <Routes />
        <GlobalStyle />
      </Router>
    </Provider>
  );
}

/* --------------------------------- EXPORTS ---------------------------------*/
export default App;
