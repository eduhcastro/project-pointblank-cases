var AttachDragTo = (function() {
    var _AttachDragTo = function(boo) {
        console.log(boo);
        if (boo == true) {
            this.el = document.getElementById('BackGroundDiv');
            this.mouse_is_down = false;
            this.init();
        };
    };
    _AttachDragTo.prototype = {
        onMousemove: function(e) {
            if (!this.mouse_is_down) return;
            var tg = e.target,
                x = e.clientX,
                y = e.clientY;

            tg.style.backgroundPositionX = x - this.origin_x + this.origin_bg_pos_x + 'px';
            tg.style.backgroundPositionY = y - this.origin_y + this.origin_bg_pos_y + 'px';
        },

        onMousedown: function(e) {
            this.mouse_is_down = true;
            this.origin_x = e.clientX;
            this.origin_y = e.clientY;
        },

        onMouseup: function(e) {
            var tg = e.target,
                styles = getComputedStyle(tg);

            this.mouse_is_down = false;
            this.origin_bg_pos_x = parseInt(styles.getPropertyValue('background-position-x'), 10);
            this.origin_bg_pos_y = parseInt(styles.getPropertyValue('background-position-y'), 10);
        },

        init: function() {
            var styles = getComputedStyle(this.el);
            this.origin_bg_pos_x = parseInt(styles.getPropertyValue('background-position-x'), 10);
            this.origin_bg_pos_y = parseInt(styles.getPropertyValue('background-position-y'), 10);

            //attach events
            this.el.addEventListener('mousedown', this.onMousedown.bind(this), false);
            this.el.addEventListener('mouseup', this.onMouseup.bind(this), false);
            this.el.addEventListener('mousemove', this.onMousemove.bind(this), false);
        }
    };

    return function(el, start) {
        if (start == false) {
            new _AttachDragTo(null, false);
            console.log('N');
        } else {
            new _AttachDragTo(el, start);
            console.log('FOI');
        }

    };

})();




function dragElement(Yx, enable) {
    elmnt = Yx;
    console.log(enable);
    if (enable == true) {
        var pos1 = 0,
            pos2 = 0,
            pos3 = 0,
            pos4 = 0;
        if (document.getElementById(elmnt.id + "header")) {
            document.getElementById(elmnt.id + "header").onmousedown = dragMouseDown;
        } else {
            elmnt.onmousedown = dragMouseDown;
        }

        function dragMouseDown(e) {
            e = e || window.event;
            e.preventDefault();
            pos3 = e.clientX;
            pos4 = e.clientY;
            document.onmouseup = closeDragElement;
            document.onmousemove = elementDrag;
        }

        function elementDrag(e, y) {
            e = e || window.event;
            e.preventDefault();
            pos1 = pos3 - e.clientX;
            pos2 = pos4 - e.clientY;
            pos3 = e.clientX;
            pos4 = e.clientY;
            if (elmnt.offsetTop - pos2 >= 109 || elmnt.offsetTop - pos2 <= 70) {
                elmnt.style.left = (elmnt.offsetLeft - pos1) + "px";
            } else
            if (elmnt.offsetLeft - pos1 >= 1046 || elmnt.offsetLeft - pos1 <= 13) {} else {
                elmnt.style.left = (elmnt.offsetLeft - pos1) + "px";
                elmnt.style.top = (elmnt.offsetTop - pos2) + "px";
            }
        }

        function closeDragElement() {
            document.onmouseup = null;
            document.onmousemove = null;
        }
    }
}



function imageExists(url, callback) {
    var img = new Image();
    img.onload = function() {
        callback(true);
    };
    img.onerror = function() {
        callback(false);
    };
    img.src = url;
}



function PlayerInfo() {
    $('#PlayerInfo').modal('show');
}


$(document).ready(function() {
    $("#ButonUrl").on("click", function() {
        var image = $(ImageUrl).val();
        if (image != null) {
            $('#BackGroundDiv').css("height", "219", "width", "100%");
            $('#BackGroundDiv').css("background-image", "url(" + image + ")");
            $('#BackGroundDiv').css("background-repeat", "no-repeat");
            $('#BackGroundDiv').css("background-position-x", "0px");
            $('#BackGroundDiv').css("cursor", "move");
            $('#BackGroundDiv').css("background-size", "cover");
            $(".trade-form").attr("class", $(".trade-form").attr("class") + " success");
            $("#Butao").hide();
            $("#ButonUrl").hide();
            $("#MoveYourProfile").hide();
            $("#ButaoUrl2").show();
            $("#ButaoUrl3").show();
            AttachDragTo(true);
        }

    });
    $("#ButaoUrl2").on("click", function() {
        $('#BackGroundDiv').css("cursor", "alto");
        $("#Butao").show();
        $("#ButonUrl").show();
        $("#ButaoUrl2").hide();
        $("#ButaoUrl3").hide();
        $("#MoveYourProfile").show();
        var Po = $("#BackGroundDiv").css("background-position");
        var Image = $("#BackGroundDiv").css("background-image");
        AttachDragTo(false);
        $.post(routes.backXY, {
            P: Po,
            Back: Image
        }, function(data) {
            if (data.result) {
                showMessage("success", data.msg);
            } else {
                showMessage("error", data.msg);
            }
        });
    });

    $("#ButaoUrl3").on("click", function() {
        $('#BackGroundDiv').css("cursor", "alto");
        $("#Butao").show();
        $("#ButonUrl").show();
        $("#ButaoUrl2").hide();
        $("#ButaoUrl3").hide();
        $("#MoveYourProfile").show();
        AttachDragTo(false);
    });

    $("#SpanPBCancel").on("click", function() {
        dragElement(0, false);
        $('#MoveYourProfile').css("cursor", "alto");
        $("#ImgemFD").show();
        $("#Butao2").hide();
        $("#Butao").show();
    });

    $("#PosicaoPerfil").on("click", function() {
        dragElement(document.getElementById("MoveYourProfile"), true);
        $('#MoveYourProfile').css("cursor", "move");
        $("#ImgemFD").hide();
        $("#Butao2").show();
        $("#Butao").hide();
    });
    $("#SalvarPBS").on("click", function() {
        dragElement(0, false);
        $('#MoveYourProfile').css("cursor", "alto");
        $("#ImgemFD").show();
        $("#Butao2").hide();
        $("#Butao").show();
        var Left = $("#MoveYourProfile").css("left");
        var Top = $("#MoveYourProfile").css("top");
        $.post(routes.userXY, {
            x: Left,
            y: Top
        }, function(data) {
            if (data.result) {
                showMessage("success", data.msg);
            } else {
                showMessage("error", data.msg);
            }
        });
    });

    $("#ExibirMolduras").on("click", function() {
        if ($("#BExibirM").text() == "Ocultar") {
            $("#MoldurasLista").hide();
            $("#BExibirM").text("Exibir");
        } else {
            $("#MoldurasLista").show();
            $("#BExibirM").text("Ocultar");
        }
    });
});