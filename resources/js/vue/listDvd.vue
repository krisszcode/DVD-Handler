<template>
    <div class="d-flex flex-row comment-row m-t-0">
        <div class="p-2">
            <div v-if="dvd.cover === null">
                <img
                    src="https://upload.wikimedia.org/wikipedia/commons/e/e2/Unknown_toxicity_icon.png"
                    width="100"
                />
            </div>
            <div v-else>
                <img
                    :src="dvd.cover"
                    @error="
                        dvd.cover =
                            'https://upload.wikimedia.org/wikipedia/commons/e/e2/Unknown_toxicity_icon.png'
                    "
                    width="100"
                />
            </div>
        </div>
        <div class="comment-text w-100">
            <h6 class="font-medium text-center">{{ dvd.name }}</h6>
            <h6 class="float-right pb-3">{{ this.cuttedDate }}</h6>
            <div class="m-b-15 d-block p-4 row">
                <div class="col">
                    <strong>Description:</strong>
                    {{ dvd.description }}
                </div>
                <div class="col">
                    <strong>Producer:</strong>
                    {{ dvd.producer }}
                </div>
                <div class="col">
                    <strong>Actors:</strong>
                    {{ dvd.actors }}
                </div>
            </div>
            <div class="comment-footer">
                <button class="btn btn-cyan btn-sm" @click="goToEdit()">
                    Edit
                </button>
                <button class="btn btn-danger btn-sm" @click="removeDvd()">
                    Delete
                </button>
            </div>
        </div>
    </div>
</template>

<script>
import moment from "moment";

export default {
    props: ["dvd"],
    data() {
        return {
            cuttedDate: moment(this.dvd.release).format("LL")
        };
    },
    methods: {
        goToEdit() {
            window.location.href = "edit/" + this.dvd.id;
        },
        removeDvd() {
            axios
                .delete("api/dvd/" + this.dvd.id)
                .then(response => {
                    if (response.status == 200) {
                        this.$emit("dvdchanged");
                    }
                })
                .catch(error => {
                    console.log(error);
                });
        }
    }
};
</script>

<style scoped>
p {
    word-break: break-all;
}

.p-2 {
    padding: 0.5rem !important;
}

.btn-cyan {
    color: #fff;
    background-color: #27a9e3;
    border-color: #27a9e3;
}

.btn-cyan:hover {
    color: #fff;
    background-color: #1a93ca;
    border-color: #198bbe;
}
</style>
