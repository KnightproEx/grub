<v-dialog v-model="logout_dialog" max-width="350">
  <v-card>
    <v-card-title class="headline pink--text">Warning!</v-card-title>

    <v-card-text>
      You are about to logout from your account. Continue?
    </v-card-text>

    <v-card-actions>

      <v-spacer></v-spacer>

      <v-btn
        color="pink darken-1"
        text
        @click="logout_dialog = false"
        href="../../Grub/PartnerLogin/Logout.php"
      >Yes</v-btn>

      <v-btn
        color="pink darken-1"
        text
        @click="logout_dialog = false"
      >No</v-btn>
      
    </v-card-actions>
  </v-card>
</v-dialog>
