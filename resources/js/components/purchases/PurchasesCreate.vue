<template>
  <base-app-layout>
  <template #content>
    <div class="grid grid-cols-12 gap-6 container px-6 mx-auto">
      <div class="col-span-12">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">Crear nueva factura de compra</h2>
      </div>
      <!-- General information -->
      <div class="col-span-12 lg:col-span-6 px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
        <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">Información general</h4>
        <div class="grid grid-cols-12 gap-6">
          <div class="col-span-6">
            <label class="block text-sm">
              <span class="text-gray-700 dark:text-gray-400">Cliente</span>
              <input
                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                placeholder="Cliente"/>
            </label>
          </div>
          <div class="col-span-6">
            <label class="block text-sm">
              <span class="text-gray-700 dark:text-gray-400">Proveedor</span>
              <input
                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                placeholder="Cliente"/>
            </label>
          </div>
        </div>

        <label class="block mt-4 text-sm">
          <span class="text-gray-700 dark:text-gray-400">Detalle</span>
          <textarea
            class="block w-full mt-1 text-sm resize-none dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
            rows="3"
            placeholder="Factura de compra de maquina pesada con codigo INV000005"
          ></textarea>
        </label>
      </div>

      <!-- Detailed informacion -->
      <div class="col-span-12 lg:col-span-6 px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
        <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">Detalles de la compra</h4>
        <div class="grid grid-cols-12 gap-6">
          <div class="col-span-6">
            <label class="block text-sm">
              <span class="text-gray-700 dark:text-gray-400">Fecha</span>
              <input
                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                type="date"/>
            </label>
          </div>
          <div class="col-span-6">
            <label class="block text-sm">
              <span class="text-gray-700 dark:text-gray-400">Proveedor</span>
              <input
                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                placeholder="Cliente"/>
            </label>
          </div>
        </div>

        <label class="block mt-4 text-sm">
          <span class="text-gray-700 dark:text-gray-400">Detalle</span>
          <textarea
            class="block w-full mt-1 text-sm resize-none dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
            rows="3"
            placeholder="Factura de compra de maquina pesada con codigo INV000005"
          ></textarea>
        </label>
      </div>
    </div>
  </template>
  </base-app-layout>
</template>

<script>
import BaseAppLayout from './../BaseAppLayout.vue';

export default {
  name: 'PurchasesCreate',

  components: {
    BaseAppLayout
  }
}
</script>

