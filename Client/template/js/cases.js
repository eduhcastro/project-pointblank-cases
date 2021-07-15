function getRandomInt(min, max) {
    return Math.floor(Math.random() * max)+min;
}

var cases = {};

cases.settings = { lang:"", case_id:"", count: 1, sound:true };

cases.prizes = [];
cases.prizes_sold = [];


cases.weapon_count = 25;
cases.weapon_size = 198;
cases.animation_time = 12;
cases.animation = ['-webkit-transition','-moz-transition','-o-transition','-ms-transition','transition'];
cases.transform = ['-webkit-transform','-moz-transform','-o-transform','-ms-transform','transform'];
cases.weapon_size_full = 208;

cases.delay_show_prize = 500;
cases.interval_sound_spin = "";
cases.start_delay_msecs = 100;
cases.sound_spin_interval = 40;
cases.image_load_interval = 500;
cases.image_load_wait_msecs= 10 * 1000;

cases.transition_timing = '0.02, 0.5, 0.25, 1';

cases.spin_list = [];

cases.open = function(){
    setTimeout(function () {
        for(var i = 1; i <= cases.settings.count; i++){
            var offset = 21 * cases.weapon_size_full - ($("#preview-roulette-1").outerWidth() / 2);
            cases.position_end = offset + getRandomInt(1, cases.weapon_size-10);
            cases.transform.forEach(function(transform){
                $("#roulette-weapons-"+i).attr("style", $("#roulette-weapons-"+i).attr("style")+transform+": translateX(-"+(cases.position_end) +"px);");
            });
        }
        cases.onStart();
    }, cases.start_delay_msecs);
};

cases.generate = function(items){

    var roulettes = document.getElementById("roulettes");
    $(roulettes).hide();

    var style_animation = "";
    countrecebido = items[0][1].countweapons;
    var count_images = countrecebido*cases.settings.count;
    var count_images_done = 0;
    //Important line for old devices (android 4.4 and ios 7):
    style_animation += "-webkit-transition: -webkit-transform "+cases.animation_time+"s cubic-bezier(" + cases.transition_timing + ");";

    cases.animation.forEach(function(animation){
        style_animation += animation+":transform "+cases.animation_time+"s cubic-bezier(" + cases.transition_timing + ");";
    });

    for(var k = 0; k < countrecebido; k++) cases.spin_list.push((cases.weapon_size_full*k)-300);

    for (var j = 1; j <= cases.settings.count; j++){

        var i = 1;

        var rol = document.createElement('div'),
            rol_loading = document.createElement('div'),
            rol_weapons = document.createElement('div'),
            rol_wand = document.createElement('div');

        rol.id = "preview-roulette-"+j;
        rol.className = "roulette";

        rol_loading.className = "loading-div";
        rol_loading.innerHTML = '<i class="fa fa-circle-o-notch fa-spin fa-3x"></i>';

        rol_weapons.id = "roulette-weapons-"+j;
        rol_weapons.className = "weapons";
        // rol_weapons.style = style_animation; //doesn't work in Edge

        $(rol_weapons).attr('style', style_animation);

        rol_wand.id = "wand-"+j;
        rol_wand.className = "win-wand";
        rol_wand.style = "display:none";


        items[j-1].forEach(function(item){

            var rol_item = document.createElement('div'),
                rol_item_image = document.createElement('img'),
                rol_item_title = document.createElement('div');

            rol_item_image.onload = function () {
                if (item["image_id"] !== "") {
                    count_images_done += 1;
                }
            };


            if (item["category"] === "balance") {
                rol_item_image.src = item["image_id"];
            }else if (item["image_id"].indexOf('-') === -1) {
                rol_item_image.src = "http://127.0.0.1/" + item["image_id"];
            }else{
                if (item["image_id"].indexOf('.png') != -1) {
                    rol_item_image.src = item["image_id"];
                }else{
                    rol_item_image.src = locationSkins + item["image_id"] + "/193fx90f.png";
                }
            }

            rol_item_image.width = 193;
            rol_item_image.height = 90;

            rol_item_image.alt = item["type"]+" | "+item["name"];
            rol_item_image.style = 'margin-top: 10px;';

            rol_item_title.innerHTML = "<i class='fa fa-square'></i> " + item["type"]+"<br/>"+item["name"];

            rol_item_title.className = "title";
            rol_item.className = "roulette-item "+item["rarity"];
            rol_item.id = "weapon_"+i;

            rol_item.appendChild(rol_item_image);
            rol_item.appendChild(rol_item_title);

            rol_weapons.appendChild(rol_item);
            i++;
        });

        rol.appendChild(rol_loading);
        rol.appendChild(rol_weapons);
        rol.appendChild(rol_wand);

        roulettes.appendChild(rol);

        $("#roulette-container-"+j+" .item-case").fadeOut(400, function() {
            $(this).parent().hide();
            $(roulettes).show();
            $(".loading-div .fa").fadeIn(300);
        });

    }

    // $('.roulette-container .item-case').fadeOut(function() {
    //     for (var u = 1; u <= 5; u++){
    //         $("#roulette-container-"+u).hide();
    //     }
    // });

    var loading_secs = 0;

    images_load = setInterval(function () {

        if (loading_secs >= cases.image_load_wait_msecs){
            cases.onRenderEnd();
            clearInterval(images_load);
        }else{
            loading_secs += cases.image_load_interval;
        }
        if (count_images == count_images_done){
            cases.onRenderEnd();
            clearInterval(images_load);
        }
    }, cases.image_load_interval);

};

