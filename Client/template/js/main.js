$(document).on("ready", function(){

    showMessageTradeBan();
    //moved sidebar
    function movedSidebar() {
        var scroll_position = $(document).scrollTop();
        var header_height = $('.navbar').outerHeight();
        var $sidebar = $('.sidebar-right');
        if (scroll_position >= 0 && scroll_position < header_height) {
            $sidebar.css('padding-top', header_height - scroll_position);
        } else if (scroll_position >= header_height) {
            $sidebar.css('padding-top', 0);
        }
    }
    movedSidebar();
    $(window).on("scroll", function(){
        movedSidebar()
    });

    $('.trade-link').on('click', function() {
        $(this).hide();
        $(this).next().removeClass('hidden');
    });

    $('[data-toggle="tooltip"]').tooltip();

    $('.btn-open-menu').on('click', function() {
        $('body').toggleClass('show-navigation');
    });
    $('.btn-close-menu').on('click', function() {
        $('body').removeClass('show-navigation');
    });


    $('.sidebar-right [data-toggle="tab"]').on('shown.bs.tab', function (e) {
        localStorage.setItem('lastTab', $(this).attr('href'));
    });
    var lastTab = localStorage.getItem('lastTab');
    if (lastTab) {
        $('.sidebar-right [href="' + lastTab + '"]').tab('show');
    }


    //countdown
    $('[data-countdown]').each(function() {
        var $this = $(this);
        var finalDate = $this.data('countdown');
        $this.countdown(finalDate, function(event) {
            var format = '%H:%M:%S';

            if(event.offset.totalDays > 0) {
                format = '%-D Dias';
            } else if (event.offset.totalHours > 0) {
                format = '%H hr %M Minutos';
            } else if (event.offset.totalMinutes > 0) {
                format = '%M min %S Segundos';
            }

            function addZero(i) {
                if (i < 10) {
                  i = "0" + i;
                }
                return i;
              }
              
              
              function DataContada() {
                var date = '';
                var d = new Date();
                var h = addZero(d.getHours());
                var m = addZero(d.getMinutes());
                var s = addZero(d.getSeconds());
                var dd = d.getDate();
                var mm = d.getMonth()+1; 
                var yyyy = d.getFullYear();
              
              if(dd<10) {
                  dd='0'+dd;
              } 
              
              if(mm<10) {
                  mm='0'+mm;
              } 
              var date = yyyy+'/'+mm+'/'+dd+' '+h+ ":"+m+ ":"+s;
              return date
              }


if(DataContada() > finalDate){
    $this.html(event.strftime('A oportunidade passou :('));
}else{
            $this.html(event.strftime('Acaba Em '+format));
}
        });
    });


    hideItemsTable();
});

function hideItemsTable() {
    var $btn_hide_table = $('.btn-hide-table');
    var $show_text = $btn_hide_table.find('[data-show]');
    var $hide_text = $btn_hide_table.find('[data-hide]');
    var $table = $('[data-table]');
    $btn_hide_table.on('click', function() {
        if($show_text.is(':hidden')) {
            $show_text.show();
            $hide_text.hide();
            Cookies.set('hide_table', 1, { expires: 1 });
        } else {
            $show_text.hide();
            $hide_text.show();
            Cookies.remove('hide_table');
        }
        $table.toggle();
    });
    if(!Cookies.get('hide_table')) {
        $hide_text.show();
        $table.show();
    } else {
        $show_text.show();
    }
}
function showMessageTradeBan() {
    // new Noty({
    //     theme: 'mint',
    //     text: 'Some trades may come with the delay due to Valve\'s new update. For more information please follow us on twitter or email CSGOTeamFeedback@valvesoftware.com telling how you feel about the new update.',
    //     type: 'warning',
    //     layout: 'bottomRight',
    //     timeout: 500000,
    //     closeWith: ['click', 'button'],
    //     animation: {
    //         open: function (promise) {
    //             var n = this;
    //             Velocity(n.barDom, {
    //                 left: 450,
    //                 scaleY: 2
    //             }, {
    //                 duration: 0
    //             });
    //             Velocity(n.barDom, {
    //                 left: 0,
    //                 scaleY: 1
    //             }, {
    //                 easing: [ 8, 8 ],
    //                 complete: function() {
    //                     promise(function(resolve) {
    //                         resolve();
    //                     })
    //                 }
    //             });
    //         },
    //         close: function (promise) {
    //             var n = this;
    //             Velocity(n.barDom, {
    //                 left: '+=-50'
    //             }, {
    //                 easing: [ 8, 8, 2],
    //                 duration: 350
    //             });
    //             Velocity(n.barDom, {
    //                 left: 450,
    //                 scaleY: .2,
    //                 height: 0,
    //                 margin: 0
    //             }, {
    //                 easing: [ 8, 8 ],
    //                 complete: function () {
    //                     promise(function(resolve) {
    //                         resolve();
    //                     })
    //                 }
    //             });
    //         }
    //     }
    // }).show();
}
function showMessage(type, message) {
    if (message === undefined){
        message = "Service error";
        type = "error";
    }
    new Noty({
        theme: 'mint',
        text: message,
        type: type,
        layout: 'bottomRight',
        timeout: 5000,
        closeWith: ['click', 'button'],
        animation: {
            open: function (promise) {
                var n = this;
                Velocity(n.barDom, {
                    left: 450,
                    scaleY: 2
                }, {
                    duration: 0
                });
                Velocity(n.barDom, {
                    left: 0,
                    scaleY: 1
                }, {
                    easing: [ 8, 8 ],
                    complete: function() {
                        promise(function(resolve) {
                            resolve();
                        })
                    }
                });
            },
            close: function (promise) {
                var n = this;
                Velocity(n.barDom, {
                    left: '+=-50'
                }, {
                    easing: [ 8, 8, 2],
                    duration: 350
                });
                Velocity(n.barDom, {
                    left: 450,
                    scaleY: .2,
                    height: 0,
                    margin: 0
                }, {
                    easing: [ 8, 8 ],
                    complete: function () {
                        promise(function(resolve) {
                            resolve();
                        })
                    }
                });
            }
        }
    }).show();

    return false;
}

(function() {
    $(document).mouseleave(function (e) {
        if (!Cookies.get('modalDiscount') == true && e.clientY<=0) {
            $('#modal-discount').modal('show');
            Cookies.set('modalDiscount', 'true');
        }
    });
})();
