<template>
  <base-app-layout>
    <template #content>
      <div class="container grid px-6 mx-auto">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Listado de facturas de compra
        </h2>
        <div class="flex justify-end px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
          <button class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
            Crear nueva factura
          </button>
        </div>
        <table class="w-full" id="purchases-table"/>
      </div>
    </template>
  </base-app-layout>
</template>

<script>

import BaseAppLayout from './../BaseAppLayout.vue';
import { Tabulator } from 'tabulator-tables';

export default {
  name: 'PurchasesIndex',

  components: {
    BaseAppLayout
  },

  methods: {
    createTable(){
      this.purchaseSTable = new Tabulator('#purchases-table', {

      });
    }
  },

  mounted() {
    this.createTable();
  }
}
</script>
