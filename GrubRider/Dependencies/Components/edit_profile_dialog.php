<v-dialog v-model="profile_dialog" max-width="500">

  <template v-slot:activator="{ on, attrs }">
    <v-btn
      block
      color="pink"
      class="white--text mb-4"
      v-bind="attrs"
      v-on="on"
    >Edit Profile</v-btn>
  </template>

  <v-card>

    <v-card-title>
      <span class="dialog-title">Edit Profile</span>
    </v-card-title>

    <!-- fields -->
    <v-card-text>
      <v-form id="editprofileform">

        <v-text-field
          label="Name"
          prepend-icon="mdi-account"
          type="text"
          value="<?php echo $rid_name; ?>"
          name="name"
        ></v-text-field>

        <v-text-field
          label="Mobile Number"
          prepend-icon="mdi-cellphone-android"
          type="text"
          value="<?php echo $rid_contact; ?>"
          name="contact"
        ></v-text-field>

        <!-- confirm button -->
        <v-card-actions class="pa-5 pt-0">
          <v-btn
            block
            color="pink"
            class="white--text"
            onclick="editprofile();"
          >Confirm</v-btn>
        </v-card-actions>

        <v-row justify="center"><p id="profile-error"></p></v-row>

      </v-form>
    </v-card-text>

  </v-card>

</v-dialog>