function initMap() {
    // Créer l'objet "macarte" et l'insèrer dans l'élément HTML qui a l'ID "map"
    map = L.map('map').setView([lat, lon], 5);
    // Leaflet ne récupère pas les cartes (tiles) sur un serveur par défaut. Nous devons lui préciser où nous souhaitons les récupérer. Ici, openstreetmap.fr
    L.tileLayer('https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png', {
        // Il est toujours bien de laisser le lien vers la source des données
        attribution: 'données © <a href="//osm.org/copyright">OpenStreetMap</a>/ODbL - rendu <a href="//openstreetmap.fr">OSM France</a>',
        minZoom: 1,
        maxZoom: 200
    }).addTo(map);
}

function createList(){
    let body = document.getElementsByTagName("body")[0];
    let input = document.getElementById("city");
    let datalist = document.getElementById("cities");

    input.onkeyup = () => {
        if(input.value.length >= 3){
            console.log(input.value);
            $get('./data/getCities.php', {"city": document.getElementById('city').value}, generateCities, error);
        }

    };
    input.onchange = () => {
        let latitude, longitude;
        for (let i=0 ; i < cities.options.length ; i++) {
            if (cities.options[i].value === input.value) {
                latitude = cities.options[i].getAttribute("data-latitude");
                longitude = cities.options[i].getAttribute("data-longitude");
                break;
            }
        }
        centerOnCity(latitude, longitude);
    };
}

function generateCities(){
    let res = JSON.parse(xhttp.responseText);
    console.log(res);

    let datalist = document.getElementById('cities');
    datalist.innerHTML="";

    for(let i = 0; i < res.length ; i++){
        let option = document.createElement("option");
        option.setAttribute("value", res[i].name);
        option.setAttribute("data-latitude", res[i].latitude);
        option.setAttribute("data-longitude", res[i].longitude);
        datalist.appendChild(option);
    }
}

function centerOnCity(latitude, longitude){
    map.setView([latitude, longitude], 13);

    map.on('dragend', function() {
        let ext_pos = map.getBounds();
        let latMin = ext_pos.getSouthWest().lat
        let longMin = ext_pos.getSouthWest().lng;
        let latMax = ext_pos.getNorthEast().lat;
        let longMax = ext_pos.getNorthEast().lng;
        console.log("Nord-Est :  lat->" + latMax);
        console.log("Nord-Est : long->" + longMax);
        console.log("Sud-Ouest : lat->" + latMin);
        console.log("Sud-Ouest : long->" + longMin);

        $get('./data/getStores.php', {latMin:latMin, longMin:longMin, latMax:latMax, longMax:longMax}, printStores, error);
    });
}

function printStores(){
    console.log('coucou');
    let json = JSON.parse(xhttp.responseText);
    console.log(json);

    //pour chaque magasin on créé un marker
    for(let i in json){
        var marker = L.marker([json[i]['latitude'], json[i]['longitude']]).addTo(map);
        marker.bindPopup("<h4>"+json[i]['name']+"</h4>" +
            "<li>" + json[i]['address']+"</li>" +
            "<li>" + json[i]['email'] + "</li>" +
            "<li>" + json[i]['phone'] + "</li>" +
            "<button id='storeInfo'>En savoir plus</button>").openPopup();

        /* document.getElementById('infoMag').onclick = () => {
             let modal = document.createElement('div');
             modal.setAttribute("class", "modal");

             let modal_content = document.createElement('div');
             modal.setAttribute("class", "modal-content");
             modal.textContent = "TEST...";

             modal_content.appendChild(close);
             modal.appendChild(modal_content);
             document.getElementsByTagName("body")[0].appendChild(modal);
         }*/


    }
}

function error(){
    console.log('ERROR !');
}