<template>
    <div class="col-md-5 ">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="true">
                        {{activeBuilding.name }}

                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                        <li v-for="building in buildings"><a v-on:click="setActive({{building}})" href="#">{{building.name }}</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Add building</a></li>
                    </ul>
                </div>
            </div>

            <div v-if="buildings" class="panel-body">

                <ul v-for="unit in units" class="list-group">

                    <li class="list-group-item"><i class=" fa fa-btn fa-building"></i><a
                        href="#">unit name</a></li>

                </ul>


                <div class="col-md-offset-4">
                    <a href="/building/{{ buildings[1].id }}unit/create">
                        <button class="btn btn-success">Add a Unit</button>
                    </a>

                </div>

            </div>
        </div>
    </div>
</template>

< script >
export default {

    props: ['folio'],

    data: function () {
        return {
            buildings: [],
            activeBuilding: [],
            url: ""
        }
    },

    created: function () {

        console.log("attempting to pull the buildings");
        this.getBuildings();
        console.log(this.buildings);


    },
    methods: {
        getBuildings: function () {
            this.$http.get('api/portfolio/' + this.folio + '/building', function (b) {
                this.buildings = b;
            }).bind(this);
        },  

        setActive: function(id) {
            this.activeBuilding = id;
        }
    }

}
</script>