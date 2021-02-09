<v-dialog v-model="pass_dialog" max-width="500">

  <template v-slot:activator="{ on, attrs }">
    <v-btn
      block
      color="pink"
      class="white--text mb-4"
      v-bind="attrs"
      v-on="on"
    >Change Password</v-btn>
  </template>

  <v-card>

    <v-card-title>
      <span class="pink--text">Change Password</span>
    </v-card-title>

    <!-- fields -->
    <v-card-text>
      <v-form id="changepassform">

        <v-text-field
          :append-icon="show1 ? 'mdi-eye' : 'mdi-eye-off'"
          :type="show1 ? 'text' : 'password'"
          label="Enter your old password"
          class="input-group--focused"
          color= "grey"
          @click:append="show1 = !show1"
          name="oldpass"
        ></v-text-field>

        <v-text-field
          :append-icon="show2 ? 'mdi-eye' : 'mdi-eye-off'"
          :rules="[rules.required, rules.min]"
          :type="show2 ? 'text' : 'password'"
          label="Enter a new password"
          hint="At least 8 characters"
          class="input-group--focused"
          color="grey"
          counter
          @click:append="show2 = !show2"
          name="newpass"
        ></v-text-field>

        <!-- confirm button -->
        <v-card-actions class="pa-5 pt-0">
          <v-btn
            block
            color="pink"
            class="white--text"
            onclick="changepass();"
          >Confirm</v-btn>
        </v-card-actions>

        <v-row justify="center"><p id="pass-error"></p></v-row>

      </v-form>
    </v-card-text>

  </v-card>

</v-dialog>