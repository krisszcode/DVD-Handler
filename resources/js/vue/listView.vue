<template>
    <div class="row d-flex justify-content-center mt-100 mb-100">
        <div class="col-lg-6">
            <div class="card">
                <input
                    class="form-outline p-2 mb-4"
                    type="text"
                    v-model="search"
                    placeholder="search dvd"
                />
                <div class="comment-widgets">
                    <div v-for="dvd in filteredDvds" :key="dvd.id">
                        <list-dvd
                            :dvd="dvd"
                            class="dvd"
                            v-on:dvdchanged="$emit('reloadlist')"
                        />
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import listDvd from "./listDvd";

export default {
    props: ["dvds"],
    data() {
        return {
            search: ""
        };
    },
    components: {
        listDvd
    },
    computed: {
        filteredDvds() {
            return this.dvds.filter(dvd => {
                return dvd.name.match(this.search);
            });
        }
    }
};
</script>

<style scoped>
.comment-widgets {
    position: relative;
    margin-bottom: 10px;
}

.card {
    position: relative;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -ms-flex-direction: column;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0px solid transparent;
    border-radius: 0px;
}

.comment-widgets .comment-row {
    border-bottom: 1px solid transparent;
    padding: 14px;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    margin: 10px 0;
}

.comment-widgets .comment-row:hover {
    background: rgba(0, 0, 0, 0.05);
}

.mt-100 {
    margin-top: 100px;
}

.mb-100 {
    margin-bottom: 100px;
}
</style>
