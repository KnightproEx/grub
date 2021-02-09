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
  <link href="TrackOrder.css" rel="stylesheet" type="text/css">

  <!-- page title -->
  <title>Tracking Order</title>
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
          <img class="grublogo" src="../../Assets/Images/grub.png" style="cursor:pointer" onclick="window.location.replace('../Home/HomePage.php')">

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

        <!-- Login button -->
        <v-btn
          dark
          elevation="2"
          class="ma-2"
          color="pink"
          @click="logout_dialog = true"
          large
        >logout</v-btn>

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
        src="https://images.pexels.com/photos/1234535/pexels-photo-1234535.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940"
        alt="ono..please refresh">

        <!-- card align -->
        <v-row
          align="center"
          justify="center"
        >

        <!-- card size -->
        <v-col
        cols="auto"
        sm="auto"
        md="auto"
        lg="auto"
        xl="auto"
        >

        <!-- card element  -->
          <v-card class="elevation-12" color="#fafafa" min-width="800" max-width="1200" style="margin-top:-35%;">
            <v-toolbar
            color="#fafafa"
            dark
            flat
            >

            <!-- Card title  -->
            <v-toolbar-title class="pt-8 titletext">
              Track your order.
            </v-toolbar-title>

            </v-toolbar>

            <!-- card start -->
            <v-card-text>

                <p class="trackingid">
                  Tracking ID : {{ id }}
                </p>

                <p class="placedtime">
                  Placed at {{ date }}
                </p>

              <!-- tracking stats -->
              <v-stepper v-model="stepper">
                <v-stepper-header>
                  <v-stepper-step
                  color="#ef2468"
                  step="1"
                  :complete="stepper > 1"
                  >
                  Received payment
                  </v-stepper-step>

                  <v-divider></v-divider>

                  <v-stepper-step
                  color="#ef2468"
                  step="2"
                  :complete="stepper > 2"
                  >
                  Preparing order
                  </v-stepper-step>

                  <v-divider></v-divider>

                  <v-stepper-step
                  color="#ef2468"
                  step="3"
                  :complete="stepper > 3"
                  >
                  In delivery
                  </v-stepper-step>

                  <v-divider></v-divider>

                  <v-stepper-step
                  color="#ef2468"
                  step="4"
                  :complete="stepper >= 4"
                  >
                  Start Grubbing
                  </v-stepper-step>

                </v-stepper-header>
              </v-stepper>

            </v-card-text>
          </v-card>

        </v-parallax>
      </v-main>

    </v-app>
  </div>

<!-- Vue JS and Vuetify JS external reference -->
<?php require_once("../../Assets/Dependencies/footer.php"); ?>
<script type="text/javascript" src="TrackOrder.js"></script>

</body>

</html>
