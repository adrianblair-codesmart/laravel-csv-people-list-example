import getters from './getters'

export default {
    uploadCSV({commit, dispatch}, csvFile) {
        return new Promise((resolve, reject) => {
            var formData = new FormData();
            formData.append('csv', csvFile, csvFile.name);
            console.log(formData)
          Vue.http.post('/api/csv/upload', formData)
            .then(
              response => {
                resolve();
              },
              response => {
                reject(response.data);
              });
        })
      },
      setSearchTerm({commit}, searchTerm) {
          commit('SET_SEARCH_TERM', searchTerm);
        },
      loadPeople({commit, dispatch}, params) {
          return new Promise((resolve, reject) => {
            Vue.http.get('api/people', {params})
              .then(
                response => {
                  commit('LOAD_PEOPLE_OK', response.data);
                  resolve();
                },
                response => {
                  reject(response.data);
                });
          })
        },
      
      loadPerson({commit, dispatch}, id) {
          return new Promise((resolve, reject) => {
            Vue.http.get('api/people/' + id)
              .then(
                response => {
                  commit('LOAD_PERSON_OK', response.data);
                  resolve();
                },
                response => {
                  reject(response.data);
                });
          })
        },
        storePerson({commit, dispatch}, form) {

            return new Promise((resolve, reject) => {
              Vue.http.post('api/people', form)
                .then(
                  response => {
                    commit('STORE_ENTRY_OK', response.data.entry);
                    resolve();
                  },
                  response => {
                    reject(response.data);
                  });
            })
          },
        updatePerson({commit, dispatch}, {id, form}) {

            return new Promise((resolve, reject) => {
              Vue.http.post('api/people/' + id, {_method: 'PUT', ...form})
                .then(
                  response => {
                    commit('LOAD_PERSON_OK', response.data);
                    resolve();
                  },
                  response => {
                    reject(response.data);
                  });
            })
          },
          
          deletePerson({commit, dispatch}, id) {
              return new Promise((resolve, reject) => {
                Vue.http.post('api/people/' + id, {_method: 'DELETE'})
                  .then(
                    response => {
                      commit('LOAD_PERSON_OK', id);
                      resolve();
                    },
                    response => {
                      reject(response.data);
                    });
              })
            }
}
