$(document).ready(function() {
  $(".fa-calendar-alt").click(function() {
    $("#birthday").datepicker();
    $("#birthday").datepicker("show");
  });

  $('.pseudo').on('input', function() {
    var input=$(this);
    var no_blank=input.val();
    if(no_blank)
    {
      $('.reset-button').removeClass("invisible").addClass("visible");
      $('.submit-button').removeClass("invisible").addClass("visible");
    }
    else
    {
      $('.reset-button').removeClass("visible").addClass("invisible");
      $('.submit-button').removeClass("visible").addClass("invisible");
    }
  });
});
