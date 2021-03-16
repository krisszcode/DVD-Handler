<template>
  <div class ="row">
  <div class="col-4">
    <input class="form-outline" type="text" v-model="search" placeholder="search dvd"/>
  </div>
    <div class="col-md-11 m-5 p-4 border" v-for="dvd in filteredDvds" :key="dvd.id">
      <list-dvd
        :dvd="dvd"
        class="dvd"
        v-on:dvdchanged = "$emit('reloadlist')"
      />
    </div>
  </div>
</template>

<script>
import listDvd from "./listDvd";

export default {
  props: ['dvds'],
  data(){
    return {
      search: ''
    }
  },
  components: {
    listDvd
  },
  computed: {
    filteredDvds(){
      return this.dvds.filter((dvd) => {
        return dvd.name.match(this.search);
      });
    }
  }
}
</script>

