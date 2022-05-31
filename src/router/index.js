import Vue from 'vue'
import VueRouter from 'vue-router'
import Default from '@/components/Default-component'
import Contact from '@/components/Contact-component'
import Home from '@/components/Home-component'
import NotFound from '@/components/NotFound'


import WEB from '@/assets/page-definition.json';


// {
//   path: '/about',
//   name: 'about',
//   // route level code-splitting
//   // this generates a separate chunk (about.[hash].js) for this route
//   // which is lazy-loaded when the route is visited.
//   component: () => import(/* webpackChunkName: "about" */ '../views/AboutView.vue')
// }
Vue.use(VueRouter)

const pageKeys = Object.keys(WEB.pages);
const pages = pageKeys.map(p => ({ path: '/' + p, name: p, component: p == 'contact' ? Contact  : {...Default} }))
pages.push({
  path: "/:catchAll(.*)",
  component: NotFound,
})

pages.unshift({
  path: "/",
  component: Home,
  name: 'home',
})
console.log(pages)
// const routes = [
//   {
//     path: "/",
//     name: "index",
//     component: Default,
//   },
//   {
//     path: "/contact",
//     name: "contact",
//     component: Contact,
//   },
//   {
//     path: "/about",
//     name: "about",
//     component: About,
//   },
//   {
//     path: "/courses",
//     name: "courses",
//     component: Courses,
//   },
//   {
//     path: "/:catchAll(.*)",
//     component: NotFound,
//   }

// ]

const router = new VueRouter({
  // mode: 'history',
  routes : pages
})

export default router
