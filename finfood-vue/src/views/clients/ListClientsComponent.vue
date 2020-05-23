<template>
	<div id="list-clients">
		<navbar></navbar>
		<div class="m-3">
			<h1 class="title-section">Lista de Clientes</h1>
			<router-link class="btn btn-sm btn-success mb-3" to="/clientes/novo">
				<font-awesome-icon icon="plus"/> Novo Cliente
			</router-link>
			<div class="shadow p-3">
				<table style="text-align: center;" class="table table-responsive-sm">
					<thead>
						<tr>
							<th scope="col">Nome</th>
							<th scope="col">Telefone</th>
							<th scope="col">Ações</th>
						</tr>
					</thead>
					<tbody>
						<tr v-bind:key="client.id" v-for="client in clients">
							<td>{{ client.name }}</td>
							<td>{{ client.phone}}</td>
							<td>
								<button class="btn btn-sm btn-primary mr-3"> <font-awesome-icon icon="edit"/> Editar</button>
								<button class="btn btn-sm btn-danger" v-on:click="remove(client.id, index)"> <font-awesome-icon icon="trash"/> Excluir</button>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</template>

<script>
	import Navbar from '../../components/Navbar.vue';
	const axios = require('axios').default;

	export default {
		name: 'list-clients',
		components: {
			'navbar': Navbar 
		},
		created:function() {
			axios.get(process.env.VUE_APP_API_URL + this.endpoint + '?api_token=' + process.env.VUE_APP_TOKEN)
			.then((res) => {
				this.clients = res.data;
			}).catch((e) => {
				throw new Error(e);
			});
		},
		data: function() {
			return {
				endpoint: '/api/clients',
				clients: ''
			}
		},
		methods: {
			remove(id, index) {
				axios.delete(process.env.VUE_APP_API_URL + this.endpoint + '/' + id + '?api_token=' + process.env.VUE_APP_TOKEN)
					.then((res) => {
						if (res.status === 204) {
							this.clients.splice(index, 1)
						}
					});
			}
		}
	}
</script>