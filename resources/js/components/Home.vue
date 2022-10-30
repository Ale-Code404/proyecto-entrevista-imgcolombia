<template>
  <base-app-layout>
    <template #content>
      <div class="container px-6 mx-auto grid">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
          Bienvenido@, {{ user.name }}
        </h2>
      </div>
    </template>
  </base-app-layout>
</template>

<script>
import { mapState } from "vuex";
import BaseAppLayout from "./BaseAppLayout.vue";

export default {
  name: 'Home',

  components: {
    BaseAppLayout
  },

  computed: {
    ...mapState('auth', ['user'])
  }
}
</script>
