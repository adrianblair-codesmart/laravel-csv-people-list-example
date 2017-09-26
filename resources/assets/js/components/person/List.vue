<template>
<div class="panel panel-default table-responsive">
	<table class="table table-bordered" id="people-list">
		<thead>
			<tr>
				<th><button class="btn btn-link"
						@click="onSort('firstname')">Firstname 
						<span v-if="sortingOrders.firstname == 'asc'" class="glyphicon glyphicon-sort-by-alphabet"></span>
						<span v-if="sortingOrders.firstname == 'desc'" class="glyphicon glyphicon-sort-by-alphabet-alt"></span>
						</button>
						</th>
				<th><button class="btn btn-link"
						@click="onSort('surname')">Surname 
                        <span v-if="sortingOrders.surname == 'asc'" class="glyphicon glyphicon-sort-by-alphabet"></span>
                        <span v-if="sortingOrders.surname == 'desc'" class="glyphicon glyphicon-sort-by-alphabet-alt"></span>
						</button>
						</th>
				<th><button class="btn btn-link"
						@click="onSort('email')">Email 
                        <span v-if="sortingOrders.email == 'asc'" class="glyphicon glyphicon-sort-by-alphabet"></span>
                        <span v-if="sortingOrders.email == 'desc'" class="glyphicon glyphicon-sort-by-alphabet-alt"></span>
						</button>
						</th>
				<th><router-link class="btn btn-link"
						to="/people/new"> <span 
						class="glyphicon glyphicon-plus"></span> Add</router-link></th>
			</tr>
		</thead>
		<tbody>
			<person-row v-for="person in people.data" :key="person.id"
				:row="person" @onDelete="onDelete"> </person-row>

		</tbody>
	</table>

	<div class="pagination">
		<button class="btn btn-default"
			@click="loadPeople({page: people.current_page - 1})"
			:disabled="people.current_page == 1">Previous</button>
		<span>Page {{people.current_page}} of {{people.last_page}}</span>
		<button class="btn btn-default"
			@click="loadPeople({page: people.current_page + 1})"
			:disabled="people.current_page == people.last_page">Next</button>
	</div>
</div>
</template>

<style scoped>
#search-input {
	width: 250px;
}

th {
	text-align: center;
}

.pagination .btn {
	width: 85px;
}

.table {
	border-bottom: solid lightgrey 1px;
}

th .btn {
	padding-top: 0;
	padding-bottom: 0;
}

#add-person-button {
	padding-left: 13px;
}
</style>

<script>
  import {mapState, mapActions} from 'vuex';
  import PersonRow from './Row.vue';

  export default {
      
    name: 'PeopleList',

    components: {
        personRow: PersonRow
    },

    data() {
      return {
          sortingOrders: {
              firstname: 'asc',
              surname: 'asc',
              email: 'asc',
          },
          primarySortingType: 'firstname'
      };
    },
    computed: {
        ...mapState({
          people: state => state.people.people,
          people_search: state => state.people.people_search,
        }),
        params() {
            return {
              page: this.people.current_page,
              sortingOrders: this.sortingOrders,
              primarySortingType: this.primarySortingType,
              people_search: this.people_search,
            }
        },
    },
    mounted() {
        this.loadPeople(this.params);
    },
    methods: {
        ...mapActions([
            'loadPeople',
            'deletePerson'
            ]),
            onDelete(id) {
            this.deletePerson(id).then(() => {
              this.loadPeople(this.params);
            })},
            onSort(sorttype) {
                this.sortingOrders[sorttype] = this.sortingOrders[sorttype] == 'asc' ? 'desc' : 'asc';
                this.primarySortingType = sorttype;
                this.loadPeople(this.params);
             },

  }
  }
</script>
