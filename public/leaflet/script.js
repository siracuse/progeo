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
           $get('leaflet/getCities.php', {"city": document.getElementById('city').value}, generateCities, error);
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
        setTimeout(function() {
            $get('leaflet/getCategories.php', {"city": document.getElementById('city').value}, generateCategories, error);
        }, 100)
    };
}

function generateCities(cities){
    let res = JSON.parse(cities.responseText);

    let datalist = document.getElementById('cities');
    datalist.innerHTML="";

    for(let i = 0; i < res.length ; i++){
        let option = document.createElement("option");
        option.setAttribute("value", res[i].name);
        option.setAttribute("cityId", res[i].id);
        option.setAttribute("data-latitude", res[i].latitude);
        option.setAttribute("data-longitude", res[i].longitude);
        datalist.appendChild(option);
    }
}

function centerOnCity(latitude, longitude, category, subcategory){
    map.setView([latitude, longitude], 13);

    map.on('dragend', function() {
        let ext_pos = map.getBounds();
        let latMin = ext_pos.getSouthWest().lat
        let longMin = ext_pos.getSouthWest().lng;
        let latMax = ext_pos.getNorthEast().lat;
        let longMax = ext_pos.getNorthEast().lng;

        $get('leaflet/getStores.php', {latMin:latMin, longMin:longMin, latMax:latMax, longMax:longMax}, printStores, error);
        setTimeout(function() {
            $get('leaflet/getCategories.php', {latMin:latMin, longMin:longMin, latMax:latMax, longMax:longMax}, generateCategories, error);
        }, 100)


    });
}

function printStores(stores){
    let res = JSON.parse(stores.responseText);

    //pour chaque magasin on créé un marker
    for(let i in res){
        var marker = L.marker([res[i]['latitude'], res[i]['longitude']]).addTo(map);
        marker.bindPopup("<h4>"+res[i]['name']+"</h4>" +
            "<li>" + res[i]['address']+"</li>" +
            "<li>" + res[i]['email'] + "</li>" +
            "<li>" + res[i]['phone'] + "</li>" +
            "<button id='storeInfo'>En savoir plus</button>").openPopup();

    }
}

function generateCategories(categories){
    let res = JSON.parse(categories.responseText);
    document.getElementById("category").innerHTML = "";

        for(let i in res){
            let option = document.createElement('option');

            option.textContent = res[i]['name'];
            option.setAttribute('value', res[i]['name']);

            document.getElementById("category").appendChild(option);
        }

    document.getElementById("category").onchange = () => {
        console.log('A FAIRE...');
    }
}

function generateSubCategories(subCategories){
    let res = JSON.parse(subCategories.responseText);

    for(let i in res){
        let option = document.createElement('option');
        option.textContent = res[i]['name'];
        option.setAttribute('value', res[i]['name']);

        document.getElementById("subCategory").appendChild(option);
    }
}

function error(){
    console.log('ERROR !');
}