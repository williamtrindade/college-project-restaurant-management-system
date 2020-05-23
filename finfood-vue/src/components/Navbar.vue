<template>
    <div id="navbar">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <router-link to="/" class="navbar-brand">finfood</router-link>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <router-link class="nav-item nav-link active" to="/">Home</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link class="nav-item nav-link active" to="/clientes">Clientes</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link class="nav-item nav-link active" to="/pedidos">Pedidos</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link class="nav-item nav-link active" to="/pratos">Pratos</router-link>
                    </li>
                </ul>
                <logout></logout>
            </div>
        </nav>
    </div>
</template>

<script>
import Logout from '../components/Logout.vue'

export default {
    name: 'navbar',
    components: {
        'logout': Logout
    }
}
</script>
