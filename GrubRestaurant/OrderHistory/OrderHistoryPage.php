<?php 

require_once("../Dependencies/Session/res_session.php");
require_once("../Dependencies/Session/res_login.php");
require_once("../Dependencies/Session/res_profile_data.php");

?>

<html>
<head>
  <!-- cdn ref -->
  <?php require_once("../../Assets/Dependencies/header.php"); ?>

  <!-- css ref -->
  <link href="OrderHistory.css" rel="stylesheet" type="text/css">

  <!-- page title -->
  <title>Restaurant Order History</title>
</head>

<body>
  <!-- vue js ref -->
  <div id="app">
    <!-- vue starts -->
    <v-app>
      <!-- app bar  -->
      <v-app-bar fixed color="pink" elevate-on-scroll height="80" flat style="position:fixed;">

        <!-- hamburger menu button -->
        <v-app-bar-nav-icon
          @click="drawer = true"
          color="white"
        ></v-app-bar-nav-icon>

        <!-- grub logo -->
        <img class="grublogo" src="../../Assets/Images/grub.png">

        <v-spacer></v-spacer>

        <!-- report generator button -->
        <v-btn
          light
          elevation="2"
          class="ma-2"
          color="pink--text"
          onclick="window.print()"
          large
        >print</v-btn>

        <!-- Login button -->
        <v-btn
          light
          elevation="2"
          class="ma-2"
          color="pink--text"
          @click="logout_dialog = true"
          large
        >logout</v-btn>

        <!-- logout dialog -->
        <?php require("../Dependencies/Components/logout_dialog.php"); ?>

      </v-app-bar>

      <!-- App drawer goes start -->
      <?php require_once("../Dependencies/Components/nav_drawer.php"); ?>

      <!-- vue main body -->
      <v-main class="mainbody">

        <div class="block">
        </div>

        <!-- table start -->
        <v-card>
          <v-card-title>

            Order History

            <v-spacer></v-spacer>

            <v-text-field
              v-model="search"
              append-icon="mdi-magnify"
              label="Search"
              single-line
              hide-details
            ></v-text-field>

          </v-card-title>

          <v-data-table
            :headers="headers"
            :items="orders"
            :search="search"
          ></v-data-table>
        </v-card>
      </v-main>

    </v-app>
  </div>

<!-- Vue JS and Vuetify JS external reference -->
<?php require_once("../../Assets/Dependencies/footer.php"); ?>
<script type="text/javascript" src="OrderHistory.js"></script>

</body>
</html>
