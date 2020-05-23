<template>
	<div id="section-cards" class="m-5">
		<div class="container">
            <h1 style="font-size: 170%;">Bem vindo(a) a sua dashboard!</h1>
			<div class="row">
				<div class="col-md-4">
					<div class="dbox dbox--color-1">
						<div class="dbox__body">
                            <span class="dbox__title">Número de clientes</span>
							<span class="dbox__count">{{ clientsQtt }}</span>
						</div>
						
						<div class="dbox__action">
                            <router-link class="dbox__action__btn" to="/clientes">visualizar</router-link> 
						</div>				
					</div>
				</div>
				<div class="col-md-4">
					<div class="dbox dbox--color-3">
                        <div class="dbox__body">
                            <span class="dbox__title">Valor bruto arrecadado</span>
                            <span class="dbox__count">R$ {{ grossCollected }}</span>
                        </div>
                        
                        <div class="dbox__action">
                            <router-link class="dbox__action__btn" to="/clientes">visualizar</router-link> 
                        </div>              
                    </div>
				</div>
				<div class="col-md-4">
					<div class="dbox dbox--color-2">
                        <div class="dbox__body">
                            <span class="dbox__title">Número de Pratos</span>
                            <span class="dbox__count">{{ dishesQtt }}</span>
                        </div>
                        
                        <div class="dbox__action">
                            <router-link class="dbox__action__btn" to="/pratos">visualizar</router-link> 
                        </div>              
                    </div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
    const axios = require('axios').default;

	export default {
		name: 'section-cards',
        created:function() {
            axios.get(process.env.VUE_APP_API_URL + this.endpoint + '?api_token=' + process.env.VUE_APP_TOKEN)
            .then((res) => {
                this.clientsQtt  = res.data.clientsQtt;
                this.dishesQtt = res.data.dishesQtt;
                this.grossCollected = res.data.grossCollected;
            }).catch(() => {
                
            });
        },
        data: function() {
            return {
                endpoint: '/api/stats',
                dishesQtt: '',
                clientsQtt: '',
                grossCollected: ''
            }
        }
	}
</script>
<style>
.dbox {
    position: relative;
    background: rgb(255, 86, 65);
    background: -moz-linear-gradient(top, rgba(255, 86, 65, 1) 0%, rgba(253, 50, 97, 1) 100%);
    background: -webkit-linear-gradient(top, rgba(255, 86, 65, 1) 0%, rgba(253, 50, 97, 1) 100%);
    background: linear-gradient(to bottom, rgba(255, 86, 65, 1) 0%, rgba(253, 50, 97, 1) 100%);
    filter: progid: DXImageTransform.Microsoft.gradient( startColorstr='#ff5641', endColorstr='#fd3261', GradientType=0);
    border-radius: 4px;
    text-align: center;
    margin: 60px 0 50px;
}
.dbox__body {
    padding: 50px 20px;
}
.dbox__count {
    display: block;
    font-size: 30px;
    color: #FFF;
    font-weight: 300;
}
.dbox__title {
    font-size: 13px;
    color: #FFF;
    color: rgba(255, 255, 255, 0.81);
}
.dbox__action {
    transform: translateY(-50%) translateX(-50%);
    position: absolute;
    left: 50%;
}
.dbox__action__btn {
    border: none;
    background: #FFF;
    border-radius: 19px;
    padding: 7px 16px;
    text-transform: uppercase;
    font-weight: 500;
    font-size: 11px;
    letter-spacing: .5px;
    color: #003e85;
    box-shadow: 0 3px 5px #d4d4d4;
}


.dbox--color-2 {
    background: rgb(252, 190, 27);
    background: -moz-linear-gradient(top, rgba(252, 190, 27, 1) 1%, rgba(248, 86, 72, 1) 99%);
    background: -webkit-linear-gradient(top, rgba(252, 190, 27, 1) 1%, rgba(248, 86, 72, 1) 99%);
    background: linear-gradient(to bottom, rgba(252, 190, 27, 1) 1%, rgba(248, 86, 72, 1) 99%);
    filter: progid: DXImageTransform.Microsoft.gradient( startColorstr='#fcbe1b', endColorstr='#f85648', GradientType=0);
}
.dbox--color-2 .dbox__icon:after {
    background: #fee036;
    background: rgba(254, 224, 54, 0.81);
}
.dbox--color-2 .dbox__icon:before {
    background: #fee036;
    background: rgba(254, 224, 54, 0.64);
}
.dbox--color-2 .dbox__icon > i {
    background: #fb9f28;
}

.dbox--color-3 {
    background: rgb(183,71,247);
    background: -moz-linear-gradient(top, rgba(183,71,247,1) 0%, rgba(108,83,220,1) 100%);
    background: -webkit-linear-gradient(top, rgba(183,71,247,1) 0%,rgba(108,83,220,1) 100%);
    background: linear-gradient(to bottom, rgba(183,71,247,1) 0%,rgba(108,83,220,1) 100%);
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#b747f7', endColorstr='#6c53dc',GradientType=0 );
}
.dbox--color-3 .dbox__icon:after {
    background: #b446f5;
    background: rgba(180, 70, 245, 0.76);
}
.dbox--color-3 .dbox__icon:before {
    background: #e284ff;
    background: rgba(226, 132, 255, 0.66);
}
.dbox--color-3 .dbox__icon > i {
    background: #8150e4;
}
</style>