<?php


//login session
require_once("../../GrubRider/Dependencies/Session/rid_session.php");
require_once("../../GrubRestaurant/Dependencies/Session/res_session.php");

//go to the home page if logged in
!$rid_login ?: header("Location: ../../GrubRider/ActivityHistory/ActivityHistoryPage.php");
!$res_login ?: header("Location: ../../GrubRestaurant/OrderHistory/OrderHistoryPage.php");


?>


<html>

<head>
  <!-- cdn ref -->
  <?php require_once("../../Assets/Dependencies/header.php"); ?>

  <!-- css ref -->
  <link href="Login.css" rel="stylesheet" type="text/css">

  <!-- page title -->
  <title>Partner Login</title>
</head>

<body>
  <!-- vue js ref -->
  <div id="app">
    <!-- vue starts -->
    <v-app>
      <!-- app bar  -->
      <v-app-bar fixed color="rgba(255,255,255,0.0)" elevate-on-scroll height="80" flat>

        <!-- grub logo -->
        <img class="grublogo" src="../../Assets/Images/grub.png" style="cursor:pointer; padding:10;" onclick="window.location.replace('../Home/HomePage.php')" height="70px">

        <v-spacer></v-spacer>

        <!-- Home button -->
        <v-btn
          dark
          elevation="2"
          class="ma-2"
          color="pink"
          href="../Home/HomePage.php"
          large
        ><v-icon>mdi-home</v-icon>
        </v-btn>

      </v-app-bar>

      <!-- vue main body -->
      <v-main class="mainbody">
        <!-- dynamic background -->
        <v-parallax
          height="1000"
          width="100%"
          src="https://images.pexels.com/photos/955137/pexels-photo-955137.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940"
          alt="ono..please refresh"
        >

        <!-- card align -->
        <v-row
          align="center"
          justify="end"
          style="bottom: 40%; right: 15%; position: absolute"
        >
        <v-col cols="auto" sm="auto" md="auto" lg="auto" xl="auto">


            <!-- card element  -->
            <v-card class="elevation-12" color="#fafafa" min-width="400">

              <!-- toolbar title -->
              <v-toolbar color="#fafafa" dark flat>
                <v-toolbar-title class="pt-8 titletext">Partner login.</v-toolbar-title>
              </v-toolbar>

              <!-- Login form and fields -->
              <v-card-text>
                <v-form class="px-4 pt-4" v-model="valid" id="form">

                  <v-text-field
                    v-model="email"
                    :rules="emailRules"
                    label="E-mail"
                    name="email"
                    prepend-icon="mdi-account"
                    type="text"
                    required
                  ></v-text-field>

                  <v-text-field
                    v-model="password"
                    :rules="passwordRules"
                    label="Password"
                    name="password"
                    prepend-icon="mdi-lock"
                    type="password"
                    required
                  ></v-text-field>

                  <!-- Login button  -->
                  <v-card-actions class="pa-5 pt-0">
                    <v-btn
                      large
                      block
                      color="pink"
                      class="white--text"
                      type="submit"
                    >Login</v-btn>
                  </v-card-actions>

                  <!-- output message -->
                  <v-row justify="center"><p id="error"></p></v-row>

                  <v-row class="pink--text" justify="end" style="margin-right:5%;">Don't have an account?&nbsp;<a href="../../GrubRestaurant/SignUp/SignUpPage.php">Restaurant </a> / <a href="../../GrubRider/SignUp/SignUpPage.php"> Rider</a>
                  </v-row>

                </v-form>
              </v-card-text>

            </v-card>

          </v-col>
          </v-row>

        </v-parallax>
      </v-main>

    </v-app>
  </div>

<!-- Vue JS and Vuetify JS external reference -->
<?php require_once("../../Assets/Dependencies/footer.php"); ?>
<script type="text/javascript" src="Login.js"></script>

</body>
</html>
