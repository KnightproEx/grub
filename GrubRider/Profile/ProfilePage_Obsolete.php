<?php 

require_once("../../Assets/PHP/rid_session.php");
require_once("../../Assets/PHP/rid_login_session.php");

?>

<html>
    <head>
        <!-- Material and Vuetify CSS Reference -->
        <?php require_once("../../Assets/CDN/header.php"); ?>
        <link href="Profile.css" rel="stylesheet" type="text/css">

    </head>
    <body>

        <div id="app">
              <v-app>

                  <!-- A simple app bar  -->
                  <v-app-bar
                  fixed
                  color="#ef2468"
                  elevate-on-scroll
                  >

      <!-- Hamburger icon , activates Javascript drawer =  true on click  -->
      <v-app-bar-nav-icon @click="drawer = true" color="white"></v-app-bar-nav-icon>

      <v-toolbar-title class="white--text">Title</v-toolbar-title>

      <v-spacer></v-spacer>

      <!-- Login button -->
      <v-btn
      elevation="2"
      class="ma-2"
      prepend-icon="mdi-account"
      outlined color="white"
      href="../ActivityHistory/ActivityHistoryPage.php">
      <v-icon class="pr-2">mdi-account</v-icon>
      Back
      </v-btn>

    </v-app-bar>

    <!-- App drawer goes here -->
    <v-navigation-drawer
      v-model="drawer"
      absolute
      temporary
    >
    <v-list
        nav
        dense
    >
    <v-list-item-group
          v-model="group"
          active-class="pink--text text--accent-4"
    >

    <!-- Options for the app drawer -->
    <v-list-item>
        <v-list-item-icon>
            <v-icon>mdi-account</v-icon>
            </v-list-item-icon>
            <v-list-item-title>Profile</v-list-item-title>
        </v-list-item>

        <v-list-item href="../ActivityHistory/ActivityHistoryPage.php">
            <v-list-item-icon>
            <v-icon>mdi-clock-time-seven</v-icon>
            </v-list-item-icon>
            <v-list-item-title>Activity History</v-list-item-title>
        </v-list-item>

    </v-list-item-group>
    </v-list>
    </v-navigation-drawer>

    <v-main class="mainbody">

      <header>
      </header>

        <v-container
        class="center-card"
        fluid
      >
        <v-row
          align="center"
          justify="center"
        >
          <v-col
            cols="12"
            sm="8"
            md="4"
          >

          <!-- Card element  -->
            <v-card class="elevation-12" color="#fafafa" width="450" max-width="450" height="520" max-height="520">
              <v-toolbar
                color="#fafafa"
                dark
                flat
              >

              <!-- Card title  -->
              <v-toolbar-title class="titletext">Rider Profile.</v-toolbar-title>
              </v-toolbar>

              <!-- Confirm Address Form and fields -->
              <v-card-text>
                <v-form class="px-4 pt-4">
                  <v-text-field
                    label="Email"
                    name="email"
                    prepend-icon="mdi-email"
                    type="text"
                    value="<?php echo $rid_email; ?>"
                  ></v-text-field>

                  <v-text-field
                    label="Name"
                    name="name"
                    prepend-icon="mdi-account"
                    type="text"
                    value="<?php echo $rid_name; ?>"
                  ></v-text-field>

                  <v-text-field
                    label="Mobile Number"
                    name="contact"
                    prepend-icon="mdi-cellphone-android"
                    type="text"
                    value="<?php echo $rid_contact; ?>"
                  ></v-text-field>

                  <v-text-field
                    label="Address"
                    name="address"
                    prepend-icon="mdi-map-marker"
                    type="text"
                    value="<?php echo $rid_address; ?>"
                  ></v-text-field>

                </v-form>
              </v-card-text>

              <!-- Submit button  -->
              <v-card-actions class="btngroup">
                <v-btn block color="pink" class="white--text mb-4">Edit Profile</v-btn>
                <v-spacer></v-spacer>
                <v-btn block color="pink" class="white--text">Change Password</v-btn>
              </v-card-actions>
            </v-card>
      </v-container>
    </v-main>

</v-app>
</div>

        <!-- Vue JS and Vuetify JS external reference -->
        <?php
        //pull in footer CDN
        require_once("../../Assets/CDN//footer.php");
        ?>
        <script type="text/javascript" src="Profile.js"></script>
    </body>
</html>
