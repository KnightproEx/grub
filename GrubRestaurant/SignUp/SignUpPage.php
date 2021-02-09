<html>

<head>
  <!-- cdn ref -->
  <?php require_once("../../Assets/Dependencies/header.php"); ?>

  <!-- css ref -->
  <link href="SignUp.css" rel="stylesheet" type="text/css">

  <!-- page title -->
  <title>Restaurant Sign Up</title>
</head>

<body>
  <!-- vue js ref -->
  <div id="app">
    <!-- vue starts -->
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
      <v-main class="mainbody">
        <!-- dynamic background -->
        <v-parallax
          height="1260"
          width="100%"
          src="https://images.pexels.com/photos/1624487/pexels-photo-1624487.jpeg?auto=compress&cs=tinysrgb&dpr=3&h=750&w=1260"
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
                  Become our partner.
                </v-toolbar-title>
              </v-toolbar>

              <!-- signup form -->
              <v-card-text class="px-10 pt-8">
                <v-form id="form">

                  <v-text-field
                    label="SSM Registration No."
                    prepend-icon="mdi-account-group"
                    type="text"
                    name="ssmreg"
                  ></v-text-field>

                  <v-text-field
                    label="Restaurant Name"
                    prepend-icon="mdi-chef-hat"
                    type="text"
                    name="name"
                  ></v-text-field>

                  <v-text-field
                    label="Company Name"
                    prepend-icon="mdi-briefcase-account"
                    type="text"
                    name="coname"
                  ></v-text-field>

                  <v-textarea
                    label="Restaurant Description"
                    prepend-icon="mdi-pencil"
                    auto-grow
                    name="description"
                  ></v-textarea>

                  <v-text-field
                    label="Email"
                    prepend-icon="mdi-email"
                    type="text"
                    name="email"
                  ></v-text-field>

                  <v-text-field
                    label="Contact"
                    prepend-icon="mdi-cellphone-android"
                    type="text"
                    name="contact"
                  ></v-text-field>

                  <v-textarea
                    label="Address"
                    prepend-icon="mdi-office-building-marker"
                    auto-grow
                    name="address"
                  ></v-textarea>

                  <v-text-field
                    v-model="password"
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
                    label="SSM Copy"
                    name="ssm_img"
                    id="ssm_img"
                  ></v-file-input>

                  <v-file-input
                    prepend-icon="mdi-domain"
                    label="Restaurant Image"
                    name="res_img"
                    id="res_img"
                  ></v-file-input>

                  <!-- submit button  -->
                  <v-card-actions class="pa-5 pt-0">
                    <v-btn
                      large
                      block
                      color="pink"
                      class="white--text"
                      type="submit"
                    >Submit</v-btn>
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
