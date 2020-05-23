import Vue from 'vue'
import VueRouter from 'vue-router'
import HomeComponent from '../views/HomeComponent.vue'
import LoginComponent from '../views/LoginComponent.vue'
import ListClientsComponent from '../views/clients/ListClientsComponent.vue'
import CreateClientComponent from '../views/clients/CreateClientComponent.vue'
import CreateDishComponent from '../views/dishes/CreateDishComponent.vue'
import ListDishesComponent from '../views/dishes/ListDishesComponent.vue'
import CreateClientRequestComponent from '../views/client-requests/CreateClientRequestComponent.vue'
import ListClientRequestsComponent from '../views/client-requests/ListClientRequestsComponent.vue'

Vue.use(VueRouter)

const routes = [
  {
		path: '/',
		name: 'home',
		component: HomeComponent
  },
  {
		path: '/login',
		name: 'login',
		component: LoginComponent
  },
  {
    path: '/clientes',
    name: 'list-clients',
    component: ListClientsComponent    
  },
  {
    path: '/clientes/novo',
    name: 'create-client',
    component: CreateClientComponent
  },
  {
    path: '/pratos',
    name: 'list-dishes',
    component: ListDishesComponent
  },
  {
    path: '/pratos/novo',
    name: 'create-dish',
   component: CreateDishComponent
  },
  {
    path: '/pedidos/novo',
    name: 'create-client-request',
    component: CreateClientRequestComponent
  },
  {
    path: '/pedidos',
    name: 'list-client-requests',
    component: ListClientRequestsComponent
  }
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

export default router
