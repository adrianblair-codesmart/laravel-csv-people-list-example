<template>
<div class="container" id="csv">
	<h3>CSV Upload</h3>
	
	<!--UPLOAD-->
	<form class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 col-sm-12 col-xs-12" method="post"
		enctype="multipart/form-data" @submit.prevent="onSubmit">
		<hr>
		<div class="input-group">
			<input v-model="csvFilename" type="text" class="form-control"
				placeholder="Please choose your CSV file..." readonly> <label
				class="input-group-btn"> <span :disabled="isSaving"
				class="btn btn-primary"> Browse<input :disabled="isSaving"
					style="display: none" type="file" name="csv" accept=".csv"
					@change="onFileChange">
			</span>
			</label>

		</div>

		<hr>
		<div class="input-group input-group-margin-splitter">
			<button :disabled="isSaving" class="btn btn-warning" name="submit"
				type="reset" @click="onReset">Reset</button>
			<button :disabled="isSaving" class="btn btn-success" name="submit"
				type="submit">
				<span v-if='!isSaving'>Submit</span><span v-else><div class='loader'></div>Processing Upload</span>
			</button>
		</div>
	</form>
</div>
</template>

<style scoped>
#csv {
	text-align: center;
}

.input-group {
	margin: auto;
}

.input-group-margin-splitter .btn {
	margin-left: 10px;
}
</style>

<script>
  import {mapState, mapActions} from 'vuex';

  const STATUS_INITIAL = 0, STATUS_SAVING = 1, STATUS_SUCCESS = 2, STATUS_FAILED = 3;
  
  export default {

    data() {
      return {
          csvFile: null,
          csvFilename: null,
          uploadError: null,
          currentStatus: null
      };
     },

    computed: {
        isInitial() {
            return this.currentStatus === STATUS_INITIAL;
          },
          isSaving() {
            return this.currentStatus === STATUS_SAVING;
          },
          isSuccess() {
            return this.currentStatus === STATUS_SUCCESS;
          },
          isFailed() {
            return this.currentStatus === STATUS_FAILED;
          }
    },

    methods: {
        ...mapActions(['uploadCSV']),
        onFileChange(e) {
            let files = e.target.files || e.dataTransfer.files;
            if (!files.length)
                return;
            
            this.csvFile = files[0];
            this.csvFilename = this.csvFile.name;
        },
        onReset() {
            // reset form to initial state
            this.csvFilename = null;
            this.csvFile = null;
            this.currentStatus = STATUS_INITIAL;
            this.uploadError = null;
            document.activeElement.blur()
        },
          onSubmit() {
            this.currentStatus = STATUS_SAVING;
            this.uploadCSV(this.csvFile)
              .then(() => {
                //this.$router.go(- 1);
                this.currentStatus = STATUS_SUCCESS;
              })
              .catch((data) => {
                this.errors = data.validation || {}
                this.currentStatus = STATUS_FAILED;
              });
          },
    },
    
    mounted() {
        this.onReset();
    }
  }
</script>
