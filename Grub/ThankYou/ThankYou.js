var vue = new Vue({
  el: '#app',
  vuetify: new Vuetify(),
  data: () => ({
  	item: [],
    drawer: false,
    back_dialog: false,
    logout_dialog: false,
  }),

  created: function() {
    $.ajax({
      type: "POST",
      url: "ThankYou.php",

      success: function(json_result) {

        var result = JSON.parse(json_result);
        
        if (result.error) {
          console.log(result.errorMsg);
        }
        
        vue.updateItem(result.item);

      }

    });
  },

  methods: {
  	updateItem(item) {
  		this.item = item
  	},

  }

})