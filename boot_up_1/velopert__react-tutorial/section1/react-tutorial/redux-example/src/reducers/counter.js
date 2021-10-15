import { INCREMENT, DECREMENT } from '../actions/ActionTypes';

const initialState = {
  number: 0,
};

export default function counter(state = initialState, action) {
  //console.log(action);
  switch (action.type) {
    case INCREMENT:
      return { number: state.number + 1 };
    case DECREMENT:
      return { number: state.number - 1 };
    default:
      return state;
  }
}
