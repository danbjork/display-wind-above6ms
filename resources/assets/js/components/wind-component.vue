<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            <div class="card">
                <div class="panel-body">
                    <table class="table">
                    <thead>
                        <tr>
                            <th>Time</th>
                            <th>Wind</th>
                            <th>Gust</th>
                            <th>Degree</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="entry in goodWinds" v-if="entry.wind > 5.1">
                            <td>{{parseDate(entry.date)}}</td>
                            <td><b>{{entry.wind}}</b> m/s</td>
                            <td>{{entry.gust}} m/s</td>
                            <td>{{entry.degree}}
                            </td>
                        </tr>
                    </tbody>
                    </table>
                </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        props: ['spot'],
        data() {
            return {
                message: '',
                windData: [],
            }
        },

        computed: {

            /*
            *   Checks the wind-parameter in windData. Returns wind above 5m/s
            */
            goodWinds() {
                return _.filter(this.windData, function(entry) {return entry.wind > 1})
            }
        },

        methods: {

            readData(lng, lat) {
                lat = lat.toFixed(4)
                lng = lng.toFixed(4)

                var that = this;
                $.ajax({
                  url: "http://opendata-download-metfcst.smhi.se/api/category/pmp2g/version/2/geotype/point/lon/" + lng + "/lat/" + lat + "/data.json"
                }).done(function(data) {
                    that.data = data
                    // console.log(data.timeSeries)
                    for (var i = 0; i < data.timeSeries.length; i++) {
                        var wind = {
                            wind: data.timeSeries[i].parameters[4].values[0],
                            gust: data.timeSeries[i].parameters[11].values[0],
                            date: data.timeSeries[i].validTime,
                            degree: data.timeSeries[i].parameters[3].values[0]                         
                        }

                        that.windData.push(wind)
                    }
                });
            },

            parseDate(date) {
                return moment(date).format('ddd HH:mm');
            }

        },

        mounted() {
            console.log(moment())
            this.readData(this.spot.lng, this.spot.lat);
        }

    }
</script>
