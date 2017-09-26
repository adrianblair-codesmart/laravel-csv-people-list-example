<template>
<div class="container" id="main">
	<h3>Main page</h3>
	<hr>
    <people-search></people-search>
	<br>
	<people-list></people-list>

</div>
</template>

<style scoped>
#main {
	text-align: center;
}
</style>

<script>
  import {mapState, mapActions} from 'vuex';
  import PeopleList from '../person/List.vue';
  import PeopleSearch from '../person/Search.vue'
  
  export default {
      
      components: {
          peopleList: PeopleList,
          peopleSearch: PeopleSearch
      },

    data() {
      return {};
     },

    computed: {},

    methods: {}
  }
</script>
