<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDYpYr9fw5AqhfSV1zRGXnVEHV3_f2n4SA&callback=initMap"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <script>


      // Paid gmaps AIzaSyAkxcFq3HUIKe0adll-UXWQLeqKMkAtpS4
      // my gmaps AIzaSyDYpYr9fw5AqhfSV1zRGXnVEHV3_f2n4SA
    let map;
    let markers = [];
    // Define the LatLng coordinates for the polygon's path.
    let polygonCoords = [
      // { lat: 22.363723, lng: 91.819684 },
      // { lat: 22.36386034455566, lng: 91.81998930389763 },
      // { lat: 22.36353850321621, lng: 91.82001947875003 },
      // { lat: 22.363493501010225, lng: 91.8198331009736 },
    ];
    // marker array of object to store students
    let markerArray = [
      // {
      //   location: { lat: 22.363544, lng: 91.819885 },
      //   ImageIcon: "https://img.icons8.com/fluency/48/000000/student-male.png",
      //   content: `<h3>Student 1</h3>`,
      //   student_id: 1,
      //   student_name: "Student 1"
      // },
      // {
      //   location: { lat: 22.363639, lng: 91.819970 },
      //   ImageIcon: "https://img.icons8.com/fluency/48/000000/student-male.png",
      //   content: `<h3>Student 2</h3>`,
      //   student_id: 2,
      //   student_name: "Student 2"
      // },
      // {
      //   location: { lat: 22.363810063065678, lng: 91.81981297784178 },
      //   ImageIcon: "https://img.icons8.com/fluency/48/000000/student-male.png",
      //   content: `<h3>Student 3</h3>`,
      //   student_id: 3,
      //   student_name: "Student 3"
      // }
    ];

    // const axios = require('axios').default;



    function getCurrentLocation(){
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(
              (position) => {
                const pos = {
                  lat: position.coords.latitude,
                  lng: position.coords.longitude,
                };


                // console.log("current location: ", pos.lat);

                infoWindow.setPosition(pos);
                infoWindow.setContent("Classroom");
                infoWindow.open(map);
                map.setCenter(pos);
                return pos;
              },
              () => {
                handleLocationError(true, infoWindow, map.getCenter());
              }
            );
          } else {
            // Browser doesn't support Geolocation
            handleLocationError(false, infoWindow, map.getCenter());
          }
      }

      function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(
          browserHasGeolocation
            ? "Error: The Geolocation service failed."
            : "Error: Your browser doesn't support geolocation."
        );
        infoWindow.open(map);
      }

      // console.log(getCurrentLocation());


    function initMap() {

      const currentLocation = getCurrentLocation();
      let options = {
        center: { lat: 22.363692, lng: 91.819875 },//demo location
        zoom: 20,
      };
      map = new google.maps.Map(document.getElementById("map"), options);

      //get current location start
      infoWindow = new google.maps.InfoWindow();
      if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(
              (position) => {
                const pos = {
                  lat: position.coords.latitude,
                  lng: position.coords.longitude,
                };


                // console.log("current location: ", pos.lat);

                infoWindow.setPosition(pos);
                infoWindow.setContent("Classroom Location");
                infoWindow.open(map);
                map.setCenter(pos);

              },
              () => {
                handleLocationError(true, infoWindow, map.getCenter());
              }
            );
          } else {
            // Browser doesn't support Geolocation
            handleLocationError(false, infoWindow, map.getCenter());
          }


      //get current location end


      // setInterval(() => {
      //   fetchStudentGpsData();
      // }, 10000);

      // fetchStudentGpsData();
      // setTimeout(() => {
      //   deleteMarkers();
      // }, 5000);
      function fetchStudentGpsData(){
          let checkbox = document.getElementById("is_rfid");
          let is_checked = 0;
          if(checkbox.checked === true){
              is_checked = true;
          }else{
              is_checked = false;
          }
          // console.log(is_checked);


          // console.log("is_rfid: ", is_checked);
          let fetch_api = ''
          if (is_checked){
              fetch_api = "{{ URL::to('api/v1/fetch-rfid-gps-data') }}";
          }else{
              fetch_api = "{{ URL::to('api/v1/fetch-gps-data') }}";
          }

        axios.get(fetch_api)
        .then(response=>{
          // console.log(response.data.gps_data);
          markerArray.length = 0;
          response.data.gps_data.forEach(item=>markerArray.push(item));
          // markerArray = [...response.data.gps_data];

          deleteMarkers();
          for (let i = 0; i < markerArray.length; i++) {
            addMarker(markerArray[i]);
          }
          // console.log(markerArray);

          //add set boundary button
            displaySetBoundaryButton();
        })
        .catch(err=> {
          console.log(err);
        });
      }

        function displaySetBoundaryButton() {
          document.getElementById("create-polygon").classList.remove("d-none");
        }
        function displayTakeAttendanceButton() {
            document.getElementById("take-attendance").classList.remove("d-none");
        }

