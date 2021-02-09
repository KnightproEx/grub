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
  <link href="Profile.css" rel="stylesheet" type="text/css">

  <!-- page title -->
  <title>Company Profile</title>
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
        <?php require_once("../Dependencies/Components/logout_dialog.php"); ?>

      </v-app-bar>

      <!-- Navigation drawer -->
      <?php require_once("../Dependencies/Components/nav_drawer.php"); ?>

      <!-- vue main body -->
      <v-main>

        <!-- dynamic background -->
        <v-parallax
          height="auto"
          width="auto"
          src="<?php echo $res_img != "" ? $res_img : "https://images.pexels.com/photos/1437590/pexels-photo-1437590.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940"; ?>"
          alt="ono..please refresh"
        >

          <!-- card alignments and size -->
          <v-row align="center" justify="center">
          <v-col cols="auto" sm="auto" md="auto" lg="auto" xl="auto">

            <!-- card element  -->
            <v-card class="elevation-12" color="#fafafa" min-width="800" max-width="1200">

              <!-- Card title  -->
              <v-toolbar color="#fafafa" dark flat>
                <v-toolbar-title class="pt-8 titletext">
                  Company profile.
                </v-toolbar-title>
              </v-toolbar>

              <!-- profile form -->
              <v-card-text>
                <v-form readonly class="px-4 pt-4">

                  <!-- email -->
                  <v-text-field
                    label="Restaurant Name"
                    prepend-icon="mdi-chef-hat"
                    type="text"
                    value="<?php echo $res_name; ?>"
                  ></v-text-field>

                  <!-- company name -->
                  <v-text-field
                    label="Company Name"
                    prepend-icon="mdi-account-group-outline"
                    type="text"
                    value="<?php echo $res_coname; ?>"
                  ></v-text-field>

                  <!-- rest desc -->
                  <v-textarea
                    label="Restaurant Description"
                    prepend-icon="mdi-pencil"
                    auto-grow
                    value="<?php echo $res_desc; ?>"
                  ></v-textarea>

                  <!-- email -->
                  <v-text-field
                    label="Email"
                    prepend-icon="mdi-email"
                    type="text"
                    value="<?php echo $res_email; ?>"
                  ></v-text-field>

                  <!-- contact -->
                  <v-text-field
                    label="Contact"
                    name="mobilenumber"
                    prepend-icon="mdi-cellphone-android"
                    type="text"
                    value="<?php echo $res_contact; ?>"
                  ></v-text-field>

                  <!-- address -->
                  <v-text-field
                    label="Address"
                    name="address"
                    prepend-icon="mdi-map-marker"
                    type="text"
                    value="<?php echo $res_address; ?>"
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
