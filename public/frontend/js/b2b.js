// AOS
AOS.init(); 



// PASSWORD SHOW
$(".eye").click(function() { 
    var input = $($(this).attr("toggle"));
    if (input.attr("type") == "password") {
      input.attr("type", "text");
    } else {
      input.attr("type", "password");
    }
});
$(".eye-open").click(function() { 
    $(this).css('display','none');
    $(".eye-close").css('display','block');
});
$(".eye-close").click(function() { 
    $(this).css('display','none');
    $(".eye-open").css('display','block');
});

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
