import * as types from './mutation_types'

export default {
      [types.LOAD_PEOPLE_OK](state, people) {
        state.people = people;
      },

      [types.LOAD_PERSON_OK](state, person) {
        state.person = person;
      },
      
      [types.SET_SEARCH_TERM](state, search) {
          debugger;
          state.people_search = search;
        },
}
