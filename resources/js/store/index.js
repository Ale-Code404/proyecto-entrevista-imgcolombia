import { createStore } from "vuex";
import VuexPersistence from "vuex-persist";

const { plugin: vuexLocalStoragePlugin } = new VuexPersistence({
  storage: window.localStorage,
  key: 'igm-colombia'
});

import auth from "./auth";
import purchases from './purchases';

const store = createStore({
  modules: {
    auth,
    purchases
  },

  plugins: [
    vuexLocalStoragePlugin
  ]
});

export default store;
