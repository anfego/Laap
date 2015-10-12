angular.module('countrySelect', [])
  .directive('countrySelect', ['$parse', function ($parse) {
    var countriesUnsort = [
      "Afganistán", "Islas de Aland", "Albania", "Argelia", "American Samoa", "Andorra", "Angola",
      "Anguila", "La Antártida", "Antigua y Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria",
      "Azerbaiyán", "Bahamas", "Bahrein", "Bangladesh", "Barbados", "Bielorrusia", "Belgica", "Belice", "Benin",
      "Bermuda", "Bhutan", "Bolivia, Estado Plurinacional de", "Bonaire, San Eustaquio y Saba", "Bosnia y Herzegovina",
      "Botswana", "Isla Bouvet", "Brasil",
      "Territorio Británico del Océano Índico", "Brunéi", "Bulgaria", "Burkina Faso", "Burundi", "Camboya",
      "Camerún", "Canadá", "Cabo Verde", "Islas Caimán", "República Centroafricana", "Chad", "Chile", "China",
      "Isla de Navidad", "Islas Cocos (Keeling)", "Colombia", "Comoras", "Congo",
      "Congo, La República Democrática del", "Islas Cook", "Costa Rica", "Costa de Marfil", "Croacia", "Cuba",
      "Chipre", "República Checa", "Dinamarca", "Djibouti", "Dominica", "República Dominicana", "Ecuador", "Egipto",
      "El Salvador", "Guinea Ecuatorial", "Eritrea", "Estonia", "Etiopía", "Islas Malvinas (Falkland Islands)",
      "Islas Feroe", "Fiji", "Finlandia", "Francia", "Guyana", "Polinesia Francesa",
      "Territorios Australes Franceses", "Gabón", "Gambia", "Georgia", "Alemania", "Ghana", "Gibraltar", "Grecia",
      "Groenlandia", "Granada", "Guadalupe", "Guam", "Guatemala", "Guernsey", "Guinea",
      "Guinea-Bissau", "Guyana", "Haití", "Islas Heard y McDonald", "Santa Sede (Ciudad del Vaticano)",
      "Honduras", "Hong Kong", "Hungría", "Islandia", "India", "Indonesia",
       "Irán, República Islámica de", "Irak",
      "Irlanda", "Isla de Man", "Israel", "Italia", "Jamaica", "Japón", "Jersey", "Jordan", "Kazajstán", "Kenia",
      "Kiribati", "Corea, República Popular Democrática de", "Corea del Sur", "Kuwait", "Kirguistán",
      "República Democrática Popular Lao", "Letonia", "Líbano", "Lesotho", "Liberia", "Libia",
      "Liechtenstein", "Lituania", "Luxemburgo", "Macao", "Macedonia, Ex-República Yugoslava de",
      "Madagascar", "Malaui", "Malasia", "Maldivas", "Mali", "Malta", "Islas Marshall", "Martinica",
      "Mauritania", "Mauricio", "Mayotte", "México", "Micronesia, Estados Federados de", "República de Moldova",
      "Mónaco", "Mongolia", "Montenegro", "Montserrat", "Marruecos", "Mozambique", "Myanmar", "Namibia", "Nauru",
      "Nepal", "Países Bajos", "Nueva Caledonia", "Nueva Zelanda", "Nicaragua", "Níger",
      "Nigeria", "Niue", "Isla de Norfolk", "Islas Marianas del Norte", "Noruega", "Omán", "Pakistán", "Palau",
      "Palestina, Territorio Ocupado", "Panamá", "Papua Nueva Guinea", "Paraguay", "Perú", "Filipinas",
      "Pitcairn", "Polonia", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Rumania", "Federación de Rusia",
      "Ruanda", "San Bartolomé", "Santa Elena, Ascensión y Tristán da Cunha", "San Cristóbal y Nieves", "Santa Lucía",
      "San Martín (parte francesa)", "San Pedro y Miquelón", "San Vicente y las Granadinas", "Samoa", "San Marino",
      "Santo Tomé y Príncipe", "Arabia Saudita", "Senegal", "Serbia", "Seychelles", "Sierra Leona", "Singapur",
      "Sint Maarten (neerlandés Parte)", "Eslovaquia", "Eslovenia", "Islas Salomón", "Somalia", "Sudáfrica",
      "Georgia del Sur e Islas Sandwich del Sur", "Sudán del Sur", "España", "Sri Lanka", "Sudán", "Suriname",
      "Svalbard y Jan Mayen", "Swazilandia", "Suecia", "Suiza", "República Árabe Siria",
      "Taiwán, Provincia de China", "Tayikistán", "Tanzania, República Unida de", "Tailandia", "Timor-Leste",
      "Togo", "Tokelau", "Tonga", "Trinidad y Tobago", "Túnez", "Turquía", "Turkmenistán",
      "Islas Turcas y Caicos", "Tuvalu", "Uganda", "Ucrania", "Emiratos Árabes Unidos", "Reino Unido",
      "Estados Unidos", "Estados Unidos Islas menores alejadas", "Uruguay", "Uzbekistán", "Vanuatu",
      "Venezuela", "Vietnam", "Islas Vírgenes Británicas", "Islas Vírgenes, EE.UU.",
      "Wallis y Futuna", "Sáhara Occidental", "Yemen", "Zambia", "Zimbabwe"
    ];
    var countries = countriesUnsort.sort(); 
    return {
      restrict: 'E',
      template: '<select><option>' + countries.join('</option><option>') + '</option></select>',
      replace: true,
      link: function (scope, elem, attrs) {
        if (!!attrs.ngModel) {
          var assignCountry = $parse(attrs.ngModel).assign;

          elem.bind('change', function (e) {
            assignCountry(elem.val());
          });

          scope.$watch(attrs.ngModel, function (country) {
            elem.val(country);
          });
        }
      }
    };
  }]);
