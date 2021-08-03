/*
export function someGetter (state) {
}
*/

export function isLoggedIn(state){
  return !!state.token
}
export function authStatus(state){
  return state.status
}
//       isLoggedIn: state => !!state.token,
//       authStatus: state => state.status,
