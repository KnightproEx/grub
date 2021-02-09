<?php

require_once("../Dependencies/Session/res_session.php");
require_once("../Dependencies/Session/res_login.php");
require_once("../Dependencies/Session/res_profile_data.php");

?>

<html>
<head>
  <!-- cdn ref -->
  <?php require_once("../../Assets/Dependencies/header.php");?>

  <!-- css ref -->
  <link href="Menu.css" rel="stylesheet" type="text/css">

  <!-- page title -->
  <title>Menu List</title>
</head>

<body>
  <!-- vue js ref -->
  <div id="app">
    <!-- vue starts -->
    <v-app>
      <!-- app bar  -->
      <v-app-bar fixed color="pink" elevate-on-scroll height="80" flat>

        <!-- hamburger menu button -->
        <v-app-bar-nav-icon
          @click="drawer = true"
          color="white"
        ></v-app-bar-nav-icon>

        <!-- grub logo -->
        <img class="grublogo" src="../../Assets/Images/grub.png">

        <v-spacer></v-spacer>

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
        <?php require_once("../Dependencies/Components/logout_dialog.php"); ?>

      </v-app-bar>

      <!-- Navigation drawer -->
      <?php require_once("../Dependencies/Components/nav_drawer.php"); ?>

      <!-- vue main body -->
      <v-main class="mainbody">

        <div class="block">
        </div>


        <!-- add menu dialog -->
        <?php require_once("../Dependencies/Components/add_menu_dialog.php"); ?>

        <!-- menu cards -->
        <v-container fluid>

          <v-row dense>
            <v-col v-for="card in cards" cols="3" :key="card.index">
              <v-card class="ma-1">

                <v-img
                  :key="card.index"
                  :src="card.src"
                  class="white--text align-end"
                  height="200px"
                ></v-img>

                <v-card-text>
                  <v-list-item-title
                    class="headline font-weight-bold pink--text"
                    v-text="card.title"
                  ></v-list-item-title>
                  {{ card.description }}
                </v-card-text>

                <v-card-actions>
                  <v-list-item-title
                    class="headline font-weight-bold pink--text"
                    v-text="'RM ' + card.price"
                  ></v-list-item-title>

                  <v-spacer></v-spacer>

                  <!-- edit menu dialog -->
                  <?php require_once("../Dependencies/Components/edit_menu_dialog.php"); ?>

                  <!-- delete button -->
                  <?php require_once("../Dependencies/Components/delete_menu_dialog.php"); ?>

                </v-card-actions>

              </v-card>

            </v-col>
          </v-row>

        </v-container>

      </v-main>

    </v-app>
  </div>

<!-- Vue JS and Vuetify JS external reference -->
<?php require_once("../../Assets/Dependencies/footer.php"); ?>
<script type="text/javascript" src="Menu.js"></script>

</body>
</html>
