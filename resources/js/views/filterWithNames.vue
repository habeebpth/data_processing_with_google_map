<template>
<div>
    <div class="row">
        <div class="col-md-12">
            <div class="jumbotron">
               <form
                @submit="filterName"
                action="api/customers_filter"
                method="post">
                <div class="form-group">
                    <label for="name">Letter to Search:</label>
                    <input class="form-control" v-model="name" placeholder="Enter a letter" maxlength = "1">
                    </div>
                    <button type="submit" class="btn btn-primary">Filter</button>
               </form>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
        <p v-if="customers">Filter by : First letter of first name or last name</p>
        <google-map  v-if="customers" :customers="customers" :info_box="true"></google-map>
        </div>
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
          name:''
      }
  },
  mounted () {

  },
  methods:
  {
    filterName: function (e)
    {
        e.preventDefault();
        const formData = new FormData()
        formData.append('name', this.name)
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
