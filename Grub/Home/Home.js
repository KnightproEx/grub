$(document).ready(function() {

  $.ajax({
    type: "POST",
    url: "Home.php",

    success: function(json_result) {

      var result = JSON.parse(json_result);
      var item = new Array();

      for (var i=0; i < result.itemlist.length; i++) {
        item[i] = result.itemlist[i];
      }

      vue.fetch_data(item);

    }

  });

  $("#form").submit(function(event) {

    event.preventDefault();

    var field = vue.fetch_field();

    if (field == null) {
		vue.open_home_dialog();
		return;
	}

    window.location.href = "../SwipeRestaurant/SwipeRestaurantPage.php?loc=" + vue.fetch_field();

  });

  //smooth scrolling
  $("a").on('click', function(event) {

      if (this.hash !== "") {

        event.preventDefault();
        var hash = this.hash;

        $('html, body').animate({
          scrollTop: $(hash).offset().top
        }, 1500, function(){

          window.location.hash = hash;

        });

      }
      
    });

});

var vue = new Vue({
	el: '#app',
	vuetify: new Vuetify(),
	data: () => ({
		drawer: false,
		logout_dialog: false,
		home_dialog: false,
		location: [],
	    field: null,
		icons: [
			'mdi-facebook',
			'mdi-twitter',
			'mdi-linkedin',
			'mdi-instagram',
	    ],
	}),

	methods: {
		fetch_data(item) {
			this.location = item
		},

		fetch_field() {
			return this.field
		},

		open_home_dialog() {
			this.home_dialog = true
		}
	},

})
