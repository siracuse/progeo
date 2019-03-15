function initMap() {
    map = L.map('map').setView([lat, lon], 5);
    L.tileLayer('https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png', {
        attribution: 'données © <a href="//osm.org/copyright">OpenStreetMap</a>/ODbL - rendu <a href="//openstreetmap.fr">OSM France</a>',
        minZoom: 1,
        maxZoom: 200
    }).addTo(map);

    layerGroup = L.layerGroup();
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

    axios.post(rt_search_categories, {
        _token : token
    })
        .then(generateCategories)
        .catch(function (error) {
            console.log(error);
        });

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

    map.on('moveend', function() {
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

function printStores(stores_){
    let stores = stores_.data
    map.removeLayer(layerGroup);
    for(let i = 0; i < stores['stores'].length ; i++){

        marker = L.marker([stores['stores'][i].latitude, stores['stores'][i].longitude],
            {
                markerColor: 'red'
            }).addTo(map);

        layerGroup.addLayer(marker);
        let value_promo = stores['stores'][i].promotion_id + '-' + stores['stores'][i].store_id;

        if(stores['stores'][i].promotion_id) {
            marker.bindPopup('<a href=store/' + stores['stores'][i].sto_id + '>'+ stores['stores'][i].store_name + '</a>' +
                "<p>" + stores['stores'][i].promotion_name + "</p>" +
                "<button id='promo' onclick='promo()' value=" + value_promo + ">Obtenir code promo</button>")
                .openPopup();
        }else{
            marker.bindPopup('<a href=store/' + stores['stores'][i].sto_id + '>'+ stores['stores'][i].store_name + '</a>' +
                "<p> Aucune promotion en ce moment...</p>")
                .openPopup();
        }

        console.log(document.getElementById('promo'));
    }

    layerGroup = layerGroup.addTo(map);
}

function generateCategories(categories){
    res = categories.data;

    for(let i = 0; i < res['categories'].length ; i++) {
        let option = document.createElement('option');
        option.textContent = res['categories'][i].name;
        option.setAttribute('value', res['categories'][i].id);

        document.getElementById('category').appendChild(option);

        document.getElementById('category').onchange = () =>
        {
            layerGroup.clearLayers();
            /* axios.post(rt_search_subcategories, {
                 _token : token,
                 category : document.getElementById('category').value
             })
                 .then(generateSubCategories)
                 .catch(function (error) {
                     console.log(error);
                 });
         };*/

            axios.post(rt_search_stores, {
                _token: token,
                latMin: latMin,
                longMin: longMin,
                latMax: latMax,
                longMax: longMax,
                category: document.getElementById('category').value
            })
                .then(printStores)
                .catch(function (error) {
                    console.log(error);
                });

        }
    }
}


function generateSubCategories(subcategories){
    res = subcategories.data;

    document.getElementById('subcategory').options.length = 0;
    document.getElementById('subcategory').style.display = 'block';

    for(let i = 0; i < res['subcategories'].length ; i++) {
        let option = document.createElement('option');
        option.textContent = res['subcategories'][i].name;
        option.setAttribute('value', res['subcategories'][i].id);

        document.getElementById('subcategory').appendChild(option);
    }


}

function promo(){
    if(view == 'home')
    {
        let info_text = document.createElement('i');
        info_text.setAttribute('id', 'info');
        info_text.textContent = 'Veuillez d\'abord vous connecter!';
        info_text.style.color = 'red';
        document.getElementById('info_promo').appendChild(info_text);

        setTimeout("document.getElementById('info_promo').removeChild(info)", 5000);
    }else{
        console.log(document.getElementById('promo').value);
        let values = document.getElementById('promo').value.split('-');
        let promo_id = values[0]; let store_id = values[1];

        axios.post(rt_getPromotionCode, {
            _token: token,
            promo_id: promo_id,
            store_id: store_id,
        })
            .then(promo_res)
            .catch(function (error) {
                console.log(error);
            });
    }


}

function promo_res(json){
    let info = json.data

    console.log(info.info);
    console.log(document.getElementById('info_promo'));

    let info_text = document.createElement('i');
    info_text.setAttribute('id', 'info');

    if(info.info == 'fail'){
        info_text.textContent = 'Promotion déjà ajoutée';
        info_text.style.color = 'red';
    }else{
        info_text.textContent = 'Promotion ajoutée avec succès';
        info_text.style.color = 'green';
    }

    document.getElementById('info_promo').appendChild(info_text);
    setTimeout("document.getElementById('info_promo').removeChild(info)", 5000);
}

function error(){
    console.log('ERROR !');
}