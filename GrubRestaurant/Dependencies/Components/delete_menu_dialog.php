<v-dialog v-model="delete_menu_dialog[card.index]" max-width="290">
  <template v-slot:activator="{ on, attrs }">
   <v-btn
     icon
     v-bind="attrs"
     v-on="on"
    ><v-icon>mdi-delete</v-icon>
    </v-btn>
  </template>

  <v-card>
    <v-card-title class="headline pink--text">
      Confirm Delete?
    </v-card-title>

    <v-card-text>
      This action cannot be undone.
    </v-card-text>

    <v-card-actions>

      <v-spacer></v-spacer>

     <v-btn
       color="pink darken-1"
       text
       @click="deletemenu(card.index)"
     >Delete</v-btn>

     <v-btn
       color="pink darken-1"
       text
       onclick="fetchdata();"
     >Cancel</v-btn>

    </v-card-actions>

  </v-card>
</v-dialog>