<?php

require_once("../Dependencies/Session/cus_session.php");
require_once("../Dependencies/Session/cus_login.php");
require_once("../Dependencies/Session/cus_profile_data.php");

?>

<html>

<head>
  <!-- cdn ref -->
  <?php require_once("../../Assets/Dependencies/header.php"); ?>

  <!-- css ref -->
  <link href="OrderHistory.css" rel="stylesheet" type="text/css">

  <!-- page title -->
  <title>My Order History</title>
</head>

<body>
  <!-- vue js ref -->
  <div id="app">
    <!-- vue starts -->
    <v-app>
      <!-- app bar -->
      <v-app-bar fixed color="pink" elevate-on-scroll height="80">

        <!-- hamburger menu button -->
        <v-app-bar-nav-icon
          @click="drawer = true"
          color="white"
        ></v-app-bar-nav-icon>

        <!-- grub logo -->
        <img class="grublogo" src="../../Assets/Images/grub.png" style="cursor:pointer" onclick="window.location.replace('../Home/HomePage.php')">


        <v-spacer></v-spacer>

        <!-- Logout button -->
        <v-btn
          light
          elevation="2"
          class="ma-2"
          color="pink--text"
          href="<?php echo $_SESSION["page"]; ?>"
          large
        >Back</v-btn>

        <!-- logout dialog -->
        <?php require("../Dependencies/Components/logout_dialog.php"); ?>

      </v-app-bar>

      <!-- Navigation Drawer -->
      <?php require_once("../Dependencies/Components/nav_drawer.php"); ?>

      <!-- vue main body -->
      <v-main class="mainbody">

        <div class="block"></div>

        <!-- table start -->
        <v-list class="mx-15">
          <v-list-item-group active-class="pink--text">

            <template v-for="(item, index) in items">

              <v-list-item :key="item.name">
                <template>

                  <v-list-item-content>

                    <v-list-item-title
                    v-text="item.name + '' + item.quantity" class="font-weight-bold pink--text my-2 titletext"
                    ></v-list-item-title>

                    <v-list-item-subtitle v-text="item.description"
                    ></v-list-item-subtitle>

                    <v-list-item-subtitle v-text="item.price"
                    ></v-list-item-subtitle>

                  </v-list-item-content>

                  <v-list-item-action>
                    <v-list-item-action-text v-text="item.date"
                    ></v-list-item-action-text>
                  </v-list-item-action>

                </template>
              </v-list-item>

              <v-divider
                v-if="index + 1 < items.length"
                :key="index"
              ></v-divider>

            </template>

          </v-list-item-group>
        </v-list>

      </v-main>

    </v-app>
  </div>

<!-- Vue JS and Vuetify JS external reference -->
<?php require_once("../../Assets/Dependencies/footer.php"); ?>
<script type="text/javascript" src="OrderHistory.js"></script>

</body>

</html>
