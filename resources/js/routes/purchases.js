const PurchasesIndex = () => import('../components/purchases/PurchasesIndex.vue');
const PurchasesForm = () => import('../components/purchases/PurchasesForm.vue');

export const purchaseRoutes = [
    {
        name: 'PurchasesIndex',
        path: '/purchases',
        component: PurchasesIndex
    },
    {
        name: 'PurchasesCreate',
        path: '/purchases/create',
        component: PurchasesForm
    },
    {
      name: 'PurchasesEdit',
      path: '/purchases/:purchaseId/edit',
      component: PurchasesForm,
      props: true
  }
];
