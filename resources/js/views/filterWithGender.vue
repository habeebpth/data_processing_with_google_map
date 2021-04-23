<template>
<div>
    <div class="row">
        <div class="col-md-12">
            <div class="jumbotron">
               <form
                @submit="filterGender"
                action="api/customers_filter?filter_type='gender'"
                method="post">
                <div class="form-group">
                    <label for="gender">Select Gender:</label>
                    <select class="form-control" id="gender" v-model="gender">
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Filter</button>
               </form>
            </div>
        </div>
    </div>
    <div class="row">
        <p v-if="customers">Filter by : Gender</p>
        <google-map  v-if="customers" :customers="customers" :info_box="true"></google-map>
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
          gender:'Male'
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
        formData.append('gender', this.gender)
        console.log(formData);
        axios.post('api/customers_filter',formData)
            .then(response => {
                this.customers = response.data;
            });
    }
  }
};
</script>
<style scoped>
	#map {
		height: 600px;
	}
</style>
