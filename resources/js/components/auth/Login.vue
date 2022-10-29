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
            <VForm v-slot="{ handleSubmit }" @validation-schema="validationSchema" as="div">
                <form @submit="handleSubmit($event, onSubmit)">
                  <label class="block text-sm">
                      <VField v-slot="{ field, errorMessage }" v-model="email" name="email">
                        <span class="text-gray-700 dark:text-gray-400">Correo electrónico</span>
                        <input
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            placeholder="mi-correo@example.com"
                            type="email"
                            required
                            autocomplete="email"
                            v-bind="field"/>
                        <span class="text-xs">{{ errorMessage }}</span>
                      </VField>
                  </label>
                  <label class="block mt-4 text-sm">
                      <span class="text-gray-700 dark:text-gray-400">Contraseña</span>
                      <input
                          class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                          placeholder="***************"
                          type="password"
                          required
                          autocomplete="current-password"
                          v-model="password"/>
                  </label>
                  <button
                    class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                    type="submit">
                    Iniciar sesión
                  </button>
                </form>
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
import { mapActions } from 'vuex';
import { Field, Form, ErrorMessage, defineRule } from 'vee-validate';
import { required, email } from '@vee-validate/rules';

defineRule('required', required);
defineRule('email', email);

import Toast from '../../libraries/swal';

export default {
  name: 'Login',

  components: {
    VField: Field,
    VForm: Form,
    VErrorMessage: ErrorMessage
  },

  data(){
    return {
      validationSchema: {
        email: 'required|email',
        password: 'required'
      },

      email: '',
      password: ''
    }
  },

  methods: {
    ...mapActions('auth', ['makeLogin']),

    validationClasses: (withError) => {
        if (withError) {
            return {
                message: 'text-red-600',
                input: 'border-red-600 focus:border-red-400 focus:outline-none focus:shadow-outline-red'
            }
        }else{
            return {
                message: 'text-green-600',
                input: 'border-green-600 focus:border-green-400 focus:outline-none focus:shadow-outline-green'
            }
        }
    },

    onSubmit(values) {
      this.makeLogin({ email: this.email, password: this.password }).then((message) => {
        Toast.fire({
          text: message,
          icon: 'success'
        });

        this.$router.push({ name: 'Home' });
      }).catch(({ message }) => {
        Toast.fire({
          text: message,
          icon: 'error'
        });
      })
    }
  }
}
</script>
