<template>
  <div class="w-full">
    <table class="bg-white rounded-lg shadow-md" id="purchases-table"/>
  </div>
</template>

<script>
import { mapState } from 'vuex';

import Tabulator from '../../libraries/tabulator';

export default {
  name: 'PurchasesIndexList',

  methods: {
    createTable(){
      this.purchasesTable = new Tabulator('#purchases-table', {
        locale: true,
        data: this.purchases,
        layout: "fitColumns",
        pagination: true,
        paginationMode: "remote",
        paginationSize: 50,
        paginationInitialPage: 2,
        columns: [
          {title: "#", field:"name", width: 30 },
          {title: "Doc. referencia", field:"progress", },
          {title: "Proveedor", field:"progress" },
          {title: "Cliente", field:"col"},
          {title: "Fecha y hora", field:"dob", sorter:"date" },
          {title: "Valor total", field:"dob" },
        ]
      });
    }
  },

  computed:  {
    ...mapState('purchases', ['purchases'])
  },

  mounted() {
    this.createTable();
  }
}
</script>
