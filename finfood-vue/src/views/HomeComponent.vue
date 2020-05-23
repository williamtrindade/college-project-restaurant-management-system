<template>
	<div id="home">
		<navbar></navbar>
		<section-cards></section-cards>
	</div>
</template>

<script>
import Navbar from '../components/Navbar.vue';
import SectionCards from '../components/SectionCards.vue';

export default {
  name: 'home',
  components: {
	'navbar':Navbar, 
	'section-cards':SectionCards
  }
}
</script>
