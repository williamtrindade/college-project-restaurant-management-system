<template>
	<div id="create-client">
		<navbar></navbar>
		<div class="m-3">
			<h1 class="title-section">Cadastro de Cliente</h1>
			<div class="shadow p-3">
				<form v-on:submit="send('', $event)" >
					<div class="form-group">
						<label for="name">Nome</label>
						<input required v-model="name" max="255" type="text" class="form-control" id="name" placeholder="Nome">
					</div>
					<div class="form-group">
						<label for="phone">Telefone</label>
						<input required type="text" maxlength="15" v-model="phone" class="form-control phone" id="phone" placeholder="(99)99999-9999">
					</div>
					<button class="btn btn-sm m-2 btn-primary" >Cadastrar</button>
					<router-link class="btn btn-sm btn-secondary m-2" to="/clientes">Cancelar</router-link>
				</form>
			</div>
		</div>
	</div>
</template>

<script>
	import Navbar from '../../components/Navbar.vue';
	const axios = require('axios').default;

	export default {
		name: 'create-client',
		components: {
			'navbar': Navbar
		},
		data: function() {
			return {
				endpoint: '/api/clients',
				name: '',
				phone: ''
			}
		},
		methods: {
			send(message, event) {
				event.preventDefault();
				axios.post(process.env.VUE_APP_API_URL + this.endpoint + '?api_token=' + process.env.VUE_APP_TOKEN, {
					'name': this.name,
					'phone': this.phone
				}).then((res) => {
					if (res.status === 201) this.$router.push({ path: '/clientes' });
				}).catch((e) => {
					throw new Error(e);
				});
			}
		}
	}
</script>