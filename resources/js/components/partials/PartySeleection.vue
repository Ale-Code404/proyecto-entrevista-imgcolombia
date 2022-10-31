<template>
  <label class="block text-sm">
    <span class="text-gray-700 dark:text-gray-400">{{ partyType.name }}</span>
    <select
      ref="select"
      class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
      :placeholder="`Seleccione un ${partyType.name}`"/>
  </label>
</template>

<script>
import TomSelect from './../../libraries/tom-select';
import Party from '../../logic/party';

export default {
  name: 'PartySelection',

  emits: ['update:party'],

  data() {
    return { partyId: null }
  },

  props: {
    party: {
      type: String | null,
      default: null
    },

    partyType: {
      type: Object,
      default: Party.types.Client
    },

    canCreate: {
      type: Boolean,
      default: false
    }
  },

  methods: {
    createPartySelect(){
      return new Promise((resolve) => {
        new TomSelect(this.$refs.select, {
          allowEmptyOption: true
        });
      });
    }
  },

  mounted(){
    if(this.party) this.partyId = this.party;

    this.createPartySelect().then(console.log("Terceros cargados"));
  }
}
</script>
