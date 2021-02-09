<html>
<head>
  <!-- cdn ref -->
  <?php require_once("../../Assets/Dependencies/header.php"); ?>

  <!-- css ref -->
  <link href="SignUp.css" rel="stylesheet" type="text/css">

  <!-- page title -->
  <title>Sign Up</title>
</head>

<body>
  <!-- vue js ref -->
  <div id="app">
    <!-- vue starts -->
    <v-app>
      <!-- app bar  -->
      <v-app-bar
      fixed
      color="rgba(255,255,255,0.0)"
      elevate-on-scroll
      height="80"
      flat
      >

      <!-- grub logo -->
      <img class="grublogo" src="../../Assets/Images/grub.png" style="cursor:pointer; padding:10; height:70px" onclick="window.location.replace('../Home/HomePage.php')">

      <v-spacer></v-spacer>

      <!-- Login button -->
      <v-btn
      dark
      elevation="2"
      class="ma-2"
      prepend-icon="mdi-account"
      color="pink"
      href="../Login/LoginPage.php"
      large>
      login
      </v-btn>

      <!-- app bar end -->
      </v-app-bar>

      <!-- vue main body -->
      <v-main class="mainbody">

      <v-parallax
        height="1000"
        width="100%"
        src="https://images.pexels.com/photos/4134514/pexels-photo-4134514.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940"
        alt="ono..please refresh">

        <!-- card align -->
        <v-row
          align="center"
          justify="center"
        >
        <!-- card size -->
        <v-col
        align-self
        cols="auto"
        sm="auto"
        md="auto"
        lg="auto"
        xl="auto"
        >

        <!-- card element  -->
          <v-card class="elevation-12" color="#fafafa" min-width="600" max-width="1200" style="margin-top:-40%">
          <!-- Card title  -->
          <v-toolbar color="#fafafa" dark flat>
            <v-toolbar-title class="pt-8 titletext">
              Create account.
            </v-toolbar-title>
          </v-toolbar>

          <!-- Login form and fields -->
          <v-card-text>
            <v-form id="form">
              <v-text-field
                label="Email"
                name="email"
                prepend-icon="mdi-email"
                type="text"
              ></v-text-field>

              <v-text-field
                label="Name"
                name="name"
                prepend-icon="mdi-account"
                type="text"
              ></v-text-field>

              <v-text-field
                label="Mobile Number"
                name="contact"
                prepend-icon="mdi-cellphone-android"
                type="text"
              ></v-text-field>

              <v-text-field
                v-model="password"
                prepend-icon="mdi-lock-check"
                :append-icon="show1 ? 'mdi-eye' : 'mdi-eye-off'"
                :rules="[rules.required, rules.min]"
                :type="show1 ? 'text' : 'password'"
                name="password"
                label="Password"
                hint="At least 8 characters"
                counter
                @click:append="show1 = !show1"
              ></v-text-field>

              <v-card-actions class="pa-5 pt-0">
                <v-spacer></v-spacer>
                <v-btn
                  block color="pink"
                  class="white--text"
                  type="submit">Sign Up</v-btn>
              </v-card-actions>

              <v-row justify="center"><p id="error"></p></v-row>

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
<script type="text/javascript" src="SignUp.js"></script>

</body>

</html>
