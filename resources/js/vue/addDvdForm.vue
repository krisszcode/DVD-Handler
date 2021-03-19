<template>
    <div class="container col-5 p-5">
        <form>

            <p v-if="errors.length">
                <b>Please correct the following error(s):</b>
                <ul>
                    <li v-for="error in errors">{{ error }}</li>
                </ul>
            </p>

            <div class="form-group row col-10">
                <label>DVD name:</label>
                <input type="text" class="form-control" placeholder="DVD title" :maxlength="dvd.nameMax"
                    v-model="dvd.name">
            </div>
            <div class="form-group">
                <label>DVD description:</label>
                <textarea class="form-control" placeholder="DVD description" :maxlength="dvd.descMax"
                    v-model="dvd.description" rows="2">
        </textarea>
            </div>
            <div class="form-group">
                <label>DVD release date:</label>
                <b-form-datepicker :max="dvd.max" id="example-datepicker" v-model="dvd.release" class="mb-2">
                </b-form-datepicker>
            </div>
            <div class="form-group">
                <label>Producer:</label>
                <input type="text" class="form-control" placeholder="Producer" :maxlength="dvd.producerMax"
                    v-model="dvd.producer">
            </div>
            <div class="form-group">
                <label>Actors:</label>
                <input type="text" class="form-control" placeholder="Actors" :maxlength="dvd.actorsMax"
                    v-model="dvd.actors">
            </div>
            <div class="form-group">
                <label>Cover URL:</label>
                <input type="text" class="form-control" placeholder="Cover URL" v-model="dvd.cover">
            </div>
            <input class="btn btn-primary" @click.prevent="addDvd()" type="submit" value="Submit">
            <a class="btn btn-primary" href="/">Go Back</a>
        </form>
    </div>
</template>

<script>
    import moment from 'moment'

    export default {



        components: {

        },
        data() {
            return {
                errors: [],
                dvd: {
                    name: "",
                    nameMax: 30,
                    description: "",
                    descMax: 80,
                    release: moment().format(),
                    producer: "",
                    producerMax: 25,
                    actors: "",
                    actorsMax: 70,
                    cover: "",
                    max: moment().format()
                }
            }
        },
        methods: {

            addDvd: function () {
                this.errors = [];

                if (!this.dvd.name) {
                    this.errors.push("Title required.");
                }
                if (!this.dvd.description) {
                    this.errors.push('Description required.');
                }
                if (!this.dvd.producer) {
                    this.errors.push("Producer required.");
                }
                if (!this.dvd.actors) {
                    this.errors.push("Actors are required.");
                }
                if (!this.errors.length) {
                    axios.post('api/dvd/store', {
                            dvd: this.dvd
                        })
                        .then(response => {
                            if (response.status == 201) {
                                console.log(response);
                                window.location.href = "/";
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
<style scoped>

</style>
