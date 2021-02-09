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
  <link href="ThankYou.css" rel="stylesheet" type="text/css">

  <!-- page title -->
  <title>Thank you!</title>
</head>

<body>
  <!-- vue js ref -->
  <div id="app">
    <!-- vue starts -->
    <v-app>
      <!-- app bar  -->
      <v-app-bar
      fixed
      color="rgba(255,255,255,0.0)"
      elevate-on-scroll
      height="80"
      flat
      >

      <!-- hamburger menu button -->
      <v-app-bar-nav-icon
      @click="drawer = true"
      color="white">
      </v-app-bar-nav-icon>

      <!-- grub logo -->
      <v-toolbar-title class="white--text">
        <img src="../../Assets/Images/grub.png"
        height="70px"
        style="padding:10">
      </v-toolbar-title>

      <v-spacer></v-spacer>

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

      <!-- app bar end -->
      </v-app-bar>

      <!-- Navigation Drawer -->
      <?php require_once("../Dependencies/Components/nav_drawer.php"); ?>

      <!-- vue main body -->
      <v-main class="mainbody">
        <!-- dynamic background -->
        <v-parallax
          height="1000"
          width="100%"
          src="https://images.pexels.com/photos/628776/pexels-photo-628776.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940"
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

          <br><br>

          <!-- card element  -->
            <v-card class="elevation-12" color="#fafafa" min-width="800" max-width="1200" style="margin-top:-35%;">
              <v-toolbar
              color="#fafafa"
              dark
              flat
              >

              <!-- Card title  -->
              <v-toolbar-title class="pt-8 titletext">
                Delivered with ❤ by Grub.
              </v-toolbar-title>

            </v-toolbar>

            <!-- order summary -->
            <v-card-text>
              <p class="text-center">
                Here's a summary of your order.
              </p>

              <p class="psummary">
                Order Number
                <br>
                <span style="font-weight: bold;">
                  {{item.id}}
                </span>
              </p>

              <p class="psummary">
                Placed At
                <br>
                <span style="font-weight: bold;">
                  {{item.date}}
                </span>
              </p>

              <p class="psummary">
                Payment Method
                <br>
                <span style="font-weight: bold;">
                  {{item.payment}}
                </span>
              </p>

              <p class="psummary">
                Delivered To
                <br>
                <span style="font-weight: bold;">
                  {{item.unit + ", " + item.address}}
                </span>
              </p>
              <p class="psummary">
                TotalAmount
                <br>
                <span style="font-weight: bold;">
                  RM {{item.total}}
                </span>
              </p>

            </v-card-text>

            <!-- reorder button  -->
            <v-card-actions class="btnorderagain">

              <v-btn
              large
              block
              color="pink"
              class="white--text"
              href="../Home/HomePage.php"
              >
              Order Again
              </v-btn>

            </v-card-actions>
          </v-card>

        </v-parallax>
      </v-main>

    </v-app>
  </div>

<!-- Vue JS and Vuetify JS external reference -->
<?php require_once("../../Assets/Dependencies/footer.php"); ?>
<script type="text/javascript" src="ThankYou.js"></script>

</body>
</html>
