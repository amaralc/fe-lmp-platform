/* --------------------------------- IMPORTS ---------------------------------*/
import { combineReducers } from 'redux';

import auth from './auth/reducer';

/* --------------------------------- EXPORTS ---------------------------------*/
export default combineReducers({
  auth,
});
