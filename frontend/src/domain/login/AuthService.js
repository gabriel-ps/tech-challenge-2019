export default class AuthService {

  constructor(resource) {
    if (resource) {
      this._resource = resource('login');
    }
  }

  attempt(credentials) {
    return this._resource.save(credentials);
  }

  setCurrentUser(user) {
    localStorage.setItem('user', JSON.stringify(user));
  }
  getCurrentUser() {
    return JSON.parse(localStorage.getItem('user'));
  }
}
