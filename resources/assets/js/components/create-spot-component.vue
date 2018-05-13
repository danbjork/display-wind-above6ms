<style>
    #mapid { height: 400px; },
    ul { list-style-type: none;}

</style>
<template>
    <div>
        <div v-if="!created">
            <div id="mapid"></div>

            <div class="form-group">
                <hr>
                <label for="name">Spot name</label>
                <input type="text" class="form-control" v-model="name">
            </div>

            <button class="btn btn-success pull-right" :disabled="name.length == 0" @click="saveSpot()"> Spara</button>
        </div>

        <div v-else>
            <p>Spoten har lagts till</p>

            <a href="/spot" class="btn btn-default"> Gå till listan</a>
        </div>
    </div>
</template>

<script>
    export default {

        data() {
            return {
                name: '',
                map: null,
                marker: null,
                lat: null,
                lng: null,
                created: false,
            }
        },

        methods: {

            createMap() {
                this.map = L.map('mapid', {attributionControl: false, zoomControl:false}).setView([55.766, 13.157], 9)
                L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
                    attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://mapbox.com">Mapbox</a>'
                    , maxZoom: 16
                    , id: 'mapbox.satellite'
                    , accessToken: 'pk.eyJ1IjoiZGFuYmpvcmsiLCJhIjoiY2lzcTNkeWJlMDAxZjJuazY4a3hwNHJ2dSJ9.qQ38rEqSTiR4VOwmM_eDnQ'
                    , minZoom: 7
                }).addTo(this.map)
                // Decide what happens when the map gets clicked
                
                this.map.on('click', this.clickedOnMap)
            },


            // go to marker


            clickedOnMap(event) {
                this.lat = event.latlng.lat.toFixed(4)
                this.lng = event.latlng.lng.toFixed(4)
                if(this.marker!=null) {
                    this.map.removeLayer(this.marker)
                }
                this.marker = L.marker([this.lat, this.lng]).addTo(this.map);
                // this.saveSpot();
            },

            saveSpot() {

                this.$http.post('/api/spot', {
                    title: this.name, 
                    lat: this.lat, 
                    lng: this.lng
                }).then((response) => {
                    console.log(response)
                    this.created = true
                    window.location = '/spot'

                }, (response) => {
                    // error callback

                });

            }
        },

        mounted() {
            this.createMap();
            this.lat = 55.8075;
            this.lng = 13.1561;
        }

    }
</script>