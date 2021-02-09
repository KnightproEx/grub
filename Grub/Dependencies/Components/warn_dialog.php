<v-dialog v-model="warn_dialog" max-width="350">
  <v-card>
    <v-card-title class="headline pink--text">Warning!</v-card-title>

    <v-card-text>
      Floor/Unit cannot be blanked.
    </v-card-text>

    <v-card-actions>
      <v-spacer></v-spacer>

      <v-btn
        color="pink darken-1"
        text
        @click="warn_dialog = false"
      >Ok</v-btn>
    </v-card-actions>
  </v-card>
</v-dialog>