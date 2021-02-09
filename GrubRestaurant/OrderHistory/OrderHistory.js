$(document).ready(function() {

  $.ajax({
    type: "POST",
    url: "OrderHistory.php",

    success: function(json_result) {

      var result = JSON.parse(json_result);
      var item = new Array();

      for (var i=0; i < result.itemlist.length; i++) {
        item[i] = result.itemlist[i];
      }

      vue.fetch_data(item);

    }

  });

});


var vue = new Vue({
  el: '#app',
  vuetify: new Vuetify(),
    data: () => ({
      drawer: false,
      logout_dialog: false,
      search: "",
      headers: [
        {
          text: 'Item ID',
          align: 'start',
          sortable: false,
          value: 'itemid',
        },
        { text: 'Item', value: 'name' },
        { text: 'Quantity', value: 'quantity' },
        { text: 'Total', value: 'total' },
        { text: 'Order Date', value: 'orderdate' },
        { text: 'Status', value: 'status' },
      ],
      orders: [],
    }),

    methods: {
      fetch_data(item) {
        this.orders = item;
      }
    }

  })