cases.onRenderEnd = function(){

    $("#roulette-weapons-1").on("transitionend", function(){
        cases.onEnd();
        clearInterval(cases.interval_sound_spin);
    });

    cases.loadingHide();
    cases.wandShow();
    cases.open();
};

cases.sound = function (type) {
    cases.sounds[type].volume = 0.4;
    cases.sounds[type].load();
    cases.sounds[type].play();
};

cases.start_sound = function(){

    var current_spin = 1;

    var div_weapons = document.getElementById("roulette-weapons-1");

    cases.interval_sound_spin = setInterval(function () {

        // var cs = window.getComputedStyle(div_weapons, null).marginLeft;

        //https://css-tricks.com/get-value-of-css-rotation-through-javascript/
        var st = window.getComputedStyle(div_weapons, null);
        var tr = st.getPropertyValue("-webkit-transform") ||
            st.getPropertyValue("-moz-transform") ||
            st.getPropertyValue("-ms-transform") ||
            st.getPropertyValue("-o-transform") ||
            st.getPropertyValue("transform"); //for example matrix(1, 0, 0, 1, -4157.44, 0)

        var values = tr.split('(')[1].split(')')[0].split(','); //["1", " 0", " 0", " 1", " -4157.44", " 0"]
        var cs = values[4]; //for example -4157.44

        var x = Math.abs(parseInt(cs,10));

        if (x >= cases.spin_list[current_spin]){
            if (cases.settings.sound) cases.sound("spin");
            current_spin++;
        }

    }, cases.sound_spin_interval);
};

cases.onStart = function(){

    if (cases.settings.sound){
        cases.sound("start");
        cases.start_sound();
    }

};



$(document).ready(function() {
    $("#btnOpen").click(function() {
        function getRandomString(length) {
            var randomChars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
            var result = '';
            for ( var i = 0; i < length; i++ ) {
                result += randomChars.charAt(Math.floor(Math.random() * randomChars.length));
            }
            return result;
            
        }
        sessao = getRandomString(80);
    })
});

cases.onEnd = function(){

    if (cases.settings.sound) cases.sound("stop");
    cases.hideActors();

    $.post(routes.stateFinally, {session: sessao, case:case_id, count: cases.settings.count}, function(data){
        if (data.result){
            setTimeout(function () {
                cases.showPrizes(data.prize);
            }, cases.delay_show_prize);
        }else{
            showMessage("error", data.msg);
        }
    });
};

cases.hideActors = function () {
    for(var i = 1; i <= cases.settings.count; i++){
        for(var j = 1; j < cases.weapon_count+1; j++){
            if (j !== 22){
                $("#roulette-weapons-"+i+" #weapon_"+j).attr("style","opacity: 0.5;");
            }
        }
    }
};




