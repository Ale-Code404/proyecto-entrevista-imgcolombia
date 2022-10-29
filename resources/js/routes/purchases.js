const PurchasesIndex = () => import('../components/purchases/PurchasesIndex.vue');

export const purchaseRoutes = [
    {
        name: 'PurchasesIndex',
        path: '/purchases',
        component: PurchasesIndex,
        meta: { requireAuth: true }
    },
    {
        name: 'PurchasesIndex',
        path: '/purchases/create',
        component: PurchasesIndex,
        meta: { requireAuth: true }
    }
];
