<v-navigation-drawer v-model="drawer" style="min-width:300px;" fixed temporary width="auto" style="min-width:25%;">

  <!-- profile avatar and name -->
  <template v-slot:prepend class="my-5">
    <v-list-item two-line>

      <v-list-item-avatar>
        <img src="https://picsum.photos/81">
      </v-list-item-avatar>

      <v-list-item-content>
        <v-list-item-title class="username">
          <?php echo $rid_name; ?>
        </v-list-item-title>

        <v-list-item-subtitle>
          Rider
        </v-list-item-subtitle>
      </v-list-item-content>

    </v-list-item>
  </template>

  <v-divider></v-divider>

  <!-- drawer group param -->
  <v-list nav dense>
    <v-list-item-group active-class="pink--text text--accent-4">

      <v-list-item href="../Profile/ProfilePage.php">
        <v-list-item-icon>
          <v-icon>mdi-account</v-icon>
        </v-list-item-icon>

        <v-list-item-title>
          My Profile
        </v-list-item-title>
      </v-list-item>

      <v-list-item href="../ActivityHistory/ActivityHistoryPage.php">
        <v-list-item-icon>
          <v-icon>mdi-clock-time-seven</v-icon>
        </v-list-item-icon>

        <v-list-item-title>
          Activity History
        </v-list-item-title>
      </v-list-item>

    </v-list-item-group>
  </v-list>

</v-navigation-drawer>