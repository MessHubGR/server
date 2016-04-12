var map;

function initialization (){
	map = new google.maps.Map(document.getElementById('create_map'), {
		center: {lat: 38, lng: 23.5},
		zoom: 9
	});

			var marker = new google.maps.Marker({
				position: {lat: 37.9839, lng: 23.7294},
				icon: {
					path: google.maps.SymbolPath.CIRCLE,
					scale: 7
				},
				draggable: true,
				map: map
			});

			$('#latitude').val(marker.position.lat);
			$('#longitude').val(marker.position.lng);

			marker.addListener('drag', function() {
				$('#latitude').val(marker.position.lat);
				$('#longitude').val(marker.position.lng);
			});
}