<script>
	export default {
		props: {
			lat: { type: Number, required: true },
			lng: { type: Number, required: true },
            gender: { type: String, required: false },
            first_name : { type: String, required: false },
            last_name : { type: String, required: false },
		},
		data: () => ({
			marker: null,
            icon:null
		}),
		mounted() {
            const infowindow = new google.maps.InfoWindow({

                content: '<p>First Name: '+this.first_name+'</p><p>Last Name: '+this.last_name+'</p><br><p>Gender: '+this.gender+'</p><br>',
            });

            var icon = null;
            if(this.gender)
            {
                icon = this.gender == 'Male'?'http://maps.google.com/mapfiles/ms/icons/blue-dot.png':'http://maps.google.com/mapfiles/ms/icons/pink-dot.png';
            }
            else
            {
                icon = '';
            }
			this.$parent.getMap(map => {
				this.marker = new window.google.maps.Marker({
					position: { lat: this.lat, lng: this.lng },
					map: map,
                    icon: icon,
				});
                if(this.gender)
                {
                    this.marker.addListener("click", () => {
                        infowindow.open(map, this.marker);
                    });
                }


			})
		},
		beforeDestroy() {
			this.marker.setMap(null)
			window.google.maps.event.clearInstanceListeners(this.marker)
		},
		render() {
			return null
		}
	}
</script>
