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
                                          />
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
                                          />
                                      </div>
                                  </span>
                              </div>
                              {{email}} - {{password}}
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
import LoginService from '@/domain/login/LoginService';

export default {
  data() {
    return {
      email: '',
      password: '',
      loginService: null
    };
  },
  created() {
    this.loginService = new LoginService(this.$resource);
  },
  methods: {
    login() {
      if (!this.email) {
        return;
      }
      if (!this.password) {
        return;
      }

      this.loginService.attempt({
        email: this.email,
        password: this.password,
      })
      .then(response => {
        console.log(response);
      });
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

.fade-enter-active,
.fade-leave-active {
    transition: opacity 0.1s;
}

.fade-enter,
  .fade-leave-to
    /* .fade-leave-active in <2.1.8 */

 {
    opacity: 0;
}
</style>
