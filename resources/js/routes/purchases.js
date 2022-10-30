const PurchasesIndex = () => import('../components/purchases/PurchasesIndex.vue');
const PurchasesCreate = () => import('../components/purchases/PurchasesCreate.vue');

export const purchaseRoutes = [
    {
        name: 'PurchasesIndex',
        path: '/purchases',
        component: PurchasesIndex,
        meta: { requireAuth: true }
    },
    {
        name: 'PurchasesCreate',
        path: '/purchases/create',
        component: PurchasesCreate,
        meta: { requireAuth: true }
    }
];
