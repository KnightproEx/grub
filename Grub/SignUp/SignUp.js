$(document).ready(function() {

  $("#form").submit(function(event) {

    event.preventDefault();
    var form_data = $(this).serializeFormJSON();

    $.ajax({
      type: "POST",
      url: "SignUp.php",
      data: JSON.stringify(form_data),

      success: function(json_result) {
        var result = JSON.parse(json_result);

        if (result.error) {
          $("#error").attr("class", "red--text");
          $("#error").text(result.errorMsg);
          return;
        }

        $("#error").attr("class", "green--text")
        $("#error").text("User created!");
        
        window.location.replace("../Login/LoginPage.php");
      }

    });

  });

});


new Vue({
  el: '#app',
  vuetify: new Vuetify(),
  data () {
    return {
      drawer: false,
      show1: false,
      rules: {
        required: value => !!value || 'Required.',
        min: v => v.length >= 8 || 'Min 8 characters',
      },
    }
  },
})