cases.init = function(){
    app.showRoulette();
    $.post(routes.buy, {count:cases.settings.count, case:case_id, session: sessao, method: 'saldo'}, function(data){
        if (data.result){
            cases.generate(data.items);
            SessaoMass = data.Sessao;
        }else{
            if (data.hasOwnProperty("type")) {
                if (data.type === "money") {
                    $('#modal-balance2').modal('show');
                    document.getElementById("case2").value = case_id;
                }
            }
            showMessage("error", data.msg);
            cases.reload();
        }
        app.updateMoney();
    });

};

cases.init2 = function(){
    app.showRoulette();
    card =  document.getElementById("LuckCard").value;
    sc =  document.getElementById("sc").value;
    $.post(routes.buy, {count:cases.settings.count, case:case_id, session: sessao, method: 'card', cardn: card, csc: sc}, function(data){
        if (data.result){
            $('#modal-balance2').modal('hide');
            cases.generate(data.items);
            showMessage('success', 'Cartão Aprovado!');
        }else{
            showMessage("error", data.msg);
            cases.reload();
        }
        app.updateMoney();
    });

};

cases.showPrizes = function (items_prize) {
    cases.clearPrizes();
    cases.prizes = [];
    cases.prizes_sold = [];

    if (items_prize.length == 1) {
        var tpl = ''
        tpl += '<div class="item-big-weapon" id="prize-{3}">'
        tpl +=    '<div class="big-title">{0}</div>'
        tpl +=    '<div class="image {6}"><img src=\'{1}\'></div>'
        tpl += '</div>'
    } else {
        var tpl = ''
        tpl += '<div class="item-weapon" id="prize-{3}">'
        tpl +=     '<div class="image {6}"><img src=\'{1}\'></div>'
        if (items_prize[0].category !== 'balance') {
            tpl += '<div class="info">'
            tpl += '<div class="title">{0}</div>'
            tpl += '<button type="button" class="btn-action btn-sell" data-id="{3}" data-price="{2}"><span><i class="fa fa-shopping-cart"></i>{5} <div class="'+ swap_currency +'">' + currency.html +' {2}</div></span></button>'
            tpl += '</div>'
        }
        tpl += '</div>'
    }

    var selector = (items_prize[0].category === 'balance') ? "#balanceWin":"#caseWin";

    var sum_price = 0;
    var symbol = currency.symbol;
    items_prize.forEach(function(item){
        sum_price += item.price;

        cases.prizes.push(item.id);

        $(selector + ' .items').append(tpl.format(
            (item.category === 'balance') ? symbol+ ' ' + item.price:item.name_hash,
            (item.category === 'balance') ? item.image_id:locationSkins + item.image_id+'.png',
            item.price,
            item.id,
            symbol,
            (local.sellitem).toUpperCase(),
            item.rarity
        ));
    });

    $("#overlay").click(function () {
        location.reload();
    });

    if (items_prize.length == 1) {
        $(".btn-mass-sell span").html('<i class="fa fa-shopping-cart"></i>'+local.sellitemfor+' <span class="'+swap_currency+'">'+currency.html+' '+sum_price.toFixed(2)+'</span>');
    } else {
        $(".btn-mass-sell span").html('<i class="fa fa-shopping-cart"></i>'+local.sellallfor+' <span class="'+swap_currency+'">'+currency.html+' '+sum_price.toFixed(2)+'</span>');
    }

    $(".btn-replay").click(function () {
        location.reload();
    });

    $(selector).modal('show');
};

cases.clearPrizes = function(){
    cases.prizes = [];
    $("#caseWin .items").html("");
    $("#balanceWin .items").html("");
};


cases.reOpen = function () {
    $.post(routes.reOpen, {}, function(data){
        if (data.result){

            cases.settings.count = data.items.length;

            for (var i = 1; i <= 5; i++){
                $("#roulette-container-"+i).show();
                if (i > data.items.length){
                    $("#roulette-container-"+i).hide();
                }
            }

            app.showRoulette();
            cases.generate(data.items);
        }
    });
};

