<style>
    #mapid { height: 400px; },
    ul { list-style-type: none;}

</style>
<template>
    <div>
        <div id="mapid">
        </div>
    </div>
</template>

<script>
    export default {
        props: ['spot', 'canedit', 'showspot'],
        data() {
            return {
                message: '',
                data: null,
                map: null,
                marker: null,
                lat: null,
                lng: null,
                windData: []
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
                if(this.canedit) {
                    this.map.on('click', this.clickedOnMap)
                }

                this.marker = L.marker([this.spot.lat, this.spot.lng], {}).addTo(this.map);
                // go to marker

                if(this.showspot) {
                    this.map.setView([this.spot.lat, this.spot.lng], 18)
                } else {
                    this.map.setView([this.spot.lat, this.spot.lng], 9)
                }
                
            },


            // go to marker


            clickedOnMap(event) {
                this.lat = event.latlng.lat.toFixed(4)
                this.lng = event.latlng.lng.toFixed(4)
                if(this.marker!=null) {
                    this.map.removeLayer(this.marker)
                }
                this.marker = L.marker([this.lat, this.lng]).addTo(this.map);
                this.saveSpot();
            },

            saveSpot() {
              // GET /someUrl
              this.$http.put('/api/spot/' + this.spot.id, {lat: this.lat, lng: this.lng}).then((response) => {
                console.log(response)
              }, (response) => {
                // error callback
              });
            }
        },

        mounted() {
            this.createMap();
            console.log(this.showspot)
        }

    }
</script>