var key = "Ajg7Q3dXiLyR0crg46ptR9DMVYiK3uK7DszhlMsOS2IQtE9gte_jCYNOSl7_1f_b";
initMapEvent();
function initMapEvent(){
    var loc = new Microsoft.Maps.Location(39.9, 116.4);
    var option = {
        credentials : key,
        mapTypeId : Microsoft.Maps.MapTypeId.road,
    };
    var map = new Microsoft.Maps.Map(document.getElementById("map"),option);
    navigator.geolocation.getCurrentPosition(function (position) {
        var loc = new Microsoft.Maps.Location(
            position.coords.latitude,
            position.coords.longitude);

        //Add a pushpin at the user's location.
        var pin = new Microsoft.Maps.Pushpin(loc);
        map.entities.push(pin);

        //Center the map on the user's location.
        map.setView({ center: loc, zoom: 10 });
    });
    Microsoft.Maps.Events.addHandler(map, 'click', function(e){
        if (e.targetType == "map") {
            var point = new Microsoft.Maps.Point(e.getX(), e.getY());
            var loc = e.target.tryPixelToLocation(point);
            map.entities.pop();
            var pin = new Microsoft.Maps.Pushpin(loc);
            map.entities.push(pin);
            map.setView({center:loc});
            $('#long').value = loc.longitude;
            $('#lat').value = loc.latitude;
            alert(loc.latitude + ":" + loc.longitude );
        }
    });
}