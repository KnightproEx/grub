function updateStepper() {

	$.ajax({
		type: "POST",
		url: "TrackOrder.php",

		success: function(json_result) {

			var result = JSON.parse(json_result);

			if (result.error) {
				console.log(result.errorMsg);
			}

			vue.updateId(result.id);
			vue.updateDate(result.date);
			vue.updateStep(result.step);

		}

	});

}

var vue = new Vue({
  el: '#app',
  vuetify: new Vuetify(),
  data: () => ({
  	drawer: false,
  	id: "",
  	date: "",
  	stepper: 1,
    back_dialog: false,
    logout_dialog: false,
  }),

  created: function() {
	 // setInterval(updateStepper, 2000);
	 setInterval(function() { vue.updateStep(vue.stepper + 1) }, 2000)
  },

  methods: {
  	updateId(id) {
  		this.id = id
  	},

  	updateDate(date) {
  		this.date = date
  	},

  	updateStep(step) {
  		this.stepper = step
  	}

  },

  watch: {
    stepper(val) {
      if (val == 4) {
        window.location.href = "../ThankYou/ThankYouPage.php"
      }
    }
  }

})
