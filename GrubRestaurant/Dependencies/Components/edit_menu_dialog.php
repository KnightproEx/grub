<v-dialog v-model="edit_menu_dialog[card.index]" max-width="600px">
  <template v-slot:activator="{ on, attrs }">
    <v-btn
      icon
      v-bind="attrs"
      v-on="on"
      class="mx-3"
    ><v-icon>mdi-pencil</v-icon>
    </v-btn>
  </template>

  <v-card>
    <v-card-title>
      <span class="dialogtext pink--text">
        Edit Menu
      </span>
    </v-card-title>

    <v-card-text>
      <v-form :id="editmenuform[card.index]">

        <v-text-field
          label="Food Name"
          prepend-icon="mdi-food"
          type="text"
          name="name"
          :value="card.title"
        ></v-text-field>

        <v-textarea
          label="Description"
          prepend-icon="mdi-pencil"
          auto-grow
          name="description"
          :value="card.description"
        ></v-textarea>

        <v-text-field
          label="Price (RM)"
          prepend-icon="mdi-cash-multiple"
          type="number"
          name="price"
          step="0.01"
          :value="card.price"
        ></v-text-field>

        <v-file-input
          prepend-icon="mdi-image-multiple"
          label="Food Image"
          :id="editmenuimage[card.index]"
          name="image"
        ></v-file-input>

        <v-card-actions class="pa-5 pt-0">
          <v-btn
            block
            color="pink"
            class="white--text"
            @click="editmenu(card.index)"
          >Save Changes</v-btn>
        </v-card-actions>

        <!-- output message -->
        <v-row justify="center"><p id="menu-error"></p></v-row>

      </v-form>
    </v-card-text>


  </v-card>
</v-dialog>