<v-dialog v-model="back_dialog" max-width="350">
  <v-card>
    <v-card-title class="headline pink--text">Warning!</v-card-title>

    <v-card-text>
      You are about to cancel your order. All cart data will be cleared. Continue?
    </v-card-text>

    <v-card-actions>
      <v-spacer></v-spacer>

      <v-btn
        color="pink darken-1"
        text
        @click="back_dialog = false"
        <?php echo "href='../Menu/MenuPage.php?res=" . $_SESSION["res"] . "'"; ?>
      >Yes</v-btn>

      <v-btn
        color="pink darken-1"
        text
        @click="back_dialog = false"
      >No</v-btn>
    </v-card-actions>
  </v-card>
</v-dialog>
