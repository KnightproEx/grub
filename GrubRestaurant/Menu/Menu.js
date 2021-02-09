function addmenu() {

    var form_data = new FormData(); 
    var image = $("#add_menu_image").get(0).files;
    var field_data = $("#addmenuform").serializeFormJSON();

    if (!image.length > 0) {
      $("#add-error").attr("class", "red--text");
      $("#add-error").text("Field cannot be empty!");
      return;
    }

    form_data.append("data", JSON.stringify(field_data));
    form_data.append("image", image[0]);

    $.ajax({
      type: "POST",
      url: "AddMenu.php",
      data: form_data,
      processData: false,
      contentType: false,

      success: function(json_result) {

        var result = JSON.parse(json_result);

        if (result.error) {
          $("#add-error").attr("class", "red--text");
          $("#add-error").text(result.errorMsg);
          return;
        }

        $("#add-error").text("");
        fetchdata();
        $("#addmenuform").trigger("reset");
        vue.form = ["", "", "", null];
        vue.closemenu();
      }

    });

}


function editmenu(index) {

    var form_data = new FormData(); 
    var image = $("#editmenuimage" + index).get(0).files;
    var field_data = $("#editmenuform" + index).serializeFormJSON();

    field_data["item_id"] = vue.cards[index].item_id;
    field_data["image"] = image.length > 0 ? true : false;

    form_data.append("data", JSON.stringify(field_data));
    form_data.append("image", image[0]);

    $.ajax({
      type: "POST",
      url: "EditMenu.php",
      data: form_data,
      processData: false,
      contentType: false,

      success: function(json_result) {

        var result = JSON.parse(json_result);

        if (result.error) {
          $("#menu-error").attr("class", "red--text");
          $("#menu-error").text(result.errorMsg);
          return;
        }

        $("#menu-error").text("");
        fetchdata();

        if (field_data["image"]) {
          window.location.href = "MenuPage.php";
        }
        
      }

    });

}


function deletemenu(index) {

    var form_data = { item_id : vue.cards[index].item_id };

    $.ajax({
      type: "POST",
      url: "DeleteMenu.php",
      data: JSON.stringify(form_data),

      success: function(json_result) {

        var result = JSON.parse(json_result);

        if (result.error) {
          console.log(result.errorMsg);
          return;
        }

        fetchdata();
        
      }

    });

}


function fetchdata() {

  $.ajax({
    type: "POST",
    url: "Menu.php",

    success: function(json_result) {

      var result = JSON.parse(json_result);
      var item = new Array();

      for (var i=0; i < result.itemlist.length; i++) {
        item[i] = result.itemlist[i];
      }

      vue.fetch_data(item);

    }

  });

}

$(document).ready(function() {
  fetchdata();
});


var vue = new Vue({
  el: '#app',
  vuetify: new Vuetify(),
  data: () => ({
    drawer: false,
    add_menu_dialog: false,
    logout_dialog: false,
    edit_menu_dialog: [],
    delete_menu_dialog: [],
    cards: [],
    editmenuform: [],
    editmenuimage: [],
    form: ["", "", "", null]
  }),

  methods: {
    fetch_data(item) {
      this.cards = item

      for (var i=0; i<item.length; i++) {
        this.edit_menu_dialog[i] = false
        this.delete_menu_dialog[i] = false
        this.editmenuform[i] = "editmenuform" + i
        this.editmenuimage[i] = "editmenuimage" + i
      }

    },

    editmenu(index) {
      editmenu(index)
    },

    deletemenu(index) {
      deletemenu(index)
    },

    closemenu() {
      this.add_menu_dialog = false
    }

  }

})
