<template>
<div>
    <div class="row">
        <div class="col-md-12">
            <div class="jumbotron">
                    <span class="btn btn-success"> Number of Males : <b>{{male_count}}</b> </span> <br>
                    <span class="btn btn-warning"> Number of Females : <b>{{female_count}}</b></span> <br>
            </div>
        </div>
    </div>
    <div class="row">
        <p>Listing all Data on Google map</p>
        <google-map  :customers="customers" :info_box="info_box"></google-map>
    </div>
</div>
</template>
<script>
import googleMap from "./components/googleMap"
export default {
    components: {
			googleMap,
  },
  computed: {},
  data() {
      return {
          customers : null,
          female_count : 0,
          male_count : 0,
          info_box:false,
          default_map:true
      }
  },
  mounted () {
    axios
      .get('api/customers')
      .then(response => {
          this.customers = response.data.customers;
          this.female_count = response.data.no_females;
          this.male_count = response.data.no_males;
      });
  },
  methods:
  {

  }
};
</script>
<style scoped>
	#map {
		height: 600px;
	}
</style>
