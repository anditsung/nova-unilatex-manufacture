import NovaSidebarMenu from 'nova-sidebar-menu'

Nova.booting((Vue, router, store) => {
  router.addRoutes([
    {
      name: 'manufacture',
      path: '/manufacture',
      component: require('./components/Tool'),
    },
  ])

    Vue.component('nova-sidebar', NovaSidebarMenu)
})
