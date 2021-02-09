<?php

include("../../Assets/PHP/res_session.php");

!$res_login ?: header("Location: ../Menu/MenuPage.php");

?>

<html>
    <head>
        <!-- Material and Vuetify CSS Reference -->
        <?php require_once("../../Assets/CDN/header.php"); ?>
        <link href="Login.css" rel="stylesheet" type="text/css">

        <script type="text/javascript">
          $(document).ready(function() {

            //login form submit handler
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
                    
                    window.location.replace("../Menu/MenuPage.php");
                    
                  } else {
                    $("#error").attr("class", "red--text");
                    $("#error").text("Invalid credentials!");
                  }

                }

              });

            });

          });
        </script>

    </head>
    <body>

        <div id="app">
              <!-- Every Vue app starts here , at v-app -->
              <v-app>

                  <!-- A simple app bar  -->
                  <v-app-bar
                  fixed
                  color="#ef2468"
                  elevate-on-scroll
                  >

      <!-- Hamburger icon , activates Javascript drawer =  true on click  -->
      <v-app-bar-nav-icon @click="drawer = true" color="white"></v-app-bar-nav-icon>

      <v-toolbar-title class="white--text">GRUB</v-toolbar-title>

      <v-spacer></v-spacer>

      <!-- Sign Up button -->
      <v-btn
      elevation="2"
      class="ma-2"
      prepend-icon="mdi-account"
      outlined color="white">
      <v-icon class="pr-2">mdi-account</v-icon>
      (Dunno)
      </v-btn>

    </v-app-bar>

    <!-- App drawer goes here -->
    <v-navigation-drawer
      v-model="drawer"
      absolute
      temporary
    >
    <v-list
        nav
        dense
    >
    <v-list-item-group
          v-model="group"
          active-class="pink--text text--accent-4"
    >

    <!-- Options for the app drawer -->
    <v-list-item>
        <v-list-item-icon>
            <v-icon>mdi-account</v-icon>
            </v-list-item-icon>
            <v-list-item-title>Profile</v-list-item-title>
        </v-list-item>

        <v-list-item>
            <v-list-item-icon>
            <v-icon>mdi-cart</v-icon>
            </v-list-item-icon>
            <v-list-item-title>View Cart</v-list-item-title>
        </v-list-item>

        <v-list-item>
            <v-list-item-icon>
            <v-icon>mdi-clock-time-seven</v-icon>
            </v-list-item-icon>
            <v-list-item-title>Order History</v-list-item-title>
        </v-list-item>

    </v-list-item-group>
    </v-list>
    </v-navigation-drawer>

    <!-- v-main is where all the content AFTER the top AppBar goes -->
    <v-main class="mainbody">
<v-parallax height="100%" width="100%" src="https://images.pexels.com/photos/45202/brownie-dessert-cake-sweet-45202.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="ono..please refresh"></v-parallax>

        <v-container
        class="center-card"
        fluid
      >
        <v-row
          align="center"
          justify="center"
        >
          <v-col
            cols="12"
            sm="8"
            md="4"
          >

          <!-- Sign in card element  -->
            <v-card class="elevation-12" color="#fafafa">
              <v-toolbar
                color="#fafafa"
                dark
                flat
              >

              <!-- Card title  -->
              <v-toolbar-title class="pt-8 titletext">Sign in as GrubRestaurant</v-toolbar-title>
              </v-toolbar>

              <!-- Login form and fields -->
              <v-card-text>
                <v-form id="form">
                  <v-text-field
                    label="Login"
                    name="login"
                    prepend-icon="mdi-account"
                    type="text"
                    value="<?php echo $_COOKIE["res_email"] ?? ""; ?>"
                  ></v-text-field>

                  <v-text-field
                    id="password"
                    label="Password"
                    name="password"
                    prepend-icon="mdi-lock"
                    type="password"
                  ></v-text-field>

                  <v-card-actions class="pa-5 pt-0">
                    <v-spacer></v-spacer>
                    <v-btn
                      block color="pink"
                      class="white--text"
                      type="submit">Login</v-btn>
                  </v-card-actions>

                  <v-row justify="center"><p id="error"></p></v-row>

                </v-form>
              </v-card-text>
            </v-card>
          </v-col>
        </v-row>
      </v-container>
    </v-main>

</v-app>
</div>

        <!-- Vue JS and Vuetify JS external reference -->
        <?php require_once("../../Assets/CDN/footer.php") ?>
        <script src="../../Assets/JavaScript/vuetify.js"></script>

    </body>
</html>
