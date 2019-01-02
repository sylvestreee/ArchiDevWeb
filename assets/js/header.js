$(document).ready(function() {
    
    /*disables the possibility of submitting any form by clicking on the enter keyboard key*/
    $('input').on('keypress', function(e) {
    return e.which !== 13;
    });
    
    /* 
     * displays the search option choose by the user on the search bar 
     * and changes the search input name by the one of the choosen option
     */
    $(document).on('click', '.dropdown-menu li a', function() {
        $(this).parents('.dropdown').find('.btn').html($(this).text());
        $('.search').attr('name', $(this).data('value'));
    });

    /*an user can't do a research using the search bar if he doesn't write a least 3 letters*/
    $(document).on('input', '.search', function() {
        var input = $(this);
        var min = input.val().length >= 3;
        if(min) {
            $('.search-submit').removeClass("invisible").addClass("visible");
        }
        else {
            $('.search-submit').removeClass("visible").addClass("invisible");
        }
    });
});