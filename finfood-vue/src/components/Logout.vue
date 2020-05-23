<template>
	<div class="logout">
		<button class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-sm">
		<font-awesome-icon icon="sign-out-alt" />
		Logout</button>
		<div class="modal bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog modal-sm">
				<div class="modal-content">
					<div class="modal-header"><h4>Logout <i class="fa fa-lock"></i></h4></div>
					<div class="modal-body"><i class="fa fa-question-circle"></i> {{ message }}</div>
					<div class="modal-footer"><a class="btn btn-primary btn-block" href="login">Logout</a></div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
	export default {
		name: 'logout',
		data: function() {
			return {
				message: 'Tem certeza que deseja sair?'
			}
		}
	}
</script>