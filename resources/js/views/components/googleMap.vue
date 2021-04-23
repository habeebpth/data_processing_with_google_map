<template>
<div>
    <div class="container" id="map" ref="map">
        <map-marker v-for="item in customers" :key="item.id" :lat="item.lat" :lng="item.lon" :first_name="item.first_name" :last_name="item.last_name" :gender="info_box?item.gender:''"></map-marker>
    </div>
</div>
</template>
<script>
import MapMarker from "./MapMarker"
export default {
    props: {
       customers: null,
       info_box:null,
       center_point:null
	},
    components: {
			MapMarker
  },
  computed: {},
  data() {
      return {
          map: null,
          normal: true,
          custome_map : false
      }
  },
  mounted () {
    this.map_();
  },
  methods:
  {
      getMap(callback) {
				let vm = this
				function checkForMap() {
					if (vm.map) callback(vm.map)
					else setTimeout(checkForMap, 200)
				}
				checkForMap()
			},
      map_()
      {
          var lat = 29.3607754;
          var lng = 47.6335785;
          if(this.center_point)
          {
              lat = this.center_point.split(",")[0];
              lng = this.center_point.split(",")[1];
          }

          this.map = new window.google.maps.Map(this.$refs["map"], {
				center: { lat: parseFloat(lat), lng: parseFloat(lng) },
				zoom: 5
	       });
      },
      update_map()
      {
          this.map_();
      }

  }
};
</script>
<style scoped>
	#map {
		height: 600px;
	}
</style>
