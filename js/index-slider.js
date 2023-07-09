    $("#slideshow > span:gt(0)").hide();

    setInterval(function() {
    $('#slideshow > span:first')
        .fadeOut(1000)
        .next()
        .fadeIn(1000)
        .end()
        .appendTo('#slideshow');
    }, 5000);
//5000(5 saniye) yazan kısım 10000 (10 saniye) olarak değiştirilecek.