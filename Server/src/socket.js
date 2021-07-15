module.exports = function(io, lowDBController)
{
    var UsersOnline = 0
    io.sockets.on('connect', function(socket)
    {
        UsersOnline++;
        tto =      lowDBController.sstss.value()[0].totalcasesopen;
        usuario =  lowDBController.sstss.value()[0].usersco;
        lens =     lowDBController.sstss.value()[0].moneyhouse;
        melhor =   lowDBController.sstss.value()[0].besatn;
        imgm =     lowDBController.sstss.value()[0].beastimg;
        bnr =      lowDBController.sstss.value()[0].beastbanner;
        mdl =      lowDBController.sstss.value()[0].beastframe;
        usuario2 = lowDBController.sstss.value()[0].TotalSessions;

        io.sockets.emit('stats',
        {
            _usersTotal:       usuario,
            _casesOpenedTotal: tto,
            _casesOpenedToday: lens,
            _usersOnline:      UsersOnline,
            _beastuser:        melhor,
            _beastuserimg:     imgm,
            _beastuserbanner:  bnr,
            _beastuserframe:   mdl
        });

        socket.on('disconnect', function()
        {
            UsersOnline--;
            io.sockets.emit('stats',
            {
                _usersTotal:       usuario,
                _casesOpenedTotal: tto,
                _casesOpenedToday: lens,
                _usersOnline:      UsersOnline,
                _beastuser:        melhor,
                _beastuserimg:     imgm,
                _beastuserbanner:  bnr,
                _beastuserframe:   mdl
            });
        });
        //console.log(lowDBController.drops)
        io.sockets.emit('padrao', lowDBController.drops);

    });
}