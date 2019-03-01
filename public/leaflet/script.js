function initMap() {
    // Créer l'objet "macarte" et l'insèrer dans l'élément HTML qui a l'ID "map"
    map = L.map('map').setView([lat, lon], 5);
    // Leaflet ne récupère pas les cartes (tiles) sur un serveur par défaut. Nous devons lui préciser où nous souhaitons les récupérer. Ici, openstreetmap.fr
    L.tileLayer('https://tiles.wmflabs.org/bw-mapnik/{z}/{x}/{y}.png', {
        // Il est toujours bien de laisser le lien vers la source des données
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
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

            axios.post(rt_search_cities, {
                _token : token,
                city: document.getElementById('city').value
            })
                .then(generateCities)
                .catch(function (error) {
                    console.log(error);
                });
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

function generateCities(cities){
    let res = cities.data
    let datalist = document.getElementById('cities');
    datalist.innerHTML="";

    for(let i = 0; i < res['cities'].length ; i++){
        let option = document.createElement("option");
        option.setAttribute("value", res['cities'][i].name);
        option.setAttribute("cityId", res['cities'][i].id);
        option.setAttribute("data-latitude", res['cities'][i].latitude);
        option.setAttribute("data-longitude", res['cities'][i].longitude);
        datalist.appendChild(option);
    }
}

function centerOnCity(latitude, longitude){
    map.setView([latitude, longitude], 13);

    map.on('dragend', function() {
        ext_pos = map.getBounds();
        latMin = ext_pos.getSouthWest().lat
        longMin = ext_pos.getSouthWest().lng;
        latMax = ext_pos.getNorthEast().lat;
        longMax = ext_pos.getNorthEast().lng;

        axios.post(rt_search_stores, {
            _token : token,
            latMin: latMin,
            longMin : longMin,
            latMax : latMax,
            longMax : longMax
        })
            .then(printStores)
            .catch(function (error) {
                console.log(error);
            });

    });
}

function printStores(stores){
    let res = stores.data

    for(let i = 0; i < res['stores'].length ; i++){
       let marker = L.marker([res['stores'][i].latitude, res['stores'][i].longitude]).addTo(map);
        marker.bindPopup("<h4>"+res['stores'][i].name+"</h4>" +
            "<li>" + res['stores'][i].address+"</li>" +
            "<li>" + res['stores'][i].email + "</li>" +
            "<li>" + res['stores'][i].phone + "</li>" +
            "<button id='storeInfo'>En savoir plus</button>").openPopup();
    }

    generateCategories(res);
}


function generateCategories(categories){
    document.getElementById('category').options.length = 0;

    for(let i = 0; i < categories['stores'].length; i++){
        let option = document.createElement('option');
        option.textContent = categories['stores'][i]['category'].name;
        option.setAttribute('value', categories['stores'][i].category_id)

        document.getElementById('category').appendChild(option);
    }

    document.getElementById("category").onchange = () => {
        axios.post(rt_search_stores, {
            _token : token,
            latMin: latMin,
            longMin : longMin,
            latMax : latMax,
            longMax : longMax,
            category : document.getElementById('category').value
        })
            .then(printStores)
            .catch(function (error) {
                console.log(error);
            });

    }
}


function error(){
    console.log('ERROR !');
}