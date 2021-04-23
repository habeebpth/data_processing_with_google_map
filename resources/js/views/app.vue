<template>
    <div>
        <div class="row">
        <div class="col-md-12">
        <p>
            <router-link :to="{ name: 'home' }">Home</router-link> |
            <router-link :to="{ name: 'google-map-with-infobox' }">Google map with Infobox</router-link> |
            <router-link :to="{ name: 'filter-with-gender' }">Filter with gender</router-link> |
            <router-link :to="{ name: 'filter-with-names' }">Filter with First name and Last name</router-link> |
            <router-link :to="{ name: 'filter-with-locations' }">Filter with Locations</router-link>
        </p>
        <div class="container">
            <router-view></router-view>
        </div>
        </div>
        </div>
    </div>
</template>
<script>
    export default {

    }
</script>
