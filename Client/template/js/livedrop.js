if(window.innerWidth > 575){
var drop = {
};

var siteStats = {
    show: false
};

/**
 *
 * @param {string} rarity
 * @param {string} stattrak
 * @param {number} id
 * @param {string} profile_link
 * @param {string} image_id
 * @param {string} case_image
 * @param {string} weapon_type
 * @param {string} weapon_name
 * @param {string} user_name
 * @param {string} pic_url
 * @param {string} selector
 * @param {string} type
 */
drop.renderPrize = function (rarity, stattrak, id, profile_link, image_id, case_image, weapon_type, weapon_name, user_name, pic_url, selector, type, days, banner, moldura) {
    if(user_name.length > 0){
    var old = $(selector + ' .drop-content .item-drop:nth-child(1)');
    var old_id = old.attr('data-id-' + type);

    if (parseInt(id) === parseInt(old_id)) {
        return;
    }
  
    var tpl = "";
    tpl += '<div class="item-drop {0} {1}" style="display: none" data-id-' + type + '="{2}" id="live-' + type + '-{2}">';
    tpl +=   '<a class="picture" href="/profile/{8}">';
    tpl +=     '<img src="/template/imgs/weapons_drops/193/{4}.png" style="width:120; height:60;" class="drop-image" alt="Drop Image">';
    tpl +=     '<img src="/template/imgs/cases/{5}.png" class="case-image" alt="Case Image">';
    tpl +=     '<div class="title">{7}<br> {6} ({10}) Dias</div>';
    tpl +=     '<div class="hover">';
    tpl +=       '<div class="user">';
    tpl +=         `<span class="userimg" class="ProfileListUser">`;
    tpl +=           `<img src="{9}" alt="user pic" class="ProfileList">`;
    tpl +=         '</span>';
    if(moldura != null){
        tpl += `<img src="/template/imgs/UI_V12/Molders_Profiles/{12}" alt="casedrop.com" class="ProfileListMolderImg">`;
        };
    if(banner == '' || banner == null){
        tpl +=         '<div class="text">';
    }else{
    tpl +=         '<div class="text" style="background-image: url(/template/imgs/UI_V12/Banners_Profiles/{11}.gif); background-position: center; background-repeat: no-repeat; background-size: cover">';
    }
    tpl +=           '<span>{8}</span>';
    tpl +=           '';
    tpl +=         '</div>';
    tpl +=       '</div>';
    tpl +=     '</div>';
    tpl +=   '</a>';
    tpl += '</div>';


    $(selector + " .drop-content").prepend(tpl.format(rarity, stattrak, id, profile_link, image_id, case_image, weapon_type, weapon_name, user_name, pic_url, days, banner, moldura));

    $("#live-" + type + "-" + id).fadeIn(400);

    if ($(selector + ' .drop-content .item-drop').length > 10) {
        $(selector + ' .drop-content .item-drop:nth-child(10)').remove();
    }
}
};

/**
 * @param {Array} items
 */
drop.newItems = function (items) {
    items.reverse();
    items.forEach(function(item){

if(item._weaponName.length > 0){
        if (parseInt(item._weaponPrice) > parseInt(item._casePrice)){
            drop.renderPrize(
                item._weaponRarity,
                (item._weaponStatTrak) ? "stattrak":"",
                item._id,
                ""+lang+"/profile/"+item._owner,
                item._weaponImageId,
                item._caseImage,
                item._weaponType,
                item._weaponName,
                item._ownerName,
                item._ownerImageURL,
                "#best-drop",
                "best",
                item._weapondias,
                item._banner,
                item._frame
            );

            function v12b(cx){
                y = '';
                if(cx == 'V12'){
                    y = '<img class="BannerV12" src="/template/imgs/UI_V12/Tools/BarNav.png">';
                }
                return y;
            }
            function v12c(cx){
                if(cx == 'V12'){
                    y = 'class="PlayerWinner-XA2"';
                }else{
                    y = 'class="PlayerWinner-XA"';
                }
                return y;
            } 
            
            function v12d(cx){
                if(cx == 'V12'){
                    y = '<span class="ServerV12">001 Brasil</span>';
                }
                return y;
            }   
            function Screen(w) {
                if (w.matches) {
                } else {
                    $('span', '#TextAlertWinner').empty().remove();

                    $('#TextAlertWinner').append('<span id="TextAlertWinnerReady" '+v12c(getCookie('thema'))+' style="width: max-content;">Parabéns ('+item._ownerName+') Por ter Ganho ('+item._weaponName+' '+item._weaponType+') '+item._weapondias+' Dias!</span>'+v12b(getCookie('thema'))+v12d(getCookie('thema')));
                }
              }
              
              Screen(window.matchMedia("(max-width: 575px)"));

        
        }

        drop.renderPrize(
            item._weaponRarity,
            (item._weaponStatTrak) ? "stattrak":"",
            item._id,
            ""+lang+"/profile/"+item._owner,
            item._weaponImageId,
            item._caseImage,
            item._weaponType,
            item._weaponName,
            item._ownerName,
            item._ownerImageURL,
            "#all-drop",
            "all",
            item._weapondias,
            item._banner,
            item._frame
        );
}

    });
}

siteStats.update = function (casesOpenedTotal, casesOpenedToday, usersTotal, usersOnline, _beastuser, _beastuserimg, _beastuserbanner, _beastuserframe) {
    var comma_separator_number_step = $.animateNumber.numberStepFactories.separator(' ');
    $("#live-stats-caseopenedtotal").animateNumber({ number: parseInt(casesOpenedTotal), numberStep: comma_separator_number_step });
    $("#live-stats-caseopenedtoday").animateNumber({ number: parseInt(casesOpenedToday), numberStep: comma_separator_number_step });
    $("#live-stats-users").animateNumber({ number: parseInt(usersTotal), numberStep: comma_separator_number_step });
    $("#live-stats-online").animateNumber({ number: parseInt(usersOnline), numberStep: comma_separator_number_step });
    $("#live-stats-supreme").html(_beastuser+ ' <img src="'+_beastuserimg+'" width="30" height="34"></img>');
    if(_beastuserbanner != null){
        $("#live-stats-supreme").addClass("New");
        $("#live-stats-supreme").css("position", "absolute");
        $('#live-stats-banner').html('<img src="template/imgs/UI_V12/Banners_Profiles/'+_beastuserbanner+'.gif" class="bannertopimg">');    
    }
};


$(function () {


    $('[data-drop]').on('click', function() {
        var $this = $(this);
        $('[data-drop]').removeClass('active');
        $this.addClass('active');
    });

    /**
     * @type {Socket}
     */
    var socket = io(live);

    socket.on('connect', function () {
        socket.on('stats', function (stats) {

            siteStats.update(stats._casesOpenedTotal, stats._casesOpenedToday, stats._usersTotal, stats._usersOnline, stats._beastuser, stats._beastuserimg, stats._beastuserbanner, stats._beastuserframe);

            if (!siteStats.show){
                $("#live-stats").fadeIn('fast');
                siteStats.show = true;
            }
        });

        socket.on('drops', function (msg) {
            drop.newItems((msg));
        });

    });

    $(window).load(function() {
        var socket2 = io.connect(live);
        socket2.on('padrao', function (msg) {
            drop.newItems((msg));
            socket2.disconnect();
        });
        $("#LoadWebSiteScreen").css("opacity", "0");
        var counter = 0;
        var looper = setInterval(function(){ counter++;
            if (counter >= 2){
                clearInterval(looper);
                $("#LoadWebSiteScreen").css("display", "none");
            }
        }, 1000);
       
    });
});
}else{
        $("#LoadWebSiteScreen").css("opacity", "0");
        var counter = 0;
        var looper = setInterval(function(){ counter++;
            if (counter >= 2){
                clearInterval(looper);
                $("#LoadWebSiteScreen").css("display", "none");
            }
        }, 1000);
        
}
