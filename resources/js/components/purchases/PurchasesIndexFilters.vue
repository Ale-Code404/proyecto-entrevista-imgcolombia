<template>
  <div class="flex justify-between items-center px-4 py-3 mb-8 bg-white rounded-lg shadow-md">
    <div class="grid grid-cols-12 gap-6">
      <label class="col-span-3">
        <span class="text-sm text-gray-700 dark:text-gray-400">Cliente</span>
        <select id="client-filter">
          <option value="" selected>Todos</option>
        </select>
      </label>
      <label class="col-span-3">
        <span class="text-sm text-gray-700 dark:text-gray-400">Proveedor</span>
        <select id="supplier-filter">
          <option value="" selected>Todos</option>
        </select>
      </label>
      <label class="col-span-2">
        <span class="text-sm text-gray-700 dark:text-gray-400">Factura</span>
        <input class="block w-full text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"/>
      </label>
      <label class="col-span-2">
        <span class="text-sm text-gray-700 dark:text-gray-400">Fecha (antes de)</span>
        <input class="block w-full text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" type="date"/>
      </label>
    </div>

    <button
      class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
        Buscar
    </button>
  </div>
</template>

<script>

import TomSelect from '../../libraries/tom-select';

export default {
  name: 'PurchasesIndexFilters',

  methods: {
    createFilters() {
      const clientFilter = new TomSelect('#client-filter', {
        allowEmptyOption: true
      });

      const suppplierFilter = new TomSelect('#supplier-filter', {
        allowEmptyOption: true
      });
    }
  },

  mounted(){
    this.createFilters();
  }
}
</script>
