<html>

<head>
  <!-- cdn ref -->
  <?php require_once("../../Assets/Dependencies/header.php"); ?>

  <!-- css ref -->
  <link href="SignUp.css" rel="stylesheet" type="text/css">

  <!-- page title -->
  <title>Rider Sign Up</title>
</head>

<body>
  <!-- vue app div -->
  <div id="app">
    <v-app>
      <!-- app bar  -->
      <v-app-bar fixed color="rgba(255,255,255,0.0)" elevate-on-scroll height="80" flat>

        <!-- grub logo -->
        <img class="grublogo" src="../../Assets/Images/grub.png" style="cursor:pointer" onclick="window.location.replace('../../Grub/Home/HomePage.php')">

        <v-spacer></v-spacer>

        <!-- home button -->
        <v-btn
          dark
          elevation="2"
          class="ma-2"
          color="pink"
          href="../../Grub/Home/HomePage.php"
          large
        ><v-icon>mdi-home</v-icon>
        </v-btn>

      </v-app-bar>

      <!-- vue main body -->
      <v-main>
        <!-- dynamic background -->
        <v-parallax
          height="1100"
          width="100%"
          src="https://images.pexels.com/photos/1437590/pexels-photo-1437590.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260"
          alt="ono..please refresh"
        >

          <!-- card alignment and size -->
          <v-row align="center" justify="center">
          <v-col cols="auto" sm="auto" md="auto" lg="auto" xl="auto">

            <!-- card element  -->
            <v-card class="elevation-12" color="#fafafa" min-width="800" max-width="1200">

              <!-- card title -->

              <v-toolbar color="#fafafa" dark flat>
                <v-toolbar-title class="pt-8 titletext">
                  Join our delivery team.
                </v-toolbar-title>
              </v-toolbar>

              <!-- signup form -->
              <v-card-text class="px-10 pt-8">
                <v-form id="form">

                  <v-text-field
                    label="Name"
                    prepend-icon="mdi-account"
                    type="text"
                    name="name"
                  ></v-text-field>

                  <v-text-field
                    label="Mobile Number"
                    prepend-icon="mdi-cellphone-android"
                    type="text"
                    name="contact"
                  ></v-text-field>

                  <v-text-field
                    label="Email"
                    prepend-icon="mdi-email"
                    type="text"
                    name="email"
                  ></v-text-field>

                  <v-textarea
                    label="Address"
                    prepend-icon="mdi-home"
                    auto-grow
                    name="address"
                  ></v-textarea>

                  <v-text-field
                    prepend-icon="mdi-lock-check"
                    :append-icon="show1 ? 'mdi-eye' : 'mdi-eye-off'"
                    :rules="[rules.required, rules.min]"
                    :type="show1 ? 'text' : 'password'"
                    label="Password"
                    hint="At least 8 characters"
                    counter
                    @click:append="show1 = !show1"
                    name="password"
                  ></v-text-field>

                  <v-file-input
                    prepend-icon="mdi-camera"
                    label="Selfie"
                    id="selfie"
                    name="selfie"
                  ></v-file-input>

                  <v-file-input
                    prepend-icon="mdi-motorbike"
                    label="Motor License"
                    id="license"
                    name="license"
                  ></v-file-input>

                  <v-file-input
                    prepend-icon="mdi-card-account-details"
                    label="Identification Card"
                    id="ic"
                    name="ic"
                  ></v-file-input>

                  <!-- submit button -->
                  <v-card-actions class="pa-5 pt-0">
                    <v-btn
                      large
                      block
                      color="pink"
                      class="white--text"
                      type="submit"
                    >submit</v-btn>
                  </v-card-actions>

                  <!-- output message -->
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
