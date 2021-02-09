<?php

require_once("../Dependencies/Session/cus_session.php");
require_once("../Dependencies/Session/cus_profile_data.php");

isset($_GET["loc"]) ?: header("Location: ../Home/HomePage.php");

$_SESSION["page"] = "../" . basename(__DIR__) . "/" . basename(__FILE__) . "?loc=" . $_GET["loc"];
$_SESSION["loc"] = $_GET["loc"];

?>

<html>

<head>
  <!-- cdn ref -->
  <?php require_once("../../Assets/Dependencies/header.php"); ?>

  <!-- css ref -->
  <link href="SwipeRestaurant.css" rel="stylesheet" type="text/css">

  <!-- page title -->
  <title>Choose Restaurant</title>
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
              color="white"
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
          <?php echo "href='../Home/HomePage.php'"; ?>
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

      <!-- Drawers -->
      <?php require_once("../Dependencies/Components/nav_drawer.php"); ?>

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

        </v-parallax>
      </v-main>

    </v-app>
  </div>

<!-- Vue JS and Vuetify JS external reference -->
<?php require_once("../../Assets/Dependencies/footer.php"); ?>
<script type="text/javascript" src="SwipeRestaurant.js"></script>

</body>

</html>
