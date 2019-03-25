var components = {
    "packages": [
        {
            "name": "leaflet-awesome-markers",
            "main": "leaflet-awesome-markers-built.js"
        }
    ],
    "baseUrl": "components"
};
if (typeof require !== "undefined" && require.config) {
    require.config(components);
} else {
    var require = components;
}
if (typeof exports !== "undefined" && typeof module !== "undefined") {
    module.exports = components;
}