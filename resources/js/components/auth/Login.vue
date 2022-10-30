<template>
  <div class="flex items-center min-h-screen p-6 bg-gray-50 dark:bg-gray-900">
    <div class="flex-1 h-full max-w-4xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl dark:bg-gray-800">
      <div class="flex flex-col overflow-y-auto md:flex-row">
        <div class="h-32 md:h-auto md:w-1/2">
          <img
              aria-hidden="true"
              class="object-cover w-full h-full dark:hidden"
              src="../../../assets/img/template/login-office.jpeg"
              alt="Office"/>
          <img
              aria-hidden="true"
              class="hidden object-cover w-full h-full dark:block"
              src="../../../assets/img/template/login-office-dark.jpeg"
              alt="Office"/>
        </div>
        <div class="flexi tems-center justify-center p-6 sm:p-12 md:w-1/2">
          <div class="w-full">
            <h1 class="mb-4 text-xl font-semibold text-gray-700 dark:text-gray-200">
                Login
            </h1>
            <VForm @submit="onSubmit" v-slot="{ isSubmitting, meta }" :validation-schema="validationSchema">
              <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Correo electrónico</span>
                <VField
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="mi-correo@example.com"
                  type="email"
                  name="email"
                  autocomplete="email"
                  v-slot="{ meta }"/>
                <VErrorMessage name="email" :class="{ 'text-xs text-red-600 dark:text-red-400': (!meta.valid && meta.touched) }"/>
              </label>
              <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">Contraseña</span>
                <div class="relative text-gray-500">
                  <VField v-slot="{ meta, field }" name="password">
                    <input
                      class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                      placeholder="***************"
                      :type="passwordType"
                      autocomplete="current-password"
                      v-bind="field" />
                    <button
                      class="absolute inset-y-0 right-0 px-4 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                      type="button"
                      @click="togglePasswordAsText">
                        <font-awesome-icon :icon="`fa-solid ${passwordAsText ? 'fa-eye' : 'fa-eye-slash'}`" />
                    </button>
                  </VField>
                </div>
                <VErrorMessage name="password" :class="{ 'text-xs text-red-600 dark:text-red-400': (!meta.valid && meta.touched) }"/>
              </label>
              <button
                class="inline-flex items-center justify-center w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-all duration-300 ease-out bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                :class="{ 'opacity-20 ': !meta.valid , 'opacity-50' : isSubmitting }"
                type="submit"
                :disabled="(!meta.valid || isSubmitting)">
                <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" v-show="isSubmitting">
                  <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                  <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                Iniciar sesión
              </button>
            </VForm>
            <p class="mt-4">
              <a class="text-sm font-medium text-purple-600 dark:text-purple-400 hover:underline" href="#">
                  Olvidé mi contraseña
              </a>
            </p>
            <p class="mt-1">
              <a class="text-sm font-medium text-purple-600 dark:text-purple-400 hover:underline" href="/register">
                  Crear una cuenta
              </a>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
//Use validation configuration
import { configureValidation } from  '../../libraries/validation';
import { Field, Form, ErrorMessage } from 'vee-validate';
import { mapActions } from 'vuex';
import Toast from '../../libraries/swal';

import { library } from '@fortawesome/fontawesome-svg-core'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import { faEyeSlash, faEye } from '@fortawesome/free-solid-svg-icons'

library.add(faEye, faEyeSlash);
configureValidation();

export default {
  name: 'Login',

  components: {
    VField: Field,
    VForm: Form,
    VErrorMessage: ErrorMessage,
    FontAwesomeIcon
  },

  data(){
    return {
      passwordAsText: false,

      validationSchema: {
        email: 'required|email',
        password: 'required'
      }
    }
  },

  methods: {
    ...mapActions('auth', ['makeLogin']),

    togglePasswordAsText() {
      this.passwordAsText = !this.passwordAsText;
    },

    onSubmit(values) {
      const notification = { icon: 'success' };

      return new Promise((resolve) => {
        this.makeLogin({ ...values }).then((message) => {
          notification.text = message;
          this.$router.push({ name: 'Home' });
        }).catch(({ message }) => {
          notification.icon = 'error';
          notification.text = message;
        }).finally(() => {
          resolve(true);
          Toast.fire(notification)
        });
      });
    }
  },

  computed: {
    passwordType(){
      return this.passwordAsText ? 'text' : 'password';
    }
  }
}
</script>
