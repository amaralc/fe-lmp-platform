/* --------------------------------- IMPORTS ---------------------------------*/
import produce from 'immer';

/* --------------------------------- CONTENT ---------------------------------*/
const INITIAL_STATE = {
  token: null,
  signed: false,
  loading: false,
};

/* --------------------------------- EXPORTS ---------------------------------*/
export default function auth(state = INITIAL_STATE, action) {
  switch (action.type) {
    case '@auth/SIGN_IN_SUCESS':
      return produce(state, draft => {
        draft.token = action.payload.token;
        draft.signed = true;
      });
    default:
      return state;
  }
}
