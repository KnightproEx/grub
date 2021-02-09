$(document).ready(function() {

  $("#form").submit(function(event) {

    event.preventDefault();

    var form_data = new FormData();
    var field_data = $(this).serializeFormJSON();
    var ssm_img = $("#ssm_img").get(0).files;
    var res_img = $("#res_img").get(0).files;

    if (ssm_img.length < 1 || res_img.length < 1) {
      $("#error").attr("class", "red--text");
      $("#error").text("Please fill all the fields!");
      return;
    }

    form_data.append("data", JSON.stringify(field_data));
    form_data.append("ssm_img", ssm_img[0]);
    form_data.append("res_img", res_img[0]);

    $.ajax({
      type: "POST",
      url: "SignUp.php",
      data: form_data,
      processData: false,
      contentType: false,

      success: function(json_result) {

        console.log(json_result);

        var result = JSON.parse(json_result);

        if (result.error) {
          $("#error").attr("class", "red--text");
          $("#error").text(result.errorMsg);
          return;
        }

        $("#error").attr("class", "green--text")
        $("#error").text("User created!");

        window.location.replace("../../Grub/PartnerLogin/LoginPage.php");
        
      }

    });

  });

});


new Vue({
  el: '#app',
  vuetify: new Vuetify(),
  data: () => ({
    show1: false,
    rules: {
      required: value => !!value || 'Required.',
      min: v => v.length >= 8 || 'Min 8 characters',
    },
  }),
})

