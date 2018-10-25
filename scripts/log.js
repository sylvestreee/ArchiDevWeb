$(document).ready(function() {
  $('.email').on('input', function() {
    var input=$(this);
    var no_blank=input.val();
    if(no_blank)
    {
      input.removeClass("invalid").addClass("valid");
    }
    else
    {
      input.removeClass("valid").addClass("invalid");
    }
  });

  $('.pwd').on('input', function() {
    var input=$(this);
    var no_blank=input.val();
    if(no_blank)
    {
      input.removeClass("invalid").addClass("valid");
    }
    else
    {
      input.removeClass("valid").addClass("invalid");
    }
  });

  $(".submit-button button").click(function(event) {
    var form_data=$(".form-log").serializeArray();
    var error_free=true;
    $.each(form_data, function(i, input) {
      var element=$("."+input.name);
      var valid=element.hasClass("valid");
      var error_element=$("span", element.parent());
      var warning_element=$("i", element.parent());
      if(!valid) {
        error_element.removeClass("missing").addClass("missing-show");
        warning_element.removeClass("invisible").addClass("visible");
        error_free=false;
      }
      else {
        error_element.removeClass("missing-show").addClass("missing");
        warning_element.removeClass("visible").addClass("invisible");
      }
    });
    if(!error_free) {
      event.preventDefault();
    }
    else {
      alert('No errors: Form is good');
    }
  });
});
