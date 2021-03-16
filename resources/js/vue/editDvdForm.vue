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

    <input class="btn btn-primary" @click.prevent="editDvd()"
    type="submit"
    value="Submit"
    >
    <a class="btn btn-primary" href="/">Go back</a>
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
                id: 0,
                name: "",
                nameMax: 30,
                description: "",
                descMax: 160
            }
        }
    },
    methods:{
        editDvd: function () {
            this.errors = [];
            this.dvd.id = (window.location.href.split('/')[4]);
            if (!this.dvd.name) {
                this.errors.push("Title required.");
            }
            if (!this.dvd.description) {
                this.errors.push('Description required.');
            }
            if (!this.errors.length) {
                axios.put('/api/dvd/'+this.dvd.id,{
                    dvd: this.dvd
                })
                .then(response => {
                    if(response.status == 200) {
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