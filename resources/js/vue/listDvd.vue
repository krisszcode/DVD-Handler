<template>
  <div>
    <div class="d-flex justify-content-between row">
      <h4 class="mb-1 col">{{dvd.name}}</h4>
      <p class="col">{{dvd.description}}</p>
    </div>
      <button class="btn btn-primary"  @click="goToEdit()">Edit</button>
      <button class="btn btn-primary" @click="removeDvd()">Delete</button>
  </div>
</template>

<script>
  export default{
    props: ['dvd'],
    methods: {
      goToEdit(){
        window.location.href="edit/" + this.dvd.id;
      },
      removeDvd(){
        axios.delete('api/dvd/' + this.dvd.id)
        .then(response => {
          if(response.status == 200){
            this.$emit('dvdchanged');
          }
        })
        .catch(error => {
          console.log(error);
        })
      }
    }
  }

</script>

<style scoped>
p{
  word-break: break-all;
}
</style>