
<template>
<div class="container">
    <h3>New Person</h3>
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
        form: {
            firstname: '',
            surname: '',
            email: '',
        }
      };
    },

    mounted() {
    },

    computed: {
    },

    methods: {
        ...mapActions([
            'loadPerson',
            'storePerson'
            ]),
            onSubmit(form) {
            
            this.storePerson(form)
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
