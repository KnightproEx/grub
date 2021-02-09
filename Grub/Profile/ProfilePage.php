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
  <link href="Profile.css" rel="stylesheet" type="text/css">

  <!-- page title -->
  <title>My Profile</title>
</head>

<body>
<!-- vue js ref -->
  <div id="app">
    <!-- vue starts -->
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

        <!-- Back button -->
        <v-btn
          dark
          elevation="2"
          class="ma-2"
          color="pink"
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
        <!-- dynamic background -->
        <v-parallax
          height="650"
          width="940"
          src="https://images.pexels.com/photos/1907227/pexels-photo-1907227.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940"
          alt="ono..please refresh">

          <!-- card align -->
          <v-row align="center" justify="center">
          <v-col cols="auto" sm="auto" md="auto" lg="auto" xl="auto">

            <!-- card element  -->
            <v-card class="elevation-12" color="#fafafa">

              <!-- Card title -->
              <v-toolbar color="#fafafa" dark flat>
                <v-toolbar-title class="pt-8 titletext">
                  My profile.
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
                    value="<?php echo $cus_email; ?>"
                  ></v-text-field>

                  <!-- name field -->
                  <v-text-field
                    label="Name"
                    prepend-icon="mdi-account"
                    type="text"
                    value="<?php echo $cus_name; ?>"
                  ></v-text-field>

                  <!-- contact field -->
                  <v-text-field
                    label="Mobile Number"
                    prepend-icon="mdi-cellphone-android"
                    type="text"
                    value="<?php echo $cus_contact; ?>"
                  ></v-text-field>

                </v-form>
              </v-card-text>

              <!-- button grouping  -->
              <v-card-actions class="btngroup">
                <!-- edit profile dialog -->
                <?php require_once("../Dependencies/Components/edit_profile_dialog.php"); ?>

                <!-- change password dialog -->
                <?php require_once("../Dependencies/Components/change_pass_dialog.php"); ?>
              </v-card-actions>

            </v-card>

          </v-col>
          </v-row>

        </v-parallax>
      </v-main>

    </v-app>
  </div>

<!-- Vue JS and Vuetify JS external reference -->
<?php require_once("../../Assets/Dependencies/footer.php"); ?>
<script type="text/javascript" src="Profile.js"></script>

</body>

</html>
