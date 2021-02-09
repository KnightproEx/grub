var vue = new Vue({
	el: '#app',
	vuetify: new Vuetify(),
	data: () => ({
		drawer: false,
		back_dialog: false,
    	logout_dialog: false,
    	selection: 1,
    	cart: [],
	}),

	methods: {
		makepayment() {

			$.ajax({
	            type: "POST",
	            url: "PaymentMethod.php",
	            data: JSON.stringify({payment_method: this.selection}),
	        });

	        window.location.href = "../TrackOrder/TrackOrderPage.php";
		
		}
	}

})