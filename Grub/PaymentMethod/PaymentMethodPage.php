<?php

require_once("../Dependencies/Session/cus_session.php");
require_once("../Dependencies/Session/cus_login.php");
require_once("../Dependencies/Session/cus_profile_data.php");

isset($_SESSION["loc"]) ?: header("Location: ../Home/HomePage.php");
isset($_SESSION["res"]) ?: header("Location: ../SwipeRestaurant/SwipeRestaurantPage.php?loc=" . $_SESSION["loc"]);
isset($_SESSION["cart"]) ?: header("Location: ../Menu/MenuPage.php?res=" . $_SESSION["res"]);
isset($_SESSION["unit"]) ?: header("Location: ../ConfirmAddress/ConfirmAddressPage.php");

?>

<html>

<head>
  <!-- cdn ref -->
  <?php require_once("../../Assets/Dependencies/header.php"); ?>

  <!-- css ref -->
  <link href="PaymentMethod.css" rel="stylesheet" type="text/css">

  <!-- page title -->
  <title>Payment Method</title>

</head>

<body>
  <!-- vue js ref -->
  <div id="app">
    <!-- vue starts -->
    <v-app>
      <!-- app bar  -->
      <v-app-bar fixed color="rgba(255,255,255,0.0)" elevate-on-scroll height="80" flat>

        <!-- hamburger menu button -->
        <v-app-bar-nav-icon
          @click="drawer = true"
          color="white"
        ></v-app-bar-nav-icon>

        <!-- grub logo -->
        <img class="grublogo" src="../../Assets/Images/grub.png">

        <v-spacer></v-spacer>

        <!-- Back button -->
        <v-btn
          dark
          elevation="2"
          class="ma-2"
          color="pink"
          @click="back_dialog = true"
          large
        >back</v-btn>

        <!-- Logout button -->
        <v-btn
          dark
          elevation="2"
          class="ma-2"
          color="pink"
          @click="logout_dialog = true"
          large
        >logout</v-btn>

        <!-- Dialogs -->
        <?php

        require_once("../Dependencies/Components/back_dialog.php");
        require_once("../Dependencies/Components/logout_dialog.php");

        ?>

      </v-app-bar>

      <!-- Navigation Drawer -->
      <?php require_once("../Dependencies/Components/nav_drawer.php"); ?>

      <!-- vue main body -->
      <v-main class="mainbody">
        <!-- dynamic background -->
        <v-parallax
          height="1000"
          width="100%"
          src="https://images.pexels.com/photos/2827263/pexels-photo-2827263.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940"
          alt="ono..please refresh"
        >

          <!-- card alignment and size -->
          <v-row align="center" justify="center">
          <v-col cols="auto" sm="auto" md="auto" lg="auto" xl="auto">

          <!-- card element  -->
            <v-card class="elevation-12" color="#fafafa"  min-width="800" max-width="1200" style="margin-top:-35%;">
              <v-toolbar
              color="#fafafa"
              dark
              flat
              >

              <!-- Card title  -->
              <v-toolbar-title class="pt-8 titletext">
                Payment Method.
              </v-toolbar-title>

              </v-toolbar>

              <!-- profile form -->
              <v-card-text>

                <p>
                  You will be redirected to a 3rd party gateway based on your selection.
                </p>

                <center>

                  <v-btn-toggle
                    v-model="selection"
                    tile
                    group
                    mandatory
                    class="text-xl-center py-5"
                  >

                    <div class="my-2">

                      <v-btn
                        value="1"
                        ripple
                        large
                        outlined
                        color="pink"
                      >
                        <span class="hidden-sm-and-down">
                          Debit/Credit Card
                        </span>

                        <v-icon right>
                          mdi-credit-card-multiple
                        </v-icon>
                      </v-btn>

                      <v-btn
                        value="2"
                        ripple
                        large
                        outlined
                        color="pink"
                      >
                        <span class="hidden-sm-and-down">
                          Online Banking
                        </span>

                        <v-icon right>
                          mdi-bank
                        </v-icon>
                      </v-btn>

                      <v-btn
                        value="3"
                        ripple
                        large
                        outlined
                        color="pink"
                      >
                        <span class="hidden-sm-and-down">
                          E-Wallet/QR Pay
                        </span>

                        <v-icon right>
                          mdi-cash-multiple
                        </v-icon>
                      </v-btn>

                    </div>

                  </v-btn-toggle>

                </center>

              </v-card-text>

              <!-- pay button  -->
              <v-card-actions class="pa-5 pt-0">
                <v-btn
                  large
                  block
                  color="pink"
                  class="white--text"
                  @click="makepayment()"
                >Make Payment</v-btn>
              </v-card-actions>

            </v-card>

          </v-col>
          </v-row>

        </v-parallax>
      </v-main>

    </v-app>
  </div>

<!-- Vue JS and Vuetify JS external reference -->
<?php require_once("../../Assets/Dependencies/footer.php"); ?>
<script type="text/javascript" src="PaymentMethod.js"></script>

</body>

</html>
