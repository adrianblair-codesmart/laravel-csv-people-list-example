<template>
<form class="form-horizontal col-lg-12" id="person_form" role="form"
	@submit.prevent="onSubmit">


	<div class="form-group" :class="{ 'has-error': errors.firstname }">
			<label for="firstname">Firstname:</label> <input type="text"
				class="form-control" id="firstname" v-model="form.firstname">

		<div class="help-block" v-if="errors.firstname">
			<div v-for="error in errors.firstname">
				<strong>{{ error }}</strong>
			</div>
		</div>
	</div>

	<div class="form-group" :class="{ 'has-error': errors.surname }">
			<label for="surname">Surname:</label> <input type="text"
				class="form-control" id="surname" v-model="form.surname">

		<div class="help-block" v-if="errors.surname">
			<div v-for="error in errors.surname">
				<strong>{{ error }}</strong>
			</div>
		</div>
	</div>

	<div class="form-group" :class="{ 'has-error': errors.email }">

			<label for="email">Email:</label> <input type="text"
				class="form-control" id="email" v-model="form.email">

		<div class="help-block" v-if="errors.email">
			<div v-for="error in errors.email">
				<strong>{{ error }}</strong>
			</div>
		</div>
	</div>

	<div class="form-group pull-right">
		<router-link class="btn btn-primary" :to="{ name: 'Main' }">Back</router-link>
		<button type="submit" class="btn btn-primary">Submit</button>
	</div>
</form>
</template>

<style scoped>
.input-group {
	margin: auto;
}
</style>

<script>
  import {mapState, mapActions} from 'vuex';

  export default {

      props: {
          form: {
            type: Object,
            required: true,
          },
          errors: {
            type: Object,
          }
        },
        
        components: {
            
        },

        data() {
          return {
              
          };
        },

        mounted() {
            
        },

        computed: {

        },

        methods: {
            onSubmit() {
                this.$emit('onSubmit', this.form)
              }

        }

  }
</script>
