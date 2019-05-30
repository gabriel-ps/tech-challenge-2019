export default class LoginService {

  constructor(resource) {
    this._resource = resource('login');
  }

  attempt(credentials) {
    return this._resource.save(credentials);
  }
}
