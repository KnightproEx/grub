<?php

require_once("../Dependencies/Session/cus_session.php");
require_once("../Dependencies/Session/cus_login.php");

isset($_SESSION["loc"]) ?: header("Location: ../Home/HomePage.php");
isset($_SESSION["res"]) ?: header("Location: ../SwipeRestaurant/SwipeRestaurantPage.php?loc=" . $_SESSION["loc"]);
isset($_SESSION["cart"]) ?: header("Location: ../Menu/MenuPage.php?res=" . $_SESSION["res"]);

?>


<html>

<head>
  <!-- cdn ref -->
  <?php require_once("../../Assets/Dependencies/header.php"); ?>

  <!-- css ref -->
  <link href="ConfirmAddress.css" rel="stylesheet" type="text/css">

  <!-- page title -->
  <title>Confirm Address</title>
</head>

<body>
  <!-- vue js ref -->
  <div id="app">
    <!-- vue starts -->
    <v-app>
      <!-- app bar  -->
      <v-app-bar fixed color="rgba(255,255,255,0.0)" elevate-on-scroll height="80" flat>

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
          prepend-icon="mdi-account"
          color="pink"
          large
          @click="logout_dialog = true"
        >logout</v-btn>

        <!-- Dialogs -->
        <?php

        require_once("../Dependencies/Components/logout_dialog.php");
        require_once("../Dependencies/Components/back_dialog.php");
        require_once("../Dependencies/Components/warn_dialog.php");

        ?>

      </v-app-bar>


      <!-- vue main body -->
      <v-main class="mainbody">
        <!-- dynamic background -->
        <v-parallax
          height="1000"
          width="100%"
          src="https://images.pexels.com/photos/4447728/pexels-photo-4447728.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940"
          alt="ono..please refresh"
        >

          <!-- card alignments and size -->
          <v-row align="center" justify="center">
          <v-col cols="auto" sm="auto" md="auto" lg="auto" xl="auto">

            <!-- card element  -->
            <v-card class="elevation-12" color="#fafafa"  min-width="600" max-width="1200" style="margin-top:-45%;">

              <!-- Card title  -->
              <v-toolbar color="#fafafa" dark flat>
                <v-toolbar-title class="pt-8 titletext">
                  Confirm your address.
                </v-toolbar-title>
              </v-toolbar>

              <v-card-text>
                <p class="text-center">
                  <?php echo $_SESSION["loc"]; ?>
                </p>

                <v-text-field
                  label="Floor/Unit"
                  outlined
                  v-model="unit"
                ></v-text-field>
              </v-card-text>

              <!-- Submit button  -->
              <v-card-actions class="submitbtn">
                <v-btn
                  block
                  color="pink"
                  class="white--text"
                  large
                  @click="submit()"
                >Submit</v-btn>
              </v-card-actions>

            </v-card>

          </v-col>
          </v-row>

        </v-parallax>
      </v-main>

    </v-app>
  </div>

<!-- Vue JS and Vuetify JS external reference -->
<?php require_once("../../Assets/Dependencies/footer.php");?>
<script type="text/javascript" src="ConfirmAddress.js"></script>

</body>

</html>
