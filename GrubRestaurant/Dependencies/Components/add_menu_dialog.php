<v-dialog v-model="add_menu_dialog" max-width="600px">
  <template v-slot:activator="{ on, attrs }">
    <v-btn
     fixed right
     bottom dark fab
     color="pink"
     v-bind="attrs"
     v-on="on"
     class="ma-5"
    ><v-icon>mdi-plus</v-icon>
    </v-btn>
  </template>

  <v-card>
    <v-card-title>
      <span class="dialogtext pink--text">
        Add New Menu
      </span>
    </v-card-title>

    <v-card-text>
      <v-form id="addmenuform">

        <v-text-field
          label="Food Name"
          prepend-icon="mdi-food"
          type="text"
          v-model="form[0]"
          name="name"
        ></v-text-field>

        <v-textarea
          label="Description"
          prepend-icon="mdi-pencil"
          auto-grow
          v-model="form[1]"
          name="description"
        ></v-textarea>

        <v-text-field
          label="Price"
          prepend-icon="mdi-cash-multiple"
          type="number"
          step="0.01"
          v-model="form[2]"
          name="price"
        ></v-text-field>

        <v-file-input
          prepend-icon="mdi-image-multiple"
          label="Food Image"
          v-model="form[3]"
          id="add_menu_image"
          name="image"
        ></v-file-input>

        <v-card-actions class="pa-5 pt-0">
          <v-btn
            large
            block
            color="pink"
            class="white--text"
            onclick="addmenu();"
          >Add Item</v-btn>
        </v-card-actions>

        <!-- output message -->
        <v-row justify="center"><p id="add-error"></p></v-row>

      </v-form>
    </v-card-text>

  </v-card>
</v-dialog>