require("./bootstrap");

// import
import { OpenStreetMapProvider } from "leaflet-geosearch";
import _, { mapValues } from "lodash";

// setup
const provider = new OpenStreetMapProvider();

document.addEventListener("DOMContentLoaded", () => {
    if (document.querySelector("#map")) {
        const lat =
            document.querySelector("#lat").value === ""
                ? 9.9349123
                : document.querySelector("#lat").value;
        const lng =
            document.querySelector("#lng").value === ""
                ? -84.0902647
                : document.querySelector("#lng").value;

        const map = L.map("map").setView([lat, lng], 16);

        //eliminar pines previos
        let markers = new L.FeatureGroup().addTo(map);

        L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
            attribution:
                '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        let marker;

        // agregar el pin
        marker = new L.marker([lat, lng], {
            draggable: true,
            autoPan: true
        }).addTo(map);
        //agregar el pin a las capas
        markers.addLayer(marker);

        //Geocode Service
        const geocodeService = L.esri.Geocoding.geocodeService();

        //buscador de direcciones
        const buscador = document.querySelector("#buscarUbicacion");
        buscador.addEventListener("blur", buscarDireccion);

        //detectar el movimiento del maker
        reubicarPin(marker);

        function buscarDireccion(e) {
            if (e.target.value.length > 3) {
                provider
                    .search({
                        query: e.target.value
                    })
                    .then(resultado => {
                        if (resultado) {
                            //limpiar pines previos
                            markers.clearLayers();
                            //reverse geocoding, cuando el usuario reubica el pin
                            geocodeService
                                .reverse()
                                .latlng(resultado[0].bounds[0], 16)
                                .run(function(error, resultado) {
                                    //llenar los inputs
                                    llenarInputs(resultado);
                                    //centrar mapa
                                    map.setView(resultado.latlng);
                                    //agregar el pin
                                    marker = new L.marker(resultado.latlng, {
                                        draggable: true,
                                        autoPan: true
                                    }).addTo(map);
                                    //asignar el contenedor de markers el nuevo pin
                                    markers.addLayer(marker);
                                    //mover el pin
                                    reubicarPin(marker);
                                });
                        }
                    })
                    .catch(error => {
                        console.log(error);
                    });
            }
        }

        function llenarInputs(resultado) {
            document.querySelector("#direccion").value =
                resultado.address.Address || "";
            document.querySelector("#distrito").value =
                resultado.address.City || "";
            document.querySelector("#lat").value = resultado.latlng.lat || "";
            document.querySelector("#lng").value = resultado.latlng.lng || "";
        }

        function reubicarPin(marker) {
            marker.on("moveend", function(e) {
                marker = e.target;
                const posicion = marker.getLatLng();
                //centrar automaticamente
                map.panTo(new L.LatLng(posicion.lat, posicion.lng));

                //reverse geocoding, cuando el usuario reubica el pin
                geocodeService
                    .reverse()
                    .latlng(posicion, 16)
                    .run(function(error, resultado) {
                        // console.log(resultado);
                        marker.bindPopup(resultado.address.LongLabel);
                        marker.openPopup();

                        //lenar campos
                        llenarInputs(resultado);
                    });
            });
        }
    }
    if (document.querySelector("#mapa")) {
        const lat =
            document.querySelector("#lat").value === ""
                ? 9.9349123
                : document.querySelector("#lat").value;
        const lng =
            document.querySelector("#lng").value === ""
                ? -84.0902647
                : document.querySelector("#lng").value;

        const mapa = L.map("mapa").setView([lat, lng], 17);

        L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
            attribution:
                '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(mapa);

        let marker;

        const geocodeService = L.esri.Geocoding.geocodeService();

        // agregar el pin
        marker = new L.marker([lat, lng]).addTo(mapa);
        const posicion = marker.getLatLng();
        geocodeService
            .reverse()
            .latlng(posicion, 16)
            .run(function(error, resultado) {
                marker.bindPopup(resultado.address.LongLabel);
                marker.openPopup();
            });
    }
});

$('.delete-confirm').click(function(event) {
    var form =  $(this).closest("form");
    event.preventDefault();
    swal({
        title: `¿Estás segura de que quieres eliminar?`,
        text: "Si borra esto, desaparecerá para siempre.",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        form.submit();
      }
    });
  });


  $(document).on("scroll", function(){
    if
  ($(document).scrollTop() > 86){
      $("#banner").addClass("shrink");
    }
    else
    {
        $("#banner").removeClass("shrink");
    }
});