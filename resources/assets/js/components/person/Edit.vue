
<template>
<div class="container">
	<h3>Edit Person</h3>
	<hr>

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-body">
					<person-form @onSubmit="onSubmit" :form="form" :errors="errors"></person-form>
				</div>
			</div>
		</div>
	</div>
</div>
</template>

<script>
  import {mapState, mapActions} from 'vuex';
  import PersonForm from './form';

  export default {

    components: {
        personForm: PersonForm
    },

    data() {
      return {
        errors: {},
      };
    },

    mounted() {
        this.loadPerson(this.id);
    },

    computed: {
        ...mapState({
            person: state => state.people.person,
          }),
          id() {
              return this.$route.params.id;
            },
            form() {
                return {
                    firstname: this.person.firstname,
                    surname: this.person.surname,
                    email: this.person.email,
                }
              }
    },

    methods: {
        ...mapActions([
            'loadPerson',
            'updatePerson'
            ]),
            onSubmit(form) {
            
            const id = this.$route.params.id;
            this.updatePerson({id, form})
              .then(() => {
                this.$router.go(-1);
              })
              .catch((data) => {
                this.errors = data.errors || {}
              });
          },

    }
  }
</script>
