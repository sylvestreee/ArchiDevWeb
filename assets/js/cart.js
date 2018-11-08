$(document).ready(function() {
  $(document).on('input', '.num', function() {
    var input = $(this);
    if(input.val() < 1) {
      console.log("lol");
      input.val(1);
    }
  });
});
