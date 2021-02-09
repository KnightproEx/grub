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

        <!-- restaurant name -->
        <v-text-field
          label="Restaurant Name"
          prepend-icon="mdi-chef-hat"
          type="text"
          name="resname"
          value="<?php echo $res_name; ?>"
        ></v-text-field>

        <!-- rest desc -->
        <v-textarea
          label="Restaurant Description"
          prepend-icon="mdi-pencil"
          auto-grow
          name="description"
          value="<?php echo $res_desc; ?>"
        ></v-textarea>

        <!-- contact -->
        <v-text-field
          label="Contact"
          name="contact"
          prepend-icon="mdi-cellphone-android"
          type="text"
          name="contact"
          value="<?php echo $res_contact; ?>"
        ></v-text-field>

        <!-- address -->
        <v-text-field
          label="Address"
          name="address"
          prepend-icon="mdi-map-marker"
          type="text"
          name="address"
          value="<?php echo $res_address; ?>"
        ></v-text-field>

        <v-file-input
          prepend-icon="mdi-image-multiple"
          label="Restaurant Image"
          id="resimage"
        ></v-file-input>

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