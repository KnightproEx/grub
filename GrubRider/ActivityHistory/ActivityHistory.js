$(document).ready(function() {

  $.ajax({
    type: "POST",
    url: "ActivityHistory.php",

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
    items: [],
  }),

  methods: {
    fetch_data(item) {
      this.items = item;
    }
  }

})