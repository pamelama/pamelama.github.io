$(document).ready(
$('.btn-menu i').click(function(){
	
	$('.nav-principal').slideToggle();
	
	if($(this).hasClass('fa-bars')){
		$(this).removeClass('fa-bars').addClass('fa-times');
		
	}
	else{
		$(this).removeClass('fa-times').addClass('fa-bars');
	
}
})
	
	);



function initMap() {
        var aracatuba = {lat: -21.206627, lng: -50.4474824};
        var map = new google.maps.Map(document.getElementById('localizacao'), {
          zoom: 16,
          center: aracatuba
        });
        var marker = new google.maps.Marker({
          position: aracatuba,
          map: map
         /* icon: {
		url: "images/markers/svg/Coffee_3.svg",
		scaledSize: new google.maps.Size(64, 64)
	} */
        });
      }

