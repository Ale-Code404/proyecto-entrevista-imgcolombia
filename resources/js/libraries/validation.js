import { defineRule, configure } from 'vee-validate';
import { required, email } from '@vee-validate/rules';

import { localize, setLocale } from '@vee-validate/i18n';
import * as es from '@vee-validate/i18n/dist/locale/es.json';

const configureValidation = () => {
  defineRule('required', required);
  defineRule('email', email);

  configure({
    generateMessage: localize({ es })
  });

  setLocale('es');
}

export {
  configureValidation
}


