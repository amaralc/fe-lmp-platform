/* --------------------------------- IMPORTS ---------------------------------*/
import createSagaMiddleware from 'redux-saga';
import createStore from './createStore';

import rootReducer from './modules/rootReducer';
import rootSaga from './modules/rootSaga';

/* --------------------------------- CONTENT ---------------------------------*/
const SagaMiddleware = createSagaMiddleware();

const middlewares = [SagaMiddlewar];

const store = createStore(rootReducer, middlewares);

sagaMiddleware.run(rootSaga);

/* --------------------------------- EXPORTS ---------------------------------*/
export default store;