//Clear/Remove all markers
      // Deletes all markers in the array by removing references to them.
      function deleteMarkers() {
        hideMarkers();
        markers = [];
        // console.log("Deleted");
      }

      // Sets the map on all markers in the array.
      function setMapOnAll(map) {
        for (let i = 0; i < markers.length; i++) {
          markers[i].setMap(map);
        }
      }

      // Removes the markers from the map, but keeps them in the array.
      function hideMarkers() {
        setMapOnAll(null);
      }


      function addMarker(property) {
        const marker = new google.maps.Marker({
          position: property.location,
          map: map,
          icon: property.ImageIcon
        });

        //Check for custom icon
        if (property.ImageIcon) {
          //set Icon
          marker.setIcon = property.ImageIcon;
        }

        //check for content
        if (property.content) {
          //set Content
          const detailWindow = new google.maps.InfoWindow({
            content: property.content
          });
          marker.addListener("mouseover", () => {
            detailWindow.open(map, marker);
            setTimeout(() => {
              detailWindow.close(map, marker);
            }, 1000);
          });
        }

        markers.push(marker);
      }







      // -----Polyline start
      poly = new google.maps.Polyline({
        strokeColor: "#000000",
        strokeOpacity: 1.0,
        strokeWeight: 3,
      });
      poly.setMap(map);
      // Add a listener for the click event
      map.addListener("click", addLatLng);
      // -----Polyline end


      let polygon_shape = '';
      //On click event for creating polygon
      document.getElementById("create-polygon").onclick = function () {

        // Construct the polygon.

        polygon_shape = createPolygon(polygonCoords);

        displayTakeAttendanceButton();
      };
      let toggleFetch = 0;
      document.getElementById("student-gps-fetch-control").onclick = function(){
        fetchStudentGpsData();
      };


      //take attendance
      document.getElementById("take-attendance").onclick = function(){
 //each is_instide(Student_location, polygon_co_ord_event_obj)
        // console.log(is_inside(markerArray[2].location, polygonCoords));
        let attd_std = '';
        attd_std = [...markerArray.filter(item => is_inside(item.location, polygonCoords))];
        // console.log(attd_std);

        let attd_date =  document.getElementById("attd_date").value;
        axios.post("{{ URL::to("api/v1/store-student-gps-attendance/".$classroom_id) }}", {
            "date" : attd_date,
            "students" : attd_std
        })
          .then(res=>{
              // console.log(res);
              toastr.success(res.data.success, 'Success');
          })
          .catch(err=>{
              console.log(err);
          })

      };







      function createPolygon(polygonCoords) {
        const polygon = new google.maps.Polygon({
          paths: polygonCoords,
          strokeColor: "#FF0000",
          strokeOpacity: 0.8,
          strokeWeight: 2,
          fillColor: "#FF0000",
          fillOpacity: 0.35,
        });

        polygon.setMap(map);
        return polygon;
      }

    }


    // Handles click events on a map, and adds a new point to the Polyline.
    function addLatLng(event) {
      const path = poly.getPath();
      polygonCoords.push(event.latLng);
      // Because path is an MVCArray, we can simply append a new coordinate
      // and it will automatically appear.
      path.push(event.latLng);
      // Add a new marker at the new plotted point on the polyline.
      new google.maps.Marker({
        position: event.latLng,
        title: "#" + path.getLength(),
        map: map,
        icon: "https://img.icons8.com/external-kiranshastry-lineal-kiranshastry/64/000000/external-pin-interface-kiranshastry-lineal-kiranshastry-1.png"
      });
    }


    function is_inside(student_loc, vs) {
      // ray-casting algorithm based on
      // https://wrf.ecse.rpi.edu/Research/Short_Notes/pnpoly.html/pnpoly.html

      var x = student_loc.lat, y = student_loc.lng;
      // var test = vs.reduce((a, v) => ({ ...a, [v]: v}), {});
      // console.log(vs[0].lat());
      var inside = false;
      for (var i = 0, j = vs.length - 1; i < vs.length; j = i++) {
        var xi = vs[i].lat(), yi = vs[i].lng();
        var xj = vs[j].lat(), yj = vs[j].lng();

        var intersect = ((yi > y) != (yj > y))
          && (x < (xj - xi) * (y - yi) / (yj - yi) + xi);
        if (intersect) inside = !inside;
      }
      return inside;
    };




  </script>
