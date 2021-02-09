<?php

//login session
require_once("../Dependencies/Session/cus_session.php");

$_SESSION["page"] = $_SESSION["page"] ?? "../Home/HomePage.php";

!isset($_SESSION["checkout"]) ?: $_SESSION["page"] = "../ConfirmAddress/ConfirmAddressPage.php";

!$cus_login ?: header("Location: " . $_SESSION["page"]);

?>


<html>

<head>
  <!-- cdn ref -->
  <?php require_once("../../Assets/Dependencies/header.php"); ?>

  <!-- css ref -->
  <link href="Login.css" rel="stylesheet" type="text/css">

  <!-- page variable -->
  <script type="text/javascript">
    var page = "<?php echo $_SESSION["page"]; ?>";
  </script>

  <!-- page title -->
  <title>Login</title>
</head>


<body>
  <!-- vue app div -->
  <div id="app">
    <v-app>
      <!-- app bar  -->
      <v-app-bar fixed color="rgba(255,255,255,0.0)" elevate-on-scroll height="80" flat>

        <!-- grub logo -->
        <img class="grublogo" src="../../Assets/Images/grub.png" style="cursor:pointer" onclick="window.location.replace('../Home/HomePage.php')">

        <v-spacer></v-spacer>

        <!-- sign up button -->
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
      <v-main>
        <!-- dynamic background -->
        <v-parallax
          height="1000"
          width="100%"
          src="https://images.pexels.com/photos/905847/pexels-photo-905847.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260"
          alt="ono..please refresh"
        >

          <!-- card alignment and size -->
          <v-row align="center" justify="center">
          <v-col cols="auto" sm="auto" md="auto" lg="auto" xl="auto">

            <!-- card element  -->
            <v-card class="elevation-12" color="#fafafa" min-width="600" max-width="1200"
            style="margin-top:-40%">

              <!-- Card title  -->
              <v-toolbar color="#fafafa" dark flat>
                <v-toolbar-title class="pt-8 titletext">
                  Login to start Grubbing.
                </v-toolbar-title>
              </v-toolbar>

              <!-- Login form -->
              <v-card-text>
                <v-form id="form">

                  <v-text-field
                    label="Email"
                    name="login"
                    prepend-icon="mdi-account"
                    type="text"
                    value="<?php echo $_COOKIE["cus_email"] ?? ""; ?>"
                  ></v-text-field>

                  <v-text-field
                    id="password"
                    label="Password"
                    name="password"
                    prepend-icon="mdi-lock"
                    type="password"
                  ></v-text-field>

                  <!-- Login button  -->
                  <v-card-actions class="pa-5 pt-0" style="margin-top:3%;">
                    <v-btn
                      large
                      block
                      color="pink"
                      class="white--text"
                      type="submit"
                    >login</v-btn>
                  </v-card-actions>

                  <!-- output message -->
                  <v-row justify="center"><p id="error"></p></v-row>

                  <v-row class="pink--text" justify="end" style="margin-right:5%;">New to Grub? Sign Up&nbsp;<a href="../SignUp/SignUpPage.php">here</a></v-row>

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
<script src="Login.js"></script>

</body>

</html>
