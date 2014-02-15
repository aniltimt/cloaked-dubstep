
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
	  
        text-shadow: 0 -1px 0 #000;
        color: #fff;
        font-family: Helvetica Neue, Helvetica, arial;
        line-height: 25px;
        padding: 4px 45px 4px 5px;
		width: 230px;		
		font-size: 14px;
      }
	  
	  .phoney {
		
        background: -webkit-gradient(linear,left top,left bottom,color-stop(0, rgb(57,57,57)),color-stop(0.51, rgb(57,57,57)),color-stop(0.52, rgb(57,57,57)));
        background: -moz-linear-gradient(center top,rgb(57,57,57) 0%,rgb(57,57,57) 51%,rgb(57,57,57) 52%);
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
			$query = "SELECT ID, TITLE, DESCRIPTION, PRICE, CURRENCY, CAT_ID, ICON, WEBSITE, EMAIL, PHONE, LAT, LONGITUDE, FB_ID, DATE_FORMAT(onDate, '%d-%b-%Y') as onDate, SUBSTRING_INDEX(FB_NAME,' ',1) as FB_NAME FROM ZIP_AD_MASTER WHERE IS_REPORTED_ABUSED = 0 AND IS_REVOKED = 0";
			$result = mysql_query($query);
	
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
								
				var iconImage = '<?php echo $row['ICON'];?>';
				
				if(iconImage == "http://ziparama.com/zipimage/"){ 
				
					iconImage = "http://ziparama.com/images/icon.png";
				
				}
				
				
				/*var lat = <?php echo $row['LAT'];?>;
				var longitude = <?php echo $row['LONGITUDE'];?>;
				
				var title = "<?php echo $row['DESCRIPTION'];?>";*/
				
				var lat = <?php echo $row['LAT'];?>;
				var longitude = <?php echo $row['LONGITUDE'];?>;
   				var catID = <?php echo $row['CAT_ID'];?>;
				var pinURL = "<?php echo $row['WEBSITE'];?>";
				var owner = "<?php echo $row['FB_NAME'];?>";
				var title = "";
				//var title = '<IMG BORDER="0" ALIGN="Left" SRC="'+iconImage+'">'+"<?php echo $row['TITLE'];?>"+"</br>"+category+"</br>"+date;
				
				if(pinURL==""){				
					title = "<?php echo $row['TITLE'];?>"+"</br>"+"<?php echo $row['DESCRIPTION'];?>"+"</br> Pinned by "+owner+"</br>"+'<IMG BORDER="0" ALIGN="Left" SRC="'+iconImage+'">';
					
				}else{
					//title = "<?php echo $row['TITLE'];?>"+"</br>"+"<?php echo $row['DESCRIPTION'];?>"+"</br><a href='"+pinURL+"'>Visit WebSite </a> Pinned by "+owner+"</br>"+'<IMG //BORDER="0" ALIGN="Left" //SRC="'+iconImage+'">';
			
				title = "<?php echo $row['TITLE'];?>"+"</br>"+"<?php echo $row['DESCRIPTION'];?>"+"</br><a style=\"color: #FFFFFF\" href='http://"+pinURL+"'>Visit Website </a></br>"+'<IMG BORDER="0" VSPACE="8px" ALIGN="Left" //SRC="'+iconImage+'">'+" </br>&nbsp;&nbsp;Pinned by "+owner+"</br>";
			
				}
				
				customMarker(lat, longitude, title, catID);
			
		
			<?php		
			}
			mysql_close($con);
		?>
			
	}

	function customMarker(lat, longitude, title, catID){
        
        // Start getting icons
        
        $con = mysql_connect("localhost","root","root");
        mysql_select_db("zip1133605010042", $con);
        $query = "SELECT PATH FROM ZIP_CATEGORY_MASTER WHERE ID = ".catID;
        $result = mysql_query($query);
        
        var iconPath = '';
        
        while ($row = mysql_fetch_array($result, MYSQL_BOTH)) {    ?>
            
            
            iconPath = '<?php echo $row['PATH'];?>';
           
        <?php
        }
        ?>
        // End getting icons
        
        var catIcon = new google.maps.MarkerImage(iconPath,
                                      new google.maps.Size(32, 32), new google.maps.Point(0, 0),
                                      new google.maps.Point(16, 32));
        
	
		var pt = new google.maps.LatLng(lat, longitude);		
		bounds.extend(pt);
		
		var marker = new google.maps.Marker({
			position: pt,
			icon: catIcon,
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
			backgroundColor: 'rgb(57,57,57)',
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
