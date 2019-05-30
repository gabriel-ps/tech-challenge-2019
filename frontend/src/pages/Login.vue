<template>
    <div class="content">
        <div class="md-layout md-alignment-center">

          <div class="container">
              <div class="row">
                  <div class="col-lg-4 col-md-6 col-sm-8 ml-auto mr-auto">
                      <form class="form" @submit.prevent="login()">
                          <div class="card card-login">
                              <div
                                  class="card-header card-header-rose text-center"
                              >
                                  <h4 class="card-title">Login</h4>
                              </div>

                              <div class="card-body">
                                  <span class="bmd-form-group">
                                      <div class="input-group">
                                          <div
                                              class="input-group-prepend"
                                          >
                                              <span
                                                  class="input-group-text"
                                              >
                                                  <i
                                                      class="material-icons"
                                                      >email</i
                                                  >
                                              </span>
                                          </div>
                                          <input
                                              type="email"
                                              name="email"
                                              class="form-control"
                                              placeholder="Email..."
                                              v-model="email"
                                              required
                                          />
                                          <span class="text-danger" v-if="getError('email')">{{ getError('email') }}</span>
                                      </div>
                                  </span>
                                  <span class="bmd-form-group">
                                      <div class="input-group">
                                          <div
                                              class="input-group-prepend"
                                          >
                                              <span
                                                  class="input-group-text"
                                              >
                                                  <i
                                                      class="material-icons"
                                                      >lock_outline</i
                                                  >
                                              </span>
                                          </div>
                                          <input
                                              type="password"
                                              class="form-control"
                                              placeholder="Password..."
                                              v-model="password"
                                              required
                                          />
                                      </div>
                                  </span>
                              </div>
                              <div class="md-layout-item md-size-100 text-center">
                                <md-button type="submit" class="md-raised md-success">Login</md-button>
                              </div>
                          </div>
                      </form>
                  </div>
              </div>
          </div>

        </div>
    </div>
</template>

<script>
import AuthService from '@/domain/login/AuthService';

export default {
  data() {
    return {
      email: '',
      password: '',
      errors: null,
      authService: null
    };
  },
  created() {
    this.authService = new AuthService(this.$resource);
  },
  methods: {
    login() {
      this.errors = null;

      this.authService.attempt({
        email: this.email,
        password: this.password,
      })
      .then(response => {
        // console.log(response);
        this.authService.setCurrentUser(response.body.user);

        this.$router.push({ path: 'dashboard' })
      })
      .catch(response => {
        // console.log(response.body);
        this.errors = response.body.errors;
      });
    },
    getError(field) {
      return this.errors && this.errors[field] ? this.errors[field][0] : '';
    }
  }
};
</script>

<style scoped>
.container {
    margin: 50px auto;
    max-width: 500px;
}
.container .card-login .card-body .input-group .form-control {
    padding-bottom: 10px;
    margin: 27px 16px 0;
}
.input-group-prepend {
    display: inline-block;
}


.text-danger {
  display: block;
}
</style>
