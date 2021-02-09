<v-dialog v-model="home_dialog" max-width="290">
  <v-card>
    <v-card-title class="headline pink--text">Warning!</v-card-title>

    <v-card-text>
      Please select a location to proceed.
    </v-card-text>

    <v-card-actions>
      <v-spacer></v-spacer>

      <v-btn
        color="pink darken-1"
        text
        @click="home_dialog = false"
      >Ok</v-btn>

    </v-card-actions>
  </v-card>
</v-dialog>
