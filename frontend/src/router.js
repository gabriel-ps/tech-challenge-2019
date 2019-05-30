// router setup
import VueRouter from "vue-router";
import routes from "@/routes/routes";
import AuthService from '@/domain/login/AuthService';

const authService = new AuthService();


// configure router
const router = new VueRouter({
  routes, // short for routes: routes
  linkExactActiveClass: "nav-item active"
});

router.beforeEach((to, from, next) => {
  // Redirecionar para login se não estiver logado e tentar acessar uma página restrita
  const publicPages = ["/login"];
  const authRequired = !publicPages.includes(to.path);
  const loggedIn = authService.getCurrentUser();

  if (authRequired && !loggedIn) {
    return next("/login");
  }

  next();
});

export default router;
