<template>
  <div class="container p-5">
    <div >
      <h1 id="title">Your DVDs</h1>
      <button class="col-2 btn-group btn-secondary" @click="goToAdd()">
      Add new DVD
      </button>
    </div>
    <list-view
      :dvds="dvds"
      v-on:reloadlist="getList()"
    />
  </div>
</template>

<script>
import listView from "./listView"

export default{
  components: {
    listView
  },
  data: function (){
    return {
      dvds: []
    }
  },
  methods: {
    getList(){
      axios.get('api/dvds')
      .then(response => {
        this.dvds = response.data
      })
      .catch(error => {
        console.log(error);
      })
    },
    goToAdd(){
      window.location.href="create"
    }
  },
  created() {
    this.getList();
  }
}
</script>

<style scoped>

#title{
  text-align: center;
}

</style>