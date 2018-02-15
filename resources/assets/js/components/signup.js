$(function($) {
  if ($('body#SignupPage').length) {
    $('.btn.signup').prop("disabled", true);
    $("#vilkor").change(function() {
        if(this.checked) {
           $('.btn.signup').prop("disabled", false);
        }else{
          $('.btn.signup').prop("disabled", true);
        }
    }); 

     populateCountries("country", "state");
     populateCountries("country2");
  }
});

