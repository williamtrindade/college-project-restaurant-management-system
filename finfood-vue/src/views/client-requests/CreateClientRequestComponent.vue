<template>
	<div id="create-client-request">
		<navbar></navbar>
		<div class="m-3">
			<h1 class="title-section">Cadastro de Pedidos</h1>
			<div class="shadow p-3">
				<form v-on:submit="send('', $event)" >
					<p>Cliente</p>
					<v-select
						v-model="client_id"
						taggable
						label="name"
						:options="databaseClients"
					/>
					<hr>
					<p>Pratos</p>
					<v-select
						v-model="dishes"
						taggable
						multiple
						label="name"
						:options="databaseDishes"
					/>
					<button class="btn btn-sm m-2 btn-primary" >Cadastrar</button>
					<router-link class="btn btn-sm btn-secondary m-2" to="/pratos">Cancelar</router-link>
				</form>
			</div>
		</div>
	</div>
</template>

<script>
	import Navbar from '../../components/Navbar.vue';

	const axios = require('axios').default;

	export default {
		name: 'create-client-request',
		components: {
			'navbar': Navbar
		},
		created:function() {
			axios.get(process.env.VUE_APP_API_URL + '/api/clients' + '?api_token=' + process.env.VUE_APP_TOKEN)
			.then((res) => {
				if (res.status === 200) this.databaseClients = res.data;
			}).catch((e) => {
				throw new Error(e);
			});

			axios.get(process.env.VUE_APP_API_URL + '/api/dishes' + '?api_token=' + process.env.VUE_APP_TOKEN)
			.then((res) => {
				if (res.status === 200) this.databaseDishes = res.data;
			}).catch((e) => {
				throw new Error(e);
			});
		},
		data: function() {
			return {
				endpoint: '/api/clientRequests',
				databaseClients: '',
				databaseDishes: '',
				client_id: '',
				dishes: '',
			}
		},
		methods: {
			send(message, event) {
				event.preventDefault();
				axios.post(process.env.VUE_APP_API_URL + this.endpoint + '?api_token=' + process.env.VUE_APP_TOKEN, {
					'client_id': this.client_id.id,
					'dishes': this.dishes.map((dish) => dish.id)
				}).then((res) => {
					if (res.status === 201) this.$router.push({ path: '/pedidos' });
				}).catch((e) => {
					throw new Error(e);
				});
			}
		}
	}
</script>