function editprofile() {

    var form_data = $("#editprofileform").serializeFormJSON();

    $.ajax({
      type: "POST",
      url: "EditProfile.php",
      data: JSON.stringify(form_data),

      success: function(json_result) {

        var result = JSON.parse(json_result);

        if (result.error) {
          $("#profile-error").attr("class", "red--text");
          $("#profile-error").text(result.errorMsg);
          return;
        }

        $("#profile-error").attr("class", "green--text");
        $("#profile-error").text("Profile updated!");

        window.location.replace("ProfilePage.php");
        
      }

    });

}


function changepass() {

    var form_data = $("#changepassform").serializeFormJSON();

    $.ajax({
      type: "POST",
      url: "ChangePassword.php",
      data: JSON.stringify(form_data),

      success: function(json_result) {

        var result = JSON.parse(json_result);

        if (result.error) {
          $("#pass-error").attr("class", "red--text");
          $("#pass-error").text(result.errorMsg);
          return;
        }

        if (result.login) {
          $("#pass-error").attr("class", "green--text");
          $("#pass-error").text("Password updated!");

          window.location.replace("ProfilePage.php");
          return;
        }

        $("#pass-error").attr("class", "red--text");
        $("#pass-error").text("Wrong password!");
        
      }

    });

}

new Vue({
  el: '#app',
  vuetify: new Vuetify(),
  data: () => ({
    drawer: false,
    profile_dialog: false,
    pass_dialog: false,
    logout_dialog: false,
    show1: false,
    show2: false,
    rules: {
      required: value => !!value || 'Required.',
      min: v => v.length >= 8 || 'Min 8 characters',
    },
  }),
})