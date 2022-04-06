<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style type="text/css">
    #map {
      width: 800px;
      height: 500px;
    }
  </style>
</head>

<body>

  <button id="create-polygon">Create Polygon</button>
  <div id="student-attended"></div>
  <div id="map"></div>





  <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBYf_ysF6IERRLE3SeQpb0wA-_F9vJD1s8&callback=initMap"></script>
  <script>
    let map;
    // Define the LatLng coordinates for the polygon's path.
    let polygonCoords = [
      // { lat: 22.363723, lng: 91.819684 },
      // { lat: 22.36386034455566, lng: 91.81998930389763 },
      // { lat: 22.36353850321621, lng: 91.82001947875003 },
      // { lat: 22.363493501010225, lng: 91.8198331009736 },
    ];
    // marker array of object to store students
    let markerArray = [
      {
        location: { lat: 22.363544, lng: 91.819885 },
        ImageIcon: "https://img.icons8.com/fluency/48/000000/student-male.png",
        content: `<h3>Student 1</h3>`,
        student_id: 1,
        student_name: "Student 1"
      },
      {
        location: { lat: 22.363639, lng: 91.819970 },
        ImageIcon: "https://img.icons8.com/fluency/48/000000/student-male.png",
        content: `<h3>Student 2</h3>`,
        student_id: 2,
        student_name: "Student 2"
      },
      {
        location: { lat: 22.363810063065678, lng: 91.81981297784178 },
        ImageIcon: "https://img.icons8.com/fluency/48/000000/student-male.png",
        content: `<h3>Student 3</h3>`,
        student_id: 3,
        student_name: "Student 3"
      }
    ];


    function initMap() {
      let options = {
        center: { lat: 22.363692, lng: 91.819875 },
        zoom: 20,
      };
      map = new google.maps.Map(document.getElementById("map"), options);

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
      }

      for (let i = 0; i < markerArray.length; i++) {
        addMarker(markerArray[i]);
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

      //On click event for creating polygon
      document.getElementById("create-polygon").onclick = function () {

        // Construct the polygon.
        let poly = '';
        poly = createPolygon(polygonCoords);
        //each is_instide(Student_location, polygon_co_ord_event_obj)
        // console.log(is_inside(markerArray[2].location, polygonCoords));
        let attd_std = '';
        attd_std = [...markerArray.filter(item => is_inside(item.location, polygonCoords))];
        // poly.setMap(null);
        console.log(attd_std);

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
      function removeLine() {
        const polygon = new google.maps.Polygon({
          paths: [],
          strokeColor: "#FF0000",
          strokeOpacity: 0.8,
          strokeWeight: 2,
          fillColor: "#FF0000",
          fillOpacity: 0.35,
        });
        polygon.setMap(map);
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
</body>

</html>