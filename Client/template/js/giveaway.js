var giveaway = {};

giveaway.join = function (game_id) {
    $.post(mainRoutes.giveaway_join,{game_id: game_id}, function(data){
        if (data.result){
            $("#giveaway-participant-" + game_id).removeAttr("style");
            $("#giveaway-join-" + game_id).attr("style", "display:none");
            showMessage("success", data.msg);
            app.updateMoney2(); 
        }else{
            if (data.hasOwnProperty('modal')) {
                switch (data.modal) {
                    case "pay":
                        $("#modal-balance").modal('show');
                        break;
                    case "email":
                        $("#modal-email").modal('show');
                        $("#button-save-email").attr('data-game-id', game_id);
                        break;
                }
            }
            showMessage("error", data.msg);
        }
    });
};


$(function () {

    $('.giveaway-join').on('click', function() {
        var game_id = $(this).attr("data-game-id");

        giveaway.join(game_id);

        return false;
    });

    $('#button-save-email').on('click', function () {
        var email = $("#input-email").val();
        var game_id = $("#button-save-email").attr('data-game-id');

        app.saveEmail(email, function(data) {
            if (data.result) {
                $("#modal-email").modal('hide');
                showMessage("success", data.msg);
                giveaway.join(game_id);
            }else{
                showMessage("error", data.msg);
            }
        });
    });

});