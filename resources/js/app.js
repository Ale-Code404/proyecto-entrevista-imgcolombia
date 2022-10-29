import './bootstrap';

// Configuracion de la plantilla
import './template/focus-trap';
import './template/init-alpine';

import { createApp } from 'vue';
import BaseApp from './components/BaseApp.vue';

import router from './routes';
import store from './store';

createApp(BaseApp)
  .use(router)
  .use(store)
  .mount('#app');
