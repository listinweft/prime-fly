// AOS
AOS.init();



// PASSWORD SHOW
// $(".eye").click(function() {
//     var input = $($(this).attr("toggle"));
//     if (input.attr("type") == "password") {
//       input.attr("type", "text");
//     } else {
//       input.attr("type", "password");
//     }
// });
// $(".eye-open").click(function() {
//     $(this).css('display','none');
//     $(".eye-close").css('display','block');
// });
// $(".eye-close").click(function() {
//     $(this).css('display','none');
//     $(".eye-open").css('display','block');
// });
$(document).ready(function () {
    $('#eye-open-create').hide(); // hide open eye (👁)
    $('#eye-close-create').show();
    $("#eye-close-confirm").show();
    $("#eye-open-confirm").hide();
});
$("#eye-open-create").on('click', function () {
    var passwordField = $($(this).attr("toggle"));
    passwordField.attr("type", "password");
    $(this).hide();
    $("#eye-close-create").show();
});

// On closed eye click , hide password
$("#eye-close-create").on('click', function () {
    var passwordField = $($(this).attr("toggle"));
    passwordField.attr("type", "text");
    $(this).hide();
    $("#eye-open-create").show();
});

// For Confirm Password field
$("#eye-close-confirm").on('click', function () {
    var passwordField = $($(this).attr("toggle"));
    passwordField.attr("type", "text"); // Show password
    $(this).hide(); // Hide closed eye
    $("#eye-open-confirm").show(); // Show open eye
});


$("#eye-open-confirm").on('click', function () {
    var passwordField = $($(this).attr("toggle"));
    passwordField.attr("type", "password"); // Hide password
    $(this).hide(); // Hide open eye
    $("#eye-close-confirm").show(); // Show closed eye
});
// $("#eye-open-confirm").on('click', function() {
//   var passwordField = $($(this).attr("toggle"));
//   $("#eye-close-confirm").show();
//   $(this).hide();
//   passwordField.attr("type", "text");
// });

// $("#eye-close-confirm").on('click', function() {
//   var passwordField = $($(this).attr("toggle"));
//   $("#eye-open-confirm").show();
//   $(this).hide();
//   passwordField.attr("type", "password");
// });

// Initially hide the close eye icons
$("#eye-close-create").hide();
$("#eye-close-confirm").hide();
// DAIL CODE
const input = document.querySelector("#phone");
const iti = window.intlTelInput(input, {
  // allowDropdown: false,
  // autoPlaceholder: "off",
  // containerClass: "test",
  // countryOrder: ["jp", "kr"],
  // customPlaceholder: function(selectedCountryPlaceholder, selectedCountryData) {
  //   return "e.g. " + selectedCountryPlaceholder;
  // },
  // dropdownContainer: document.querySelector('#custom-container'),
  // excludeCountries: ["us"],
  // fixDropdownWidth: false,
  // formatAsYouType: false,
  // formatOnDisplay: false,
  // geoIpLookup: function(callback) {
  //   fetch("https://ipapi.co/json")
  //     .then(function(res) { return res.json(); })
  //     .then(function(data) { callback(data.country_code); })
  //     .catch(function() { callback(); });
  // },
  // hiddenInput: () => "phone_full",
  // i18n: { 'de': 'Deutschland' },
  initialCountry: "in",
  // nationalMode: false,
  // onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
  // placeholderNumberType: "MOBILE",
  // showFlags: false,
  separateDialCode: true,
  // strictMode: true,
  // useFullscreenPopup: true,
  // utilsScript: "/build/js/utils.js", // leading slash (and http-server) required for this to work in chrome
  // validationNumberType: null,
});
window.iti = iti; // useful for testing
