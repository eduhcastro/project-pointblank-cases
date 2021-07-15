

profile.sendItem = function () {

};

profile.checkTradeURL = function (url) {
    return true;
    var match = url.match(/https:\/\/steamcommunity\.com\/tradeoffer\/new\/\?partner=([0-9]+)&token=(.{4,16})/);

    if (match) {
        if (partnerIdToSteamId(match[1]) === steam_id) {
            return true
        }
    }
    return false

};


profile.orderModal = function (orderInfo) {
    $('#itemOrder .big-title').html(orderInfo.name_hash);
    $('#itemOrder .image img').attr('src', '/images/730/'+orderInfo.image_id+'/360fx360f.png');
    $('#itemOrder .btn-make-order').attr('data-id', orderInfo.prize_id);
};
//https://steamcommunity.com/tradeoffer/new/?partner=200320951&token=2OkTWnqj

profile.showTable = function () {
    // $.post(routes.showTable, function (data) {
    //     if (data) {
    //         $('.trade-info-table').html(data);
    //     }
    // });
};

Array.prototype.diff = function (a) {
    return this.filter(function (i) {
        return a.indexOf(i) === -1;
    });
};
$(document).ready(function(){

    function refreshTable() {

        var table = $(".table-trade tbody");
        /**
         * @param data.actions string
         * @param data.item string
         * @param data.price string
         * @param data.status.actions bool
         * @param data.status.error bool
         * @param data.status.msg string
         */
        $.post(routes.refreshTable, function (data) {
            var responce_row = [];
            for (var item in data){
                responce_row.push(parseInt(item));
                if(data.hasOwnProperty(item)) {
                    var row = $("tr[data-row='" + item + "']");
                    if (row.length === 0){
                        var new_row = $(profile.templates.row).attr('data-row', item);
                        table.append(new_row);
                        row = $("tr[data-row='" + item + "']");
                    }
                    var msg = data[item].msg;
                    row.children('.item-name').html(data[item].item);
                    var m = msg;
                    if (data[item].status.error) {

                        m = $(profile.templates.error).html(msg);
                    }
                        var send_template;
                        var sell_template;
                        var send;
                        var sell;

                    if (data[item].actions === 'withdraw') {
                        send_template = profile.templates['withdraw'].send;
                        sell_template = profile.templates['withdraw'].sell;
                        send = $(send_template).attr('data-id', item);
                        sell = $(sell_template).attr('data-id', item).children('.price').html(data[item].price).parent();
                        if (data[item].status.resend) {
                            m.append(' ', send);
                        }
                        if (data[item].status.resell) {
                            m.append(' ', sell);
                        }
                    }
                    if (data[item].status.actions) {
                        if (data[item].actions === 'request') {
                            send_template = profile.templates['request'].send;
                            sell_template = profile.templates['request'].sell;
                            send = $(send_template).attr('data-id', item);
                            sell = $(sell_template).attr('data-id', item).children('.price').html(data[item].price).parent();
                            m.append(' ', send);
                            m.append(' ', sell);
                        }
                        if (data[item].actions === 'storage') {

                        }
                        if (data[item].actions === 'market') {
                            try_tempalte = profile.templates['market'].again;
                            send_template = profile.templates['market'].send;
                            sell_template = profile.templates['market'].sell;
                            var again = $(try_tempalte).attr('data-id', item);
                            send = $(send_template).attr('data-id', item);
                            sell = $(sell_template).attr('data-id', item).children('.price').html(data[item].price).parent();
                            m.append(' ', again);
                            m.append(' ', send);
                            m.append(' ', sell);
                        }
                    }
                    if ($(".trade-info").css('display') === 'none') {
                        $(".trade-info").show();
                    }

                    row.children('.item-status').html(m);
                    $('td [data-toggle="tooltip"]').tooltip();
                }
            }
            var current_row =  $.map($('tr[data-row]'), function(n) {
                return $(n).data('row')
            });
           var diff = current_row.diff(responce_row);
          diff.forEach(function (nn) {
              $('tr[data-row='+nn+']').remove();
          });
        });
    }

    if ($('.table-trade').length) {
        setInterval(refreshTable, 99999999);
    }


    $(document).on("click", ".action-market-reorder", function () {
        var id = $(this).attr("data-id");
        var parent = $(this).parent();
        console.log(id, parent);
        $.post(routes.marketReorder,{prize_id:id}, function(data){
            if (data.result){
                showMessage("success", data.msg);
            } else {
                showMessage("error", data.msg);
            }
        });
    });

    $(document).on("click", ".action-sell-requested", function () {
        var id = $(this).attr("data-id");

        var parent = $(this).parent();

        $.post(routes.sellRequested, {prize_id:id}, function(data){
            if (data.result){
                showMessage("success", data.msg);
                $("tr[data-row='" + id + "']").remove();
            }else{
                showMessage("error", data.msg);
            }
            app.updateMoney();

        });
        return false;
    });

    $(document).on("click", ".btn-send-order", function () {
        var id = $(this).attr("data-id");
        $.post(routes.sendOrder, {prize_id:id}, function (data) {
            if (data.result){
                showMessage("success", data.msg);
            }else {
                showMessage("error", data.msg);
            }
        });
    });

    $(document).on("click", ".btn-make-order", function () {
        var id = $(this).attr("data-id");
        var email = $("#orderEmail").val();
        var item_buttons = $('a[data-id='+id+']').parent('.user-case');
        console.log(item_buttons);
        $.post(routes.order, {prize_id:id, email:email}, function (data) {
            if (data.result){
                showMessage("success", data.msg);
                $('#itemOrder').modal('hide')
                if (item_buttons.length > 0) {
                    item_buttons.find(".btn-case-action").remove();
                    item_buttons.prepend(
                        '<div class="info">' +
                        '   <span class="item-status">' +
                        '       <i class="fa fa-clock-o waiting"></i>' + translation.waiting +
                        '   </span>' +
                        '   <span class="price '+swap_currency+'">' +
                        '       <span class="symbol">' + currency.html + '</span> ' + item_buttons.attr("data-price") +
                        '   </span>' +
                        '</div>'
                    );
                }
            }else {
                showMessage("error", data.msg);
            }
        });
    });

    $(document).on("click", ".action-send", function(){

        var id = $(this).attr("data-id");

        var parent = $(this).parent();

        var item_buttons = $('a[data-id='+id+']').parent('.user-case');

        $.post(routes.send, {prize_id:id}, function(data){
            if (data.result){
                showMessage("success", data.msg);
                if (item_buttons.length > 0) {
                    item_buttons.find(".btn-case-action").remove();
                    item_buttons.prepend(
                        '<div class="info">' +
                        '   <span class="item-status">' +
                        '       <i class="fa fa-clock-o waiting"></i>' + translation.waiting +
                        '   </span>' +
                        '   <span class="price '+swap_currency+'">' +
                        '       <span class="symbol">' + currency.html + '</span> ' + item_buttons.attr("data-price") +
                        '   </span>' +
                        '</div>'
                    );
                }
                $('.tooltip').remove();
            }else{
                showMessage("error", data.msg);
                if (data.hasOwnProperty('order')) {
                    profile.orderModal(data.order);
                    $('#itemOrder').modal();
                }
            }
        });

        return false;
    });

    $(document).on("click", ".action-sell", function(){


        var id = $(this).attr("data-id");

        var parent = $(this).parent('.user-case');

        $.post(routes.sell, {prize_id:id, method: 'sellone'}, function(data){
            if (data.result){
                showMessage("success", data.msg);
                if (parent.length > 0) {
                    parent.find(".btn-case-action").remove();
                    parent.prepend(
                        '<div class="info">' +
                        '   <span class="item-status">' +
                        '       <i class="fa fa-arrow-down"></i>' + translation.sold +
                        '   </span>' +
                        '   <span class="price '+swap_currency+'">' +
                        '       <span class="symbol">' + currency.html + '</span> ' + parent.attr("data-price") +
                        '   </span>' +
                        '</div>'
                    );
                }
                $('.tooltip').remove();
            }else{
                showMessage("error", data.msg);
            }
            app.updateMoney();

        });

        return false;
    });

    $(document).on("click", ".action-leiloar", function(){
        var parent = $(this).attr("data-img");
        var id = $(this).attr("data-idX");
        $('#LeilolarItem').modal('show')
        $('#llimg').attr('src', parent);
        $('#LeilaoSes').attr('value', id);
    });

    
    
    $("#Leilol").on("click", function () {
        var url = $("#LeilaoPreco").val();
        var sss = $("#LeilaoSes").val();
            $.post(routes.leiloar,{price: url, sessao: sss}, function(data){
                if (data.result){
                    $('#LeilolarItem').modal('hide');
                    showMessage("success", data.msg);
                }else{
                    showMessage("error", data.msg);
                }
            });
    });

      
    $('.NewBanner').on("click", function () {
        var id = $(this).attr("data-id");
            $.post(routes.newbanner,{bannerid: id}, function(data){
                if (data.result){
                    showMessage("success", data.msg);
                    $('#profileedit').modal('hide');
                    setInterval(()=>
                    location.reload(), 1000);
                }else{
                    showMessage("error", data.msg);
                }
            });
    });
    $('.UseBanner').on("click", function () {
        var id = $(this).attr("data-id");
            $.post(routes.usebanner,{bannerid: id}, function(data){
                if (data.result){
                    showMessage("success", data.msg);
                    $('#profileedit').modal('hide');
                    setInterval(()=>
                    location.reload(), 1000);
                }else{
                    showMessage("error", data.msg);
                }
            });
    });

    $('.NewFrame').on("click", function () {
        var id = $(this).attr("data-id");
            $.post(routes.newframe,{frameid: id}, function(data){
                if (data.result){
                    showMessage("success", data.msg);
                    $('#profileedit').modal('hide');
                    setInterval(()=>
                    location.reload(), 1000);
                }else{
                    showMessage("error", data.msg);
                }
            });
    });
    $('.UseFrame').on("click", function () {
        var id = $(this).attr("data-id");
            $.post(routes.useframe,{frameid: id}, function(data){
                if (data.result){
                    showMessage("success", data.msg);
                    $('#profileedit').modal('hide');
                    setInterval(()=>
                    location.reload(), 1000);
                }else{
                    showMessage("error", data.msg);
                }
            });
    });
});




    $("#btn-saveurl").on("click", function () {

        var url = $("#input-tradeurl").val();

        if (profile.checkTradeURL(url)){

            $.post(routes.saveTradeURL,{url: url}, function(data){
                if (data.result){
                    $(".trade-form").attr("class", $(".trade-form").attr("class") + " success");
                    showMessage("success", data.msg);
                }else{
                    showMessage("error", data.msg);
                }
            });

        }else{
            showMessage("error", translation.wrongTradeURL);
        }
    });



function getRandomInt(min, max) {
    return Math.floor(Math.random() * max)+min;
}

function partnerIdToSteamId(id) {
    function res(a, b, result, carry, base) {
        if (a.length == 0 && b.length == 0 && !carry) return result;
        var left = parseInt(a.pop() || '0', 10);
        var right = parseInt(b.pop() || '0', 10);
        var l = left + right + (carry || 0);
        return res(a, b, l % base + (result || ""), Math.floor(l / base), base);
    }

    function add(a, b) {
        return res(a.toString().split(""), b.toString().split(""), "", "", 10).toString();
    }

    return add(id + "","76561197960265728")
}