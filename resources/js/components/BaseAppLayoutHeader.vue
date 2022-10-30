<template>
  <header class="z-10 py-4 bg-white shadow-md dark:bg-gray-800">
    <div class="container flex items-center md:justify-end justify-between h-full px-6 mx-auto text-purple-600 dark:text-purple-300">
      <!-- Mobile hamburger -->
      <button
        class="p-1 -ml-1 mr-5 rounded-md md:hidden focus:outline-none focus:shadow-outline-purple"
        @click="toggleSideMenu"
        aria-label="Menu">
        <svg
          class="w-6 h-6"
          aria-hidden="true"
          fill="currentColor"
          viewBox="0 0 20 20"
        >
          <path
            fill-rule="evenodd"
            d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
            clip-rule="evenodd"
          ></path>
        </svg>
      </button>
      <ul class="flex items-center flex-shrink-0 space-x-6">
        <!-- Profile menu -->
        <li class="relative">
          <button
            class="align-middle rounded-full shadow-outline-purple"
            @click="toggleProfileMenu"
            @keydown.escape="closeProfileMenu"
            aria-label="Account"
            aria-haspopup="true"
          >
            <img
              class="object-cover w-8 h-8 rounded-full"
              :src="imageUser"
              alt="user-image"
              aria-hidden="true"
            />
          </button>
          <div v-show="isProfileMenuOpen">
            <ul
              class="absolute right-0 w-56 p-2 mt-2 space-y-2 text-gray-600 bg-white border border-gray-100 rounded-md shadow-md dark:border-gray-700 dark:text-gray-300 dark:bg-gray-700" aria-label="submenu"
              @click="closeProfileMenu">
              <li class="flex">
                <a class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200" href="#">
                  <font-awesome-icon class="mr-3" icon="fa-solid fa-arrow-right-from-bracket" />
                  <span>Cerrar sesión</span>
                </a>
              </li>
            </ul>
          </div>
        </li>
      </ul>
    </div>
  </header>
</template>

<script>
import { mapState } from "vuex";

import { library } from '@fortawesome/fontawesome-svg-core';
import { faArrowRightFromBracket } from '@fortawesome/free-solid-svg-icons';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';

library.add(faArrowRightFromBracket);

export default {
  name: 'BaseAppLayoutHeader',

  data() {
    return { isProfileMenuOpen: false }
  },

  components: {
    FontAwesomeIcon
  },

  methods: {
    toggleProfileMenu() {
      this.isProfileMenuOpen = !this.isProfileMenuOpen
    },

    closeProfileMenu() {
      this.isProfileMenuOpen = false
    }
  },

  computed: {
    ...mapState('auth', ['user']),

    imageUser(){
        return `https://avatars.dicebear.com/api/big-smile/${this.user.name}.svg`;
    }
  }
}
</script>
