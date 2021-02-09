<v-navigation-drawer v-model="cart_drawer" fixed temporary width="auto" style="min-width:400">

	<!-- data table start  -->
	<v-data-table :headers="headers" :items="cart" :hide-default-footer="true">

		<template v-slot:top>
			<!-- drawer header -->
			<v-toolbar flat color="white">
				<v-toolbar-title class="cartheading">
				My cart.
				</v-toolbar-title>
			</v-toolbar>
		</template>

		<template v-slot:item.actions="{ item }">
			<!-- plus btn -->
			<v-icon
				small
				class="mr-2"
				@click="incrementItem(item)"
			>mdi-plus</v-icon>

			<!-- minus btn -->
			<v-icon
				small
				@click="decrementItem(item)"
			>mdi-minus</v-icon>

			<!-- delete btn -->
			<v-icon
				small
				right
				@click="deleteItem(item)"
			>mdi-close</v-icon>
		</template>

	</v-data-table>

	<br>

	<!-- payment summary -->
	<div>
		<!-- subtotal -->
		<p class="payment">Subtotal : RM {{subtotal.toFixed(2)}}</p>

		<!-- fixed value -->
		<p class="payment">Delivery Fee : RM 5.00</p>

		<!-- gst 6% -->
		<p class="payment">Service Tax : RM {{(subtotal * 0.06).toFixed(2)}}</p>

		<!-- (sub + del) * 1.06 -->
		<p class="total">Total :

		<span style="font-weight: bold; font-size: 22px;">
		RM {{(subtotal * 1.06 + 5).toFixed(2)}}
		</span>
		</p>
	</div>

	<br>
<center>
	<v-btn
		color="pink checkout"
		width=360px
		dark
		@click="checkout()"
	>Checkout</v-btn>
</center>

</v-navigation-drawer>
