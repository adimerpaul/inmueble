export default function () {
  return {
    state: {
      status: '',
      token: localStorage.getItem('token') || '',
      user : {}
    },
  }
}
