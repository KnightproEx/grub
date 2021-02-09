<?php

require_once("../Dependencies/Session/rid_session.php");
require_once("../Dependencies/Session/rid_login.php");
require_once("../Dependencies/Session/rid_profile_data.php");

?>


<html>

<head>
  <!-- cdn ref -->
  <?php require_once("../../Assets/Dependencies/header.php"); ?>

  <!-- css ref -->
  <link href="ActivityHistory.css" rel="stylesheet" type="text/css">

  <!-- page title -->
  <title>Activity History</title>
</head>

<body>
  <!-- vue app div -->
  <div id="app">
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

        <!-- Logout button -->
        <v-btn
          class="top-right-btn"
          light
          elevation="2"
          class="ma-2"
          color="pink--text"
          large
          @click="logout_dialog = true"
        >logout</v-btn>

        <!-- logout dialog -->
        <?php require("../Dependencies/Components/logout_dialog.php"); ?>

      </v-app-bar>

      <!-- navigation drawer -->
      <?php require("../Dependencies/Components/nav_drawer.php"); ?>

      <!-- vue main body -->
      <v-main class="mainbody">

        <div class="block"></div>

        <!-- activity history list -->
        <v-list two-line class="mx-2">
          <v-list-item-group active-class="pink--text">

            <template v-for="(item, index) in items">

              <v-list-item :key="item.title">
                <template>

                  <v-list-item-content>
                    <v-list-item-title
                      v-text="item.title"
                      class="font-weight-bold pink--text"
                    ></v-list-item-title>

                    <v-list-item-subtitle
                      v-text="item.location"
                    ></v-list-item-subtitle>

                    <v-list-item-subtitle
                      v-text="item.paymentamount"
                    ></v-list-item-subtitle>
                  </v-list-item-content>

                  <v-list-item-action>
                    <v-list-item-action-text v-text="item.action">
                    </v-list-item-action-text>
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
<script type="text/javascript" src="ActivityHistory.js"></script>

</body>

</html>