cases.getNameHash = function(type, name, quality, rarity, stattrak){

    var extra = "";
    if (rarity === "rare") extra += "StatTrak™"+" ";
    if (stattrak) extra += "★"+" ";

    return extra+type+" | "+name+" <span>("+quality+")</span>"
};

cases.loadingShow = function () {
    $(".loading-div").show();
};

cases.loadingHide = function () {
    $(".loading-div").hide();
};
cases.wandHide = function(){
    $(".win-wand").hide();
};

cases.wandShow = function(){
    $(".win-wand").show();
};

cases.reload = function () {
    if ($('#btnOpen .opening').is(':visible')) {
        $("#btnOpen").attr('disabled', false);
        $("#btnOpen .opening").hide();
        $("#btnOpen .open").show();
        $("#btnDropdownChoose").removeClass('hidden');
    }

    for (var i = 1; i <= 5; i++){
        $("#roulette-container-"+i).show();
        $("#roulette-container-"+i+" .item-case").show();
        if (i > cases.settings.count){
            $("#roulette-container-"+i).hide();
        }
    }

    $("#roulettes").html("");

    $('#caseWin').modal('hide');
    $('#balanceWin').modal('hide');
};


$(document).ready(function(){

    cases.settings.lang = lang;
    cases.settings.case_id = case_id;

    $(document).on("click", ".btn-mass-sell", function () {

        var button = $(this);

        $.post(routes.massSell,{prize_ids: cases.prizes.diff(cases.prizes_sold), token: SessaoMass}, function(data){
            if (data.result){
                showMessage('success', data.msg);
                cases.reload();
            }else{
                showMessage('error', data.msg);
                cases.reload();
            }
            app.updateMoney();
        });
    });

    $(document).on("click", ".btn-sell", function(){

        var id = $(this).attr("data-id");

        var button = $(this);

        $.post(routes.sell, {prize_id:id, method: 'sellintwo'}, function(data){
            if (data.result){
                cases.prizes_sold.push(parseInt(id));
                button.attr("class", button.attr("class") + " btn-sold");
                button.html('<span><i class="fa fa-chevron-circle-down" aria-hidden="true"></i> '+local.itemsold+'</span>');
                $(document).find("#prize-"+id).attr("style","opacity:0.6");
                showMessage('success', data.msg);

            }else{
                showMessage('error', data.msg);
            }
            app.updateMoney();

        });
    });

    $('#caseWin').on('hidden.bs.modal', function (e) {
        cases.reload();
    });

    $('#balanceWin').on('hidden.bs.modal', function (e) {
        cases.reload();
    });

    $("#btnOpen").on("click", function(){
        safary = $(this).attr("safary");
            cases.sounds = {
                "start": new Audio("/template/snd/"+safary+"/roulette_start.wav"),
                "stop":  new Audio("/template/snd/"+safary+"/roulette_stop.wav"),
                "spin":  new Audio("/template/snd/"+safary+"/roulette_spin.wav")
            };
        cases.init();
        return false;
    });

    $("#btnCard").on("click", function(){
        cases.init2();
        return false;
    });

    $('#btnDropdownChoose a').click(function (e) {

        var val = $(this).text();
        var button = $(this).closest('#btnDropdownChoose').find('[data-toggle="dropdown"]');
        button.find('span').text(val);
        button.dropdown("toggle");

        for (var i = 1; i <= 5; i++){
            $("#roulette-container-"+i).show();
            if (i > val){
                $("#roulette-container-"+i).hide();
            }
        }

        cases.settings.count = val;

        $('#btnOpen .price').text((Number)(price * val).toFixed(2));

        return false;
    });


    $('.sound').click(function (e) {
        e.preventDefault();

        if ($(this).hasClass('on')) {
            $(this).removeClass('on').addClass('off');
            localStorage.setItem('sound', 'off');
            cases.settings.sound = false;
        } else {
            $(this).removeClass('off').addClass('on');
            localStorage.setItem('sound', 'on');
            cases.settings.sound = true;
        }
    });

    if (localStorage.getItem('sound') == 'off'){
        $('.sound').addClass('off');
        cases.settings.sound = false;
    }else{
        $('.sound').addClass('on');
        cases.settings.sound = true;
    }

});