<template>
<tr>
	<td>{{ row.firstname }}</td>
	<td>{{ row.surname }}</td>
	<td>{{ row.email }}</td>
	<td>
	<button id="add-person-button" @click="onDelete(row.id)" class="btn btn-link"><span class="glyphicon glyphicon-trash"></span></button>
	<router-link :to="'/people/edit/' + row.id" id="add-person-button" class="btn btn-link"><span class="glyphicon glyphicon-pencil"></span></router-link>
	</td>
</tr>
</template>

<style scoped>

td .btn {
    padding-top:0;
    padding-bottom:0;
}

tr:hover {
    background-color:#b4dbf7;
    box-shadow: 0px 2px 5px #888888;
}

</style>

<script>
  import {mapState, mapActions} from 'vuex';

  export default {

    name: 'PersonRow',
    
    props: {
        row: {
          type: Object,
          required: true,
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
        onDelete(id) {
            this.$emit('onDelete', id)
          }

    }
  }
</script>
