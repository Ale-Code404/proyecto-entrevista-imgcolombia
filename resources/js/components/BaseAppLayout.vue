<template>
  <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{'overflow-hidden': isSideMenuOpen }">
    <base-app-layout-aside :is-side-menu-open="isSideMenuOpen" @side-menu-close="closeSideMenu"/>
    <div class="flex flex-col flex-1">
      <base-app-layout-header />
      <main class="h-full pb-16 overflow-y-auto">
        <slot name="content"/>
      </main>
    </div>
  </div>
</template>

<script>

import BaseAppLayoutHeader from './BaseAppLayoutHeader.vue';
import BaseAppLayoutAside from './BaseAppLayoutAside.vue';

export default {
  name: 'BaseAppLayout',

  components: {
    BaseAppLayoutHeader,
    BaseAppLayoutAside
  },

  data() {
    return {
      isModalOpen: false,
      isNotificationsMenuOpen: false,
      isSideMenuOpen: false,
      trapCleanup: null
    }
  },

  methods: {
    getThemeFromLocalStorage() {
      // if user already changed the theme, use it
      if (window.localStorage.getItem('dark')) {
        return JSON.parse(window.localStorage.getItem('dark'))
      }

      // else return their preferences
      return (
        !!window.matchMedia &&
        window.matchMedia('(prefers-color-scheme: dark)').matches
      )
    },

    setThemeToLocalStorage(value) {
      window.localStorage.setItem('dark', value)
    },

    // Modals
    openModal() {
      this.isModalOpen = true
      this.trapCleanup = focusTrap(document.querySelector('#modal'))
    },

    closeModal() {
      this.isModalOpen = false
      this.trapCleanup()
    },

    closeSideMenu() {
      this.isSideMenuOpen = false;
    },

    toggleTheme() {
      this.dark = !this.dark
      setThemeToLocalStorage(this.dark)
    },

    toggleSideMenu() {
      this.isSideMenuOpen = !this.isSideMenuOpen
    },

    toggleNotificationsMenu() {
      this.isNotificationsMenuOpen = !this.isNotificationsMenuOpen
    },

    closeNotificationsMenu() {
      this.isNotificationsMenuOpen = false
    }
  },

  mounted() {
    this.dark = this.getThemeFromLocalStorage();
  }
}
</script>
