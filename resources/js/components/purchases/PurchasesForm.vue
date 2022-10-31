<template>
  <base-app-layout>
  <template #content>
    <div class="grid grid-cols-12 gap-x-6 container px-6 mx-auto">
      <div class="col-span-12 mb-4">
        <h2 class="mt-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">Crear nueva factura de compra</h2>
      </div>

      <!-- General information -->
      <purchases-form-general-information :purchase="purchase"/>

      <!-- Detailed informacion -->
      <div class="col-span-12 lg:col-span-6 px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
        <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">Detalles de la compra</h4>
        <div class="grid grid-cols-12 gap-x-6 gap-y-2">
          <div class="col-span-12">
            <label class="block text-sm">
              <span class="text-gray-700 dark:text-gray-400">Fecha</span>
              <input
                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                type="date"/>
            </label>
          </div>

          <div class="col-span-12">
            <div class="flex">
              <label class="block w-1/5 mr-6">
                <span class="text-gray-700 dark:text-gray-400">Prefijo</span>
                <input
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="Cliente"/>
              </label>
              <label class="block w-4/5">
                <span class="text-gray-700 dark:text-gray-400">Número</span>
                <input
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="Cliente"/>
              </label>
            </div>
          </div>
        </div>
      </div>

      <!-- Articles selection -->
      <div class="col-span-12 px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
        <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">Artículos</h4>
        <div class="my-2">
          <table class="w-full" id="purchases-articles"></table>
        </div>
      </div>

      <!-- Ways to pay -->
      <div class="col-span-12 lg:col-span-6 px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
        <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">Formas de pago</h4>
        <div class="grid grid-cols-12 items-end gap-x-6 gap-y-2">
          <div class="col-span-10">
            <label class="block text-sm">
              <select class="w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                <option value="1">Contado</option>
                <option value="2">Crédito</option>
              </select>
            </label>
          </div>
          <div class="col-span-2">
            <button class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
              <font-awesome-icon icon="fa-solid fa-plus" size="lg"/>
            </button>
          </div>
        </div>
      </div>

      <!-- General information -->
      <div class="col-span-12 lg:col-span-6 px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
        <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">Totales</h4>
        <div class="grid grid-cols-12 gap-x-6 gap-y-2">
          <div class="col-span-12">
            <label class="block text-sm">
              <span class="text-gray-700 dark:text-gray-400">Valor total de base/bruto</span>
              <input
                class="block w-full mt-1 text-right text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                placeholder="$0.00"/>
            </label>
          </div>
          <div class="col-span-12">
            <label class="block text-sm">
              <span class="text-gray-700 dark:text-gray-400">Valor total de impuestos</span>
              <input
                class="block w-full mt-1 text-right text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                placeholder="$0.00"/>
            </label>
          </div>
          <div class="col-span-12">
            <label class="block text-sm">
              <span class="text-gray-700 dark:text-gray-400">Valor total</span>
              <input
                class="block w-full mt-1 text-right text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                placeholder="$0.00"/>
            </label>
          </div>
        </div>
      </div>

      <!-- Observation -->
      <div class="col-span-12 px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
        <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">Observaciones</h4>
        <label class="block text-sm">
          <textarea
            class="block w-full resize-none mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
            rows="4"
            placeholder="Factura de compra de maquina pesada con codigo INV000005"/>
        </label>
      </div>
    </div>
  </template>
  </base-app-layout>
</template>

<script>
import Tabulator from "../../libraries/tabulator";
import { mapState } from 'vuex';

import BaseAppLayout from '../BaseAppLayout.vue';
import PurchasesFormGeneralInformation from './PurchasesFormGeneralInformation.vue';

import { library } from '@fortawesome/fontawesome-svg-core'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import { faPlus } from '@fortawesome/free-solid-svg-icons'
library.add(faPlus);

export default {
  name: 'PurchasesForm',

  data() {
    return {
      purchase: null
    }
  },

  components: {
    BaseAppLayout,
    PurchasesFormGeneralInformation,
    FontAwesomeIcon
  },

  methods: {
    createArticlesTable() {
      this.articlesTable = new Tabulator('#purchases-articles', {

      });
    }
  },

  computed: {
    ...mapState('purchases', ['newPurchase'])
  },

  beforeMount() {
    this.purchase = { ...this.newPurchase };
  }
}
</script>

