<template>
<nav class="navbar navbar-default navbar-static-top">
	<div class="container">
		<div class="navbar-header">

			<!-- Collapsed Hamburger -->
			<button type="button" class="navbar-toggle collapsed"
				data-toggle="collapse" data-target="#app-navbar-collapse">
				<span class="sr-only">Toggle Navigation</span> <span
					class="icon-bar"></span> <span class="icon-bar"></span> <span
					class="icon-bar"></span>
			</button>

			<!-- Branding Image -->
			<router-link class="navbar-brand" to="/">People List Example</router-link>
		</div>

		<div class="collapse navbar-collapse" id="app-navbar-collapse">
			<!-- Left Side Of Navbar -->
			<ul class="nav navbar-nav">&nbsp;</ul>

			<ul class="nav navbar-nav navbar-right">
				<router-link tag="li" to="/">
				<a>Home</a></router-link>
				<router-link tag="li" to="/csv">
				<a>CSV</a></router-link>
			</ul>

		</div>
	</div>
</nav>
</template>

<script>
  import {mapState, mapActions} from 'vuex';

  export default {

    data() {
      return {};
    },

    computed: {
    },

    methods: {}
  }
</script>
