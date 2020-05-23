<template>
	<div id="create-dish">
		<navbar></navbar>
		<div class="m-3">
			<h1 class="title-section">Cadastro de Pratos</h1>
			<div class="shadow p-3">
				<form v-on:submit="send('', $event)" >
					<div class="form-group">
						<label for="name">Nome</label>
						<input required v-model="name" max="255" type="text" class="form-control" id="name" placeholder="Nome">
					</div>
					<div class="form-group">
						<label for="description">Descrição</label>
						<input required v-model="description" type="text" max="255" class="form-control phone" id="description" placeholder="Descrição do Prato">
					</div>
					<div class="form-group">
						<label for="price">Preço</label>
						<input required v-model="price" type="number" min="0.00" max="10000.00" step="0.01" class="form-control phone" id="price" placeholder="R$ 0.00">
					</div>
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
		name: 'create-dish',
		components: {
			'navbar': Navbar
		},
		data: function() {
			return {
				endpoint: '/api/dishes',
				name: '',
				description: '',
				price: ''
			}
		},
		methods: {
			send(message, event) {
				event.preventDefault();
				axios.post(process.env.VUE_APP_API_URL + this.endpoint + '?api_token=' + process.env.VUE_APP_TOKEN, {
					'name': this.name,
					'description': this.description,
					'price': this.price
				}).then((res) => {
					if (res.status === 201) this.$router.push({ path: '/pratos' });
				}).catch((e) => {
					throw new Error(e);
				});
			}
		}
	}
</script>