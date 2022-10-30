<template>
  <base-app-layout>
    <template #content>
      <div class="container grid grid-cols-12 px-6 mx-auto">
        <div class="col-span-12">
          <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">Listado de facturas de compra (Compras)</h2>
        </div>
        <div class="col-span-12">
          <purchases-index-filters/>
        </div>
        <div class="col-span-12">
          <purchases-index-list/>
        </div>
      </div>
    </template>
  </base-app-layout>
</template>

<script>

import BaseAppLayout from './../BaseAppLayout.vue';
import PurchasesIndexList from './PurchasesIndexList.vue';
import PurchasesIndexFilters from './PurchasesIndexFilters.vue';

export default {
  name: 'PurchasesIndex',

  components: {
    BaseAppLayout,
    PurchasesIndexList,
    PurchasesIndexFilters
  }
}
</script>
