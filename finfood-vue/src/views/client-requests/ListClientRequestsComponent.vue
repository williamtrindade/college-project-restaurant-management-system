<template>
	<div id="list-client-requests">
		<navbar></navbar>
		<div class="m-3">
			<h1 class="title-section">Lista de Pedidos</h1>
			<router-link class="btn btn-sm btn-success mb-3" to="/pedidos/novo">
				<font-awesome-icon icon="plus"/> Novo Pedido
			</router-link>
			<div class="shadow p-3">
				<table style="text-align: center;" class="table table-responsive-sm">
					<thead>
						<tr>
							<th scope="col">Data</th>
							<th scope="col">Preço total</th>
							<th scope="col">Cliente</th>
							<th scope="col">Pratos</th>
							<th scope="col">Ações</th>
						</tr>
					</thead>
					<tbody>
						<tr v-bind:key="request.id" v-for="request in requests">
							<td>{{ request.created_at }}</td>
							<td>{{ request.total_price}}</td>
							<td>{{ request.client.name }}</td>
							<td>
								<span v-bind:key="dish.id" v-for="dish in request.dishes" class="badge badge-primary m-1">
									{{ dish.name }}
								</span>
							</td>
							<td>
								<!-- <button class="btn btn-sm btn-primary mr-3"> <font-awesome-icon icon="edit"/> Editar</button> -->
								<button class="btn btn-sm btn-danger" v-on:click="remove(request.id, index)"> <font-awesome-icon icon="trash"/> Excluir</button>
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
		name: 'list-client-requests',
		components: {
			'navbar': Navbar 
		},
		created:function() {
			axios.get(process.env.VUE_APP_API_URL + this.endpoint + '?api_token=' + process.env.VUE_APP_TOKEN)
			.then((res) => {
				this.requests = res.data;
			}).catch((e) => {
				throw new Error(e);
			});
		},
		data: function() {
			return {
				endpoint: '/api/clientRequests',
				requests: ''
			}
		},
		methods: {
			remove(id, index) {
				axios.delete(process.env.VUE_APP_API_URL + this.endpoint + '/' + id + '?api_token=' + process.env.VUE_APP_TOKEN)
				.then((res) => {
					if (res.status === 204) {
						this.requests.splice(index, 1);
					}
				}).catch((e) => {
					throw new Error(e);
				})
			}
		}
	}
</script>