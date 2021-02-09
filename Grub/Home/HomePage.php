<?php

require_once("../Dependencies/Session/cus_session.php");
require_once("../Dependencies/Session/cus_profile_data.php");

$_SESSION["page"] = "../" . basename(__DIR__) . "/" . basename(__FILE__);

?>

<html>

<head>
  <!-- cdn ref -->
  <?php require_once("../../Assets/Dependencies/header.php"); ?>

  <!-- css ref -->
  <link href="Home.css" rel="stylesheet" type="text/css">

  <!-- page title -->
  <title>Getting Started</title>
</head>

<body>
  <!-- vue js ref -->
  <div id="app">
    <!-- vue starts -->
    <v-app>
      <!-- app bar  -->
      <v-app-bar fixed color="rgba(255,255,255,0.0)" elevate-on-scroll height="80" flat>

        <!-- hamburger menu button -->
        <?php echo $cus_login ?
        '<v-app-bar-nav-icon
          @click="drawer = true"
          color="white"
        ></v-app-bar-nav-icon>'
        : '';
        ?>

        <!-- grub logo -->
        <img class="grublogo" src="../../Assets/Images/grub.png" style="cursor:pointer" onclick="window.location.replace('HomePage.php')">

        <v-spacer></v-spacer>

        <!-- Join Us button -->
        <v-btn
        dark
        elevation="2"
        class="ma-2"
        prepend-icon="mdi-account"
        color="pink"
        href="#P"
        large>
        Join Us!
        </v-btn>

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

        <!-- Dialog box -->
        <?php

        require_once("../Dependencies/Components/logout_dialog.php");
        require_once("../Dependencies/Components/home_dialog.php");

        ?>

      </v-app-bar>

      <!-- Navigation Drawer -->
      <?php require_once("../Dependencies/Components/nav_drawer.php"); ?>

      <!-- vue main body -->
      <v-main class="mainbody">
        <v-parallax
          height="1000"
          width="100%"
          src="https://images.unsplash.com/photo-1455619452474-d2be8b1e70cd?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80"
          alt="ono..please refresh"
        >

          <!-- card alignments and size -->
          <v-row align="center" justify="center">
          <v-col cols="auto" sm="auto" md="auto" lg="auto" xl="auto">

          <!-- card element  -->
            <v-card class="elevation-12" color="#fafafa" max-width="1200" min-width="600" width="800" height="320"
            style="
              border-radius: 20px;
              padding: 20px;
              margin-top:-35%;
              ">

              <!-- Card title  -->
              <v-toolbar color="#fafafa" dark flat>
                <v-toolbar-title class="pt-8 titletext">Let's find good food nearby you!
                </v-toolbar-title>
              </v-toolbar>

              <!-- location search -->
              <v-card-text class="pt-10 pb-0 px-5">
                <v-form id="form">

                  <v-autocomplete
                    :items="location"
                    label="Enter your location"
                    v-model="field"
                  ></v-autocomplete>

                  <br><br>

                  <!-- search button  -->
                  <v-card-actions class="px-5 pt-0 pb-6">
                    <v-btn
                      large
                      block
                      color="pink"
                      class="white--text"
                      type="submit"
                    >Search</v-btn>
                  </v-card-actions>

                  <!-- output message -->
                  <v-row justify="center"><p id="error"></p></v-row>

                </v-form>
              </v-card-text>

            </v-card>

          </v-col>
          </v-row>

        </v-parallax>

            <h1 id="P" style="padding:20; color: #E91E63;">Join our family!</h1>

            <p style="padding:20; color: #2b2b2b2;">Become our partner today, whether listing your restaurant with us or joining our delivery fleet.

            <br>Expand your business further with one of the most successful Food Delivery Service in the market now.
            <br><br>To know more, contact us <a href="mailto:grub-cs@grubfood.com">here</a>. Already have an account? click <a href="../PartnerLogin/LoginPage.php">here</a>.
           </p>

           <p style="padding:20">
            <v-card-actions>
              <v-btn
                large
                dark
                color="pink"
                width="200"
                href="../../GrubRestaurant/SignUp/SignUpPage.php"
              >Restaurant</v-btn>

              <v-btn
                large
                dark
                color="pink"
                width="200"
                href="../../GrubRider/SignUp/SignUpPage.php"
              >Rider</v-btn>
            </v-card-actions>
            </p>

            <br>

            <center>

              <hr style="height: 2px; border-width: 0; width: 1100; color: lightgray; background-color: lightgray">
              <br>

              <h2 class="space" style="color: #E91E63;">Frequently Asked Questions</h2>
              <br>

              <p>If you have any questions, please refer to our FAQ page, <a href="#">here</a>.</p>

            </center>

      </v-main>
<br>
      <v-footer dark padless>
        <v-card class="flex" flat tile>

          <v-card-title class="pink">
            <strong class="subheading">Let's get connected!</strong>

            <v-spacer></v-spacer>

            <v-btn
              v-for="icon in icons"
              :key="icon"
              href="https://www.facebook.com/GrabFoodMY/"
              class="mx-4"
              dark
              icon
            ><v-icon size="24px">{{ icon }}</v-icon>
            </v-btn>
          </v-card-title>

          <v-card-text class="py-2 white--text text-center">
            {{ new Date().getFullYear() }} (yeer o' de veerus) — <strong>Grub Food</strong>
          </v-card-text>

        </v-card>
      </v-footer>

    </v-app>
  </div>

<!-- Vue JS and Vuetify JS external reference -->
<?php require_once("../../Assets/Dependencies/footer.php"); ?>
<script type="text/javascript" src="Home.js"></script>

</body>

</html>
