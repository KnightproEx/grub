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
  <link href="Profile.css" rel="stylesheet" type="text/css">

  <!-- page title -->
  <title>My Profile</title>
</head>

<body>
  <!-- app div -->
  <div id="app">
    <v-app>
      <!-- app bar  -->
      <v-app-bar fixed color="rgba(255,255,255,0.0)" elevate-on-scroll height="80" flat>

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
          dark
          elevation="2"
          class="ma-2"
          color="pink"
          large
          @click="logout_dialog = true"
        >logout</v-btn>

        <!-- logout dialog -->
        <?php require("../Dependencies/Components/logout_dialog.php"); ?>

      </v-app-bar>

      <!-- navigation drawer -->
      <?php require("../Dependencies/Components/nav_drawer.php"); ?>

      <!-- vue main body -->
      <v-main>
        <!-- dynamic background -->
        <v-parallax
          height="1000"
          width="100%"
          src="https://images.pexels.com/photos/3821692/pexels-photo-3821692.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940"
          alt="ono..please refresh"
        >

          <!-- card alignment and size -->
          <v-row align="center" justify="center">
          <v-col cols="auto" sm="auto" md="auto" lg="auto" xl="auto">

            <!-- card element  -->
            <v-card class="elevation-12" color="#fafafa" min-width="600" max-width="1200">

              <!-- Card title  -->
              <v-toolbar color="#fafafa" dark flat>
                <v-toolbar-title class="pt-8 titletext">
                  Rider profile.
                </v-toolbar-title>
              </v-toolbar>

              <!-- profile form -->
              <v-card-text>
                <v-form readonly class="px-4 pt-4">

                  <!-- email field -->
                  <v-text-field
                    label="Email"
                    prepend-icon="mdi-email"
                    type="text"
                    value="<?php echo $rid_email; ?>"
                  ></v-text-field>

                  <!-- name field -->
                  <v-text-field
                    label="Name"
                    prepend-icon="mdi-account"
                    type="text"
                    value="<?php echo $rid_name; ?>"
                  ></v-text-field>

                  <!-- contact field -->
                  <v-text-field
                    label="Mobile Number"
                    prepend-icon="mdi-cellphone-android"
                    type="text"
                    value="<?php echo $rid_contact; ?>"
                  ></v-text-field>

                </v-form>
              </v-card-text>

              <v-card-actions class="btngroup">
                <!-- edit profile dialog -->
                <?php require_once("../Dependencies/Components/edit_profile_dialog.php"); ?>

                <!-- change password dialog -->
                <?php require_once("../Dependencies/Components/change_pass_dialog.php"); ?>
              </v-card-actions>

            </v-card>

        </v-parallax>
      </v-main>

    </v-app>
  </div>

<!-- Vue JS and Vuetify JS external reference -->
<?php require_once("../../Assets/Dependencies/footer.php"); ?>
<script type="text/javascript" src="Profile.js"></script>

</body>
</html>
