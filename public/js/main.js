$( function() {
    $("#open-modal").click( function(){

        $("#usergroup-modal").show('fast');
        $(".overlay").fadeIn('fast');
    });
    $(".overlay").click( function(){

        $("#usergroup-modal").hide('fast');
        $(".overlay").fadeOut('fast');
    });
});

