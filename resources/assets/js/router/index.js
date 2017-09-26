import Vue from 'vue'
import Router from 'vue-router'
import Main from '../components/main/main'
import CSV from '../components/csv/CSV'
import EditPerson from '../components/person/Edit'
import NewPerson from '../components/person/New'

Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/',
      name: 'Main',
      component: Main
    },
    {
        path: '/CSV',
        name: 'CSV',
        component: CSV
      }, 
      {
          path: '/people/new',
          name: 'NewPerson',
          component: NewPerson
      },
      {
          path: '/people/edit/:id',
          name: 'EditPerson',
         component: EditPerson
      },
  ]
})