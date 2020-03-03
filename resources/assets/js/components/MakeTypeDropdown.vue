<template>
    <div>
        <div class="form-group">
            <label for="make" class="col-xs-1 col-sm-1 col-md-1 control-label">Marca:</label>
            <div class="col-xs-7 col-sm-3 col-md-3 col-xs-offset-1 col-sm-offset-0 col-md-offset-0 gen-field">
                <select name="make" id="make" class="form-control" v-model="make" @change="getTypes()">
                    <!-- <option value="0">Marca</option> -->
                    <option v-for='data in makes' :value='data.id'>{{data.name}}</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="type" class="col-xs-1 col-sm-1 col-md-1 control-label">Línea</label>
            <div class="col-xs-7 col-sm-3 col-md-3 col-xs-offset-1 col-sm-offset-0 col-md-offset-0 gen-field">
                <select name="type" id="type" class="form-control" v-model="type">
                    <!-- <option value="0">Línea</option> -->
                    <option v-for='data in types' :value='data.id'>{{data.name}}</option>
                </select>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    mounted() {
        console.log('Component mounted.')
    },
    data(){
        return {
            make: 0,
            makes: [],
            type: 0,
            types: []
        }
    },
    methods:{
        getMakes: function(){
            axios.get('/api/getMakes')
            .then(function(response){
                this.makes = response.data;
            }.bind(this));
        },
        getTypes: function(){
            axios.get('/api/getTypes', {
                params: {
                    make_id: this.make
                }
            }).then(function(response){
                this.types = response.data;
            }.bind(this));
        }
    },
    created: function(){
        this.getMakes()
    }
}
</script>