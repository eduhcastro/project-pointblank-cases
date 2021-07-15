var app = {};

Array.prototype.diff = function(a) {
    return this.filter(function(i) {return a.indexOf(i) < 0;});
};

app.showMsg = function(title, body, type, timeout){

    var msg_tpl = $('#msg').clone();
    msg_tpl.addClass(type);
    msg_tpl.find('.title').html(title);
    msg_tpl.find('.text').html(body);
    msg_tpl.css('display', 'block');

    $('.content').prepend(msg_tpl);

    setTimeout(function () {
        msg_tpl.fadeOut(300, function () {
            $(this).remove();
        });
    }, timeout);
};


app.showRoulette = function () {
    $("#btnDropdownChoose").addClass('hidden');
    $("#btnOpen").attr('disabled', true);
    $("#btnOpen .opening").show();
    $("#btnOpen .open").hide();
};

app.updateMoney = function () {
    $.post(mainRoutes.balance, {case: case_id}, function(data){
        if (data.result){
            $("#user-balance").html(parseFloat(data.balance).toFixed(2));
        }
    });
};

app.updateMoney2 = function () {
    $.post(mainRoutes.balance, {case: 0}, function(data){
        if (data.result){
            $("#user-balance").html(parseFloat(data.balance).toFixed(2));
        }
    });
};

app.saveEmail = function (email, callback) {
    $.post(mainRoutes.save_email, {email: email}, callback);
};

if (!String.prototype.format) {
    String.prototype.format = function() {
        var args = arguments;
        return this.replace(/{(\d+)}/g, function(match, number) {
            return typeof args[number] != 'undefined'
                ? args[number]
                : match
                ;
        });
    };
}

$(document).ready(function(){



    $(document).on("click", "#refillButton", function () {
        var amount = +parseFloat($("#refill-amount").val() / parseInt(currency.exchange)).toFixed(2);

        if (amount < min_refill) {
            $("#refill-amount-hidden").val(min_refill);
        }else{
            $("#refill-amount-hidden").val(amount);
        }


        $(document).find("#refill-form").submit();
    });

    $(document).on("click", "#redeemButton", function(){

        var code = $("#redeemInput").val();


        $.post(mainRoutes.redeem, {code:code}, function(data){
            if (data.result){
                showMessage("success", data.msg);
                $("#redeemInput").val("")
              
            }else{
                showMessage("error", data.msg);
            }
            app.updateMoney2(); 
        });
    });

    $(document).on("click", "#Lance", function(){

        var sess = $("#SessL").val();


        $.post(mainRoutes.leilao, {leilaos:sess}, function(data){
            if (data.result){
                showMessage("success", data.msg);
                $("#redeemInput").val("");
                $("caseWin2").modal('hide');
              
            }else{
                showMessage("error", data.msg);
            }
            app.updateMoney2(); 
        });
    });

    
    $(document).on("click", "#RetirarBrinde", function(){
        $.post(mainRoutes.retirar, {start: 'Now'}, function(data){
            if (data.result){
                showMessage("success", data.msg);
                $("#BrindesDiarios").remove();  
            }else{
                showMessage("error", data.msg);
            }
            app.updateMoney2(); 
        });
    });

});