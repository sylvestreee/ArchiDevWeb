$(document).ready(function() {
  $('.email').on('input', function() {
    var input=$(this);
    var re=/^[^\W][a-zA-Z0-9_-]+(\.[a-zA-Z0-9_-]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/;
    var is_email=re.test(input.val());
    if(is_email)
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
    var re=/^(?=.*\d)(?=.*[A-Z]).{6,}$/;
    var is_pwd=re.test(input.val());
    if(is_pwd)
    {
      input.removeClass("invalid").addClass("valid");
    }
    else
    {
      input.removeClass("valid").addClass("invalid");
    }
  });

  $(".submit-button button").click(function(event) {
    var form_data=$(".form-sign").serializeArray();
    var error_free=true;
    $.each(form_data, function(i, input) {
      var element=$("."+input.name);
      var valid=element.hasClass("valid");
      var error_element=$("span", element.parent());
      var warning_element=$("i", element.parent());
      if(!valid) {
        error_element.removeClass("missing").addClass("missing-show");
        warning_element.removeClass("warning").addClass("warning-show");
        error_free=false;
      }
      else {
        error_element.removeClass("missing-show").addClass("missing");
        warning_element.removeClass("warning-show").addClass("warning");
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
