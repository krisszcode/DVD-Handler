<template>
  <div class="container col-5 p-5">
    <form>

    <p v-if="errors.length">
      <b>Please correct the following error(s):</b>
      <ul>
        <li v-for="error in errors">{{ error }}</li>
      </ul>
    </p>

      <div class="form-group row col-7">
        <label>DVD name:</label>
        <input type="text" class="form-control" placeholder="DVD title"
        :maxlength="dvd.nameMax" v-model="dvd.name">
      </div>
      <div class="form-group">
        <label>DVD description:</label>
        <textarea class="form-control" placeholder="DVD description" :maxlength="dvd.descMax"
          v-model="dvd.description" rows="3">
        </textarea>
      </div>
      <input class="btn btn-primary" @click.prevent="addDvd()"
        type="submit"
        value="Submit"
      >
      <a class="btn btn-primary" href="/">Go Back</a>
    </form>
  </div>
</template>

<script>
  export default{

    data:
    function () {
      return{
        errors: [],
        dvd: {
          name: "",
          nameMax: 30,
          description: "",
          descMax: 160
        }
      }
    },
    methods:{
      addDvd: function () {
      this.errors = [];

        if (!this.dvd.name) {
          this.errors.push("Title required.");
        }
        if (!this.dvd.description) {
          this.errors.push('Description required.');
        }
        if (!this.errors.length) {
          axios.post('api/dvd/store',{
            dvd: this.dvd
          })
          .then(response => {
            if(response.status == 201) {
              console.log(response);
              window.location.href="/";
            }
          })
          .catch(error => {
            console.log(error);
          })
      }
    }
  }
}
</script>
