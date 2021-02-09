<?php

require_once("../Dependencies/Session/cus_session.php");
require_once("../Dependencies/Session/cus_profile_data.php");

isset($_SESSION["loc"]) ?: header("Location: ../Home/HomePage.php");
isset($_GET["res"]) ?: header("Location: ../SwipeRestaurant/SwipeRestaurantPage.php?loc=" . $_SESSION["loc"]);

$_SESSION["page"] = "../" . basename(__DIR__) . "/" . basename(__FILE__);
$_SESSION["res"] = $_GET["res"];


?>

<html>

<head>
  <!-- cdn ref -->
  <?php require_once("../../Assets/Dependencies/header.php"); ?>

  <!-- css ref -->
  <link href="Menu.css" rel="stylesheet" type="text/css">

  <!-- page title -->
  <title>Choose Item</title>

</head>

<body>
  <!-- vue js ref -->
  <div id="app">
    <!-- vue starts -->
    <v-app>
      <!-- app bar  -->
      <v-app-bar fixed color="rgba(255,255,255,0.0)" elevate-on-scroll height="80" flat>

        <!-- hamburger menu button -->
        <?php
          echo $cus_login ?
            '<v-app-bar-nav-icon
              @click="drawer = true"
              color="pink"
            ></v-app-bar-nav-icon>'
          : '';
        ?>

        <!-- grub logo -->
          <img class="grublogo" src="../../Assets/Images/grub.png" style="cursor:pointer" onclick="window.location.replace('../Home/HomePage.php')">

        <v-spacer></v-spacer>

        <!-- Back button -->
        <v-btn
          dark
          elevation="2"
          class="ma-2"
          prepend-icon="mdi-account"
          color="pink"
          large
          <?php echo "href='../SwipeRestaurant/SwipeRestaurantPage.php?loc=" . $_SESSION["loc"] . "'"; ?>
        >Back</v-btn>

        <!-- Login button -->
        <v-btn
          dark
          elevation="2"
          class="ma-2"
          prepend-icon="mdi-account"
          color="pink"
          large
          <?php echo $cus_login ? "@click='logout_dialog = true'" : "href='../Login/LoginPage.php'"; ?>
        >
          <?php echo $cus_login ? "logout" : "login"; ?>
        </v-btn>

        <!-- Logout Dialog -->
        <?php require_once("../Dependencies/Components/logout_dialog.php"); ?>

      </v-app-bar>

      <!-- Navigation Drawer -->
      <?php

      require_once("../Dependencies/Components/nav_drawer.php");
      require_once("../Dependencies/Components/cart_drawer.php");

      ?>

      <!-- vue main body -->
      <v-main class="mainbody">
        <v-parallax
          height="1000"
          width="100%"
          src="https://wallup.net/wp-content/uploads/2018/09/25/633634-eggs-food-dishes-black_background.jpg"
          alt="ono..please refresh"
        >

          <!-- swipe restaurant card  -->
          <div id="board"></div>

          <!-- <div class="tips"> -->

            <v-row class="pink--text" style="bottom:50%; left:10%; position:absolute;"> <mdi-arrow_back>
              <v-btn class="mx-2" fab dark small color="pink" style="bottom:150%; left:30%; position:absolute;">
        <v-icon dark>mdi-thumb-down</v-icon>
      </v-btn>
              <b>Swipe left to skip</v-row>

            <v-row class="pink--text" style="bottom:50%; right:10%; position:absolute;">
              <v-btn class="mx-2" fab dark small color="pink" style="bottom:150%; right:30%; position:absolute;">
        <v-icon dark>mdi-heart</v-icon>
      </v-btn>
              <b>Swipe right to select</v-row>

          <!-- </div> -->

            <!-- cart button -->
            <v-btn
              class="cart"
              style="bottom:30%; right:29%; position:absolute;"
              x-large
              absolute
              dark
              fab
              color="pink"
              @click="cart_drawer = true"
            ><v-icon>mdi-cart</v-icon>
            </v-btn>

          </v-parallax>
      </v-main>

    </v-app>
  </div>

<!-- Vue JS and Vuetify JS external reference -->
<?php require_once("../../Assets/Dependencies/footer.php"); ?>
<script type="text/javascript" src="Menu.js"></script>

</body>

</html>
