<template>
<div>
    <div class="row">
        <p>Listing all Data With infobox (Male : Blue colors , Female : Pink Color)</p>
        <google-map  :customers="customers" :info_box="true"></google-map>
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
      }
  },
  mounted () {
    axios
      .get('api/customers')
      .then(response => {
          this.customers = response.data.customers;
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
