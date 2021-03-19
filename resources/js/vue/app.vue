<template>
    <div>
        <div>
            <h1 id="title">Your DVDs</h1>
            <div class="container">
                <div class="row">
                    <div class="col text-center">
                        <button
                            class="btn-group btn-primary mt-5 p-2"
                            @click="goToAdd()"
                        >
                            Add new DVD
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <list-view :dvds="dvds" v-on:reloadlist="getList()" />
    </div>
</template>

<script>
import listView from "./listView";

export default {
    components: {
        listView
    },
    data: function() {
        return {
            dvds: []
        };
    },
    methods: {
        getList() {
            axios
                .get("api/dvds")
                .then(response => {
                    this.dvds = response.data;
                })
                .catch(error => {
                    console.log(error);
                });
        },
        goToAdd() {
            window.location.href = "create";
        }
    },
    created() {
        this.getList();
    }
};
</script>

<style scoped>
#title {
    text-align: center;
}
</style>
