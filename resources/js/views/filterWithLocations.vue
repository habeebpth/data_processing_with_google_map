<template>
<div>
    <div class="row">
        <div class="col-md-12">
            <div class="jumbotron">
               <form
                @submit="filterGender"
                action="api/customers_filter"
                method="post">
                <div class="form-group">
                    <label for="location">Select Location:</label>
                    <select class="form-control" id="location" v-model="location" @change="changeLocation($event)">
                        <option value="51.524035962097535,-0.12634824567501404">London</option>
                        <option value="48.864936065122556,2.2934994945577882">Paris</option>
                        <option value="39.10117583870064,-94.60597073048824">Kansas City</option>
                    </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Filter</button>
               </form>
            </div>
        </div>
    </div>
    <div class="row">
        <p v-if="customers">Filter by : Location with radius of 2000km</p>
        <google-map  v-if="customers" :customers="customers" :info_box="false" :center_point="center_point"></google-map>
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
          info_box:false,
          default_map:true,
          location:'51.524035962097535,-0.12634824567501404',
          center_point:'51.524035962097535,-0.12634824567501404'
      }
  },
  mounted () {

  },
  methods:
  {
    filterGender: function (e)
    {
        e.preventDefault();
        const formData = new FormData()
        formData.append('location', this.location)
        axios.post('api/customers_filter',formData)
            .then(response => {
                this.customers = response.data;
            });
    },
    changeLocation:function(event)
    {
        this.center_point = event.target.value;
    }
  }
};
</script>
<style scoped>
	#map {
		height: 600px;
	}
</style>
