
<!DOCTYPE html>
<html>
  <head>
    <title>Google Maps JavaScript API v3 Example: Places Autocomplete</title>
    <script src="https://maps.googleapis.com/maps/api/js?v=3&sensor=false&libraries=places,panoramio,weather"
      type="text/javascript"></script>
	  
	    <script src="./infobubble.js" type="text/javascript"></script>

    <style type="text/css">
      body {
        font-family: sans-serif;
        font-size: 14px;
      }
      #map_canvas {
        height: 400px;
        width: 600px;
        margin-top: 0.6em; 
      }
	  
	  .phoneytext {
        color: #010101;
//        font-family: Helvetica Neue, Helvetica, arial;
//        line-height: 25px;
        padding: 10px 15px 10px 15px;
//		width: 230px;
		font-size: 14px;
      }
	  
	  .phoney {
		
//        background: -webkit-gradient(linear,left top,left bottom,color-stop(0.51, rgb(57,57,57)),color-stop(0.51, rgb(57,57,57)),color-stop(0.52, rgb(57,57,57)));
//        background: -moz-linear-gradient(center top,rgb(57,57,57) 0%,rgb(57,57,57) 51%,rgb(57,57,57) 52%);

      background: -webkit-gradient(linear,left top,left bottom,color-stop(0.51, rgb(231,233,232)),color-stop(0.51, rgb(231,233,232)),color-stop(0.52, rgb(231,233,232)));
      background: -moz-linear-gradient(center top,rgb(231,233,232) 0%,rgb(231,233,232) 51%,rgb(231,233,232) 52%);

          
      }
    </style>

    <script type="text/javascript">
	var markerArray = new Array();
	var popupArray = new Array();

	var map;
	var panoramioLayer = new google.maps.panoramio.PanoramioLayer();
	var bikeLayer = new google.maps.BicyclingLayer();
	var weatherLayer = new google.maps.weather.WeatherLayer({

	  temperatureUnits: google.maps.weather.TemperatureUnit.FAHRENHEIT,
	  clickable: true

	});
	
    var bounds = new google.maps.LatLngBounds();
	var currentPopup;
	var icon = new google.maps.MarkerImage("./zip1.png",
                       new google.maps.Size(32, 32), new google.maps.Point(0, 0),
                       new google.maps.Point(16, 32));
    var center = null;

	function initialize() {

		var addr = '<?php echo $_GET["addr"];?>';
		var length = addr.length;
		
		if(length==0){
		
			addr = '-27.472778,153.027778';
		}
		var split = addr.split(',')
		
        var mapOptions = {
			center: new google.maps.LatLng(split[0], split[1]),
			zoom: 13,
			mapTypeId: google.maps.MapTypeId.HYBRID,
			 panControl: true,
		  zoomControl: true,
		  mapTypeControl: true,
		  scaleControl: true,
		  streetViewControl: true,
		  overviewMapControl: true,
            mapTypeControlOptions: {style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR},
                    navigationControl: true,
                    navigationControlOptions: {
                     style: google.maps.NavigationControlStyle.SMALL
            }

        };
        map = new google.maps.Map(document.getElementById('map_canvas'),
          mapOptions);

        var input = document.getElementById('searchTextField');
        var infowindow = new google.maps.InfoWindow();
        var marker = new google.maps.Marker({
          map: map
        });
		
		

        // Sets a listener on a radio button to change the filter type on Places
        // Autocomplete.
        function setupClickListener(id, types) {
          var radioButton = document.getElementById(id);
          google.maps.event.addDomListener(radioButton, 'click', function() {
            autocomplete.setTypes(types);
          });
        }
		
		google.maps.event.addListener(panoramioLayer, 'click', function(photo) {
        });

		
		panoramioLayer.setMap(null);	
		
		//weatherLayer.setMap(map);
		
		//bikeLayer.setMap(map);
		
		
		fetchMapPins();
		//addMarker(-27.472778,153.027778,'<b>100 Club</b><br/>Oxford Street, London  W1&lt;br/&gt;3 Nov 2010 : Buster Shuffle&lt;br/&gt;');
		center = bounds.getCenter();
	//	map.fitBounds(bounds);


    }
	  
	  
	function fetchMapPins(){
	
		var counter = 0;
	
		<?php
			$con = mysql_connect("localhost","root","root");
			mysql_select_db("zip1133605010042", $con);
			$query = "SELECT A.ID, A.TITLE, A.DESCRIPTION, A.PRICE, A.CURRENCY, A.CAT_ID,B.NAME, A.ICON, A.WEBSITE, A.EMAIL, A.PHONE, A.LAT, A.LONGITUDE, A.FB_ID, DATE_FORMAT(A.onDate, '%d-%b-%Y') as onDate, SUBSTRING_INDEX(A.FB_NAME,' ',1) as FB_NAME, B.PATH FROM ZIP_AD_MASTER AS A, ZIP_CATEGORY_MASTER  AS B WHERE A.IS_REPORTED_ABUSED = 0 AND A.IS_REVOKED = 0 AND A.CAT_ID=B.ID";
			$result = mysql_query($query);
            $num_rows = mysql_num_rows($result);?>
        
        var count = <?php echo $num_rows;?>;
        
	<?php
        
			while ($row = mysql_fetch_array($result, MYSQL_BOTH)) {    ?>                
				<?php
                
					if($row['LAT']==""){
						continue;
					}
					
					if($row['CAT_ID']==""){
						continue;
					}
				?>
				
                
                
                var date = '<?php echo $row['onDate'];?>';
				var catID = <?php echo $row['CAT_ID'];?>;
				var iconImage = '<?php echo $row['ICON'];?>';
				
                
				if(iconImage == "http://ziparama.com/zipimage/"){
					iconImage = "http://ziparama.com/images/icon.png";
				}
				
				var lat = <?php echo $row['LAT'];?>;
				var longitude = <?php echo $row['LONGITUDE'];?>;
				var pinURL = "<?php echo $row['WEBSITE'];?>";
				var owner = "<?php echo $row['FB_NAME'];?>";
   				var path = "<?php echo $row['PATH'];?>";
				var title = "";
                
                if(owner == ''){
                    owner = "Ziparama";
                }
                
                var pinID = "<?php echo $row['ID'];?>";
				
				if(pinURL==""){				
                    title = "<table width='100%'>"+
                    "<tr><td>Title</td><td>&nbsp:&nbsp</td><td>"+"<?php echo $row['TITLE'];?>"+"</td></tr> "+
                    "<tr><td valign='top'>Description</td><td valign='top'>&nbsp:&nbsp</td><td align='justify'>"+"<?php echo $row['DESCRIPTION'];?>"+"</td></tr> "+
                    "<tr><td>Category</td><td>&nbsp:&nbsp</td><td>"+"<?php echo $row['NAME'];?>"+"</td></tr> "+
                    "</table>"+
                    "<table>"+
                    "<tr><td>"+'<IMG width="200px" height="150px" BORDER="0" ALIGN="left" //SRC="'+iconImage+'">'+"</td></tr> "+
                    "<tr><td>"+"Pinned by "+owner+"</td></tr> "+
                    "</table>";

					
				}else{
        

			
                    
                    title = "<table width='100%'>"+
                    "<tr><td>Title</td><td>&nbsp:&nbsp</td><td>"+"<?php echo $row['TITLE'];?>"+"</td></tr> "+
                    "<tr><td valign='top'>Description</td><td valign='top'>&nbsp:&nbsp</td><td align='justify'>"+"<?php echo $row['DESCRIPTION'];?>"+"</td></tr> "+
                    "<tr><td>Category</td><td>&nbsp:&nbsp</td><td>"+"<?php echo $row['NAME'];?>"+"</td></tr> "+
                    "<tr><td>&nbsp</td><td>&nbsp&nbsp</td><td>"+"<a style='color: #003DF5' href='"+pinURL+"'>Visit Website </a>"+"</td></tr> "+
                    "</table>"+
                    "<table>"+
                    "<tr><td>"+'<IMG width="200px" height="150px" BORDER="0" ALIGN="left" //SRC="'+iconImage+'">'+"</td></tr> "+
                    "<tr><td>"+"Pinned by "+owner+"</td></tr> "+
                    "</table>";
                    
				}
				
				customMarker(lat, longitude, title, path);
			
		
			<?php		
			}
			mysql_close($con);
		?>
			
	}
	
	function customMarker(lat, longitude, title, path){
        
        // Fetching ICON image strat
        
        var iconPIN = new google.maps.MarkerImage(path, new google.maps.Size(32, 32), new google.maps.Point(0, 0), new google.maps.Point(16, 32));
        
        // Fetching ICON image ends
        
	
		var pt = new google.maps.LatLng(lat, longitude);		
		bounds.extend(pt);
		
		var marker = new google.maps.Marker({
			position: pt,
			icon: iconPIN,
			map: map,
			animation: google.maps.Animation.DROP
		});
		
		
		
		var popup = new InfoBubble({
			content: '<div class="phoneytext">'+title+'</div>',
			minWidth:"175",
			maxWidth:"400",
			minHeight:"300px",
			maxHeight:"300px",
			shadowStyle: 1,
			padding: 0,
//			backgroundColor: 'rgb(57,57,57)',
			backgroundColor: 'rgb(231,233,232)',
			borderRadius: 4,
			arrowSize: 10,
			borderWidth: 1,
			borderColor: '#2c2c2c',
			disableAutoPan: true,
			arrowPosition: 30,
			backgroundClassName: 'phoney',
			arrowStyle: 0
			
		});
	

		
		google.maps.event.addListener(marker, "click", function() {
			if (currentPopup != null) {
				currentPopup.close();
				currentPopup = null;
			}
			
			popup.open(map, marker);
			currentPopup = popup;
			
			
			
			
		});
		google.maps.event.addListener(popup, "closeclick", function() {
			
			currentPopup = null;
		});
	
	}
	
	
	function hidePins(){
		for (var i = 0; i < markerArray.length; i++){ 
			markerArray[i].setVisible(false);
		}
	}
	
	function showPins(){
		for (var i = 0; i < markerArray.length; i++){ 
			markerArray[i].setVisible(true);
		}
	}
	

	function showHidePanoramio(){
		var showPanoramio=document.getElementById("showPanoramio");

		if(showPanoramio.checked == true){
			panoramioLayer.setMap(map);
		}else{
			panoramioLayer.setMap(null);
		}
	}
	
	function showHideBike(){
		var showBike=document.getElementById("showBike");

		if(showBike.checked == true){
			bikeLayer.setMap(map);
		}else{
			bikeLayer.setMap(null);
		}
	}
	
	function showHideWeather(){
		var showWeather=document.getElementById("showWeather");

		if(showWeather.checked == true){
		//	weatherLayer.setMap(map);
		showPins();
		}else{
		hidePins();
		//	weatherLayer.setMap(null);
		}
	}
      google.maps.event.addDomListener(window, 'load', initialize);
    </script>
  </head>
  <body onload="initialize()">
    <!--div>
      <input id="searchTextField" type="text" size="50">
      <input type="radio" name="type" id="changetype-all" checked="checked">
      <label for="changetype-all">All</label>

      <input type="radio" name="type" id="changetype-establishment">
      <label for="changetype-establishment">Establishments</label>

      <input type="radio" name="type" id="changetype-geocode">
      <label for="changetype-geocode">Geocodes</lable>
	  
		
    </div-->
	
	<div>
		<input type="checkbox" onclick="showHidePanoramio();" id="showPanoramio"  > Panoramia photos &nbsp &nbsp
		 <input type="checkbox" onclick="showHideWeather();" id="showWeather" checked > Ziparama Pins &nbsp &nbsp
		 <input type="checkbox" onclick="showHideBike();" id="showBike"  > Bicycle tracks &nbsp &nbsp
	</div>
	
    <div id="map_canvas" style="width:100%;height:850px;"></div>
  </body>
</html>
