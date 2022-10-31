<template>
  <div class="col-span-12 lg:col-span-6 px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
    <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">Información general</h4>
    <div class="grid grid-cols-12 gap-x-6 gap-y-2">
      <div class="col-span-6">
        <party-selection v-model:party="purchase.cliente_id" :party-type="partyTypes.Client" :key="1"/>
      </div>
      <div class="col-span-6">
        <party-selection v-model:party="purchase.proveedor_id" :party-type="partyTypes.Provider" :key="2"/>
      </div>
      <div class="col-span-12">
        <label class="block text-sm">
          <span class="text-gray-700 dark:text-gray-400">Forma de pago</span>
          <select
            class="w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
            :value="purchase.forma_pagos_id">
            <option value="1">Contado</option>
            <option value="2">Crédito</option>
          </select>
        </label>
      </div>
    </div>
  </div>
</template>

<script>

import PartySelection from '../partials/PartySeleection.vue';
import Party from '../../logic/party';

export default {
  name: 'PurchasesFormGeneralInformation',

  data() {
    return {
      partyTypes: Party.types
    }
  },

  components: {
    PartySelection
  },

  props: {
    purchase: {
      type: Object,
      default: ({
        cliente_id: null,
        proveedor_id: null,
        forma_pagos_id: null
      })
    }
  }
}
</script>
