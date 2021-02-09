new Vue({
	el: '#app',
	vuetify: new Vuetify(),
	created: function() {
		$.ajax({
	            type: "POST",
	            url: "UnsetSession.php",
	        });
	},

	data: () => ({
		drawer: false,
		warn_dialog: false,
    	back_dialog: false,
		logout_dialog: false,
    	unit: "",
	}),

	methods: {
		submit() {

			if (this.unit == "") {
				this.warn_dialog = true
				return
			}


			$.ajax({
	            type: "POST",
	            url: "ConfirmAddress.php",
	            data: JSON.stringify({unit: this.unit}),
	        });

	        window.location.href = "../PaymentMethod/PaymentMethodPage.php";
		
		}
	}

});