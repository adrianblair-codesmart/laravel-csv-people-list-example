<template>
<div class="input-group">
	<input type="text" class="form-control"
		placeholder="Please enter your search..." v-model="people_search"> <label
		class="input-group-btn">
		<button @click="onSearch" class="btn btn-default">Search</button>
	</label>
</div>
</template>

<style scoped>
</style>

<script>
import {mapState, mapActions} from 'vuex';

export default {

  name: 'PeopleSearch',
  
  props: {
    },
  
  components: {
      
  },

  data() {
    return {
        people_search: '',
    };
  },

  mounted() {
      
  },

  computed: {

  },

  methods: {
      ...mapActions([
          'loadPeople',
          'setSearchTerm'
          ]),
      onSearch() {
          console.log(this.people_search);
          this.loadPeople({people_search: this.people_search}).then(() => {
              this.setSearchTerm(this.people_search);
          })
          .catch((data) => {
            this.errors = data.errors || {}
          });
        } 
  }
}
</script>