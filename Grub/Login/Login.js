$(document).ready(function() {

  $("#form").submit(function(event) {

    event.preventDefault();
    var form_data = $(this).serializeFormJSON();

    $.ajax({
      type: "POST",
      url: "Login.php",
      data: JSON.stringify(form_data),

      success: function(json_result) {

        var result = JSON.parse(json_result);
        
        if (result.error) {
          $("#error").attr("class", "red--text");
          $("#error").text(result.errorMsg);
          return;
        }

        if (result.login) {
          $("#error").attr("class", "green--text");
          $("#error").text("Login successful!");
          window.location.replace(page);
          return;
        }

        $("#error").attr("class", "red--text");
        $("#error").text("Invalid credentials!");

      }

    });

  });

});


new Vue({
  el: '#app',
  vuetify: new Vuetify(),
})