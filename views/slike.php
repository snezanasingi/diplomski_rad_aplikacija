<!DOCTYPE html>
<html>

<body>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
    * {box-sizing: border-box}
    body {font-family: Verdana, sans-serif; margin:0}
    .mySlides {display: none}
    img {vertical-align: middle;}

    /* Slideshow container */
    .slideshow-container {
        max-width: 1100px;
        position: relative;
        margin: auto;
    }

    /* Next & previous buttons */
    .prev, .next {
        cursor: pointer;
        position: absolute;
        top: 50%;
        width: auto;
        padding: 16px;
        margin-top: -22px;
        color: white;
        font-weight: bold;
        font-size: 18px;
        transition: 0.6s ease;
        border-radius: 0 3px 3px 0;
        user-select: none;
    }

    /* Position the "next button" to the right */
    .next {
        right: 0;
        border-radius: 3px 0 0 3px;
    }

    /* On hover, add a black background color with a little bit see-through */
    .prev:hover, .next:hover {
        background-color: rgba(0,0,0,0.8);
    }

    /* Caption text */
    .text {
        bold color: #000003;
        font-size: 15px;
        padding: 8px 12px;
        position: absolute;
        bottom: 8px;
        width: 100%;
        text-align: center;
    }

    /* Number text (1/3 etc) */
    .numbertext {
        color: #f2f2f2;
        font-size: 12px;
        padding: 8px 12px;
        position: absolute;
        top: 0;
    }

    /* The dots/bullets/indicators */
    .dot {
        cursor: pointer;
        height: 15px;
        width: 15px;
        margin: 0 2px;
        background-color: #bbb;
        border-radius: 50%;
        display: inline-block;
        transition: background-color 0.6s ease;
    }

    .active, .dot:hover {
        background-color: #717171;
    }

    /* Fading animation */
    .fade {
        animation-name: fade;
        animation-duration: 1.5s;
    }

    @keyframes fade {
        from {opacity: .4}
        to {opacity: 1}
    }

    /* On smaller screens, decrease text size */
    @media only screen and (max-width: 300px) {
        .prev, .next,.text {font-size: 11px}
    }
</style>
</body>
<body>

<div class="slideshow-container">

    <div class="mySlides fade">
        <div class="numbertext">1 / 10</div>
        <img src="https://shop.beobasta.rs/wp-content/uploads/2021/02/shutterstock_711063376-1.jpg" style="width:100%">
        <div class="text">Mint</div>
    </div>

    <div class="mySlides fade">
        <div class="numbertext">2 / 10</div>
        <img src="https://www.magazin.novosti.rs/upload/Article/Image/2021_09/1631095266_tea-5326195_1920.jpg" style="width:100%">
        <div class="text">Chamomile</div>
    </div>

    <div class="mySlides fade">
        <div class="numbertext">3 / 3</div>
        <img src="https://dietx.rs/wp-content/uploads/2020/11/caj-od-hibiskusa-u-solji-pored-crvenog-cveta.jpg" style="width:100%">
        <div class="text">Hibiscus</div>
    </div>
    <div class="mySlides fade">
        <div class="numbertext">4 / 10</div>
        <img src="https://www.adiva.hr/wp-content/uploads/2019/01/Aronija.jpg" style="width:100%">
        <div class="text">Aronia</div>
    </div>
    <div class="mySlides fade">
        <div class="numbertext">5 / 10</div>
        <img src="https://stil.kurir.rs/data/images/2019/04/09/09/188781_shutterstock-1019653432_ls.jpg" style="width:100%">
        <div class="text">Balm</div>
    </div>
    <div class="mySlides fade">
        <div class="numbertext">6 / 10</div>
        <img src="https://nova.rs/wp-content/uploads/2021/04/1619797145-shutterstock_148760534-1200x800.jpg" style="width:100%">
        <div class="text">Nettles</div>
    </div>
    <div class="mySlides fade">
        <div class="numbertext">7 / 10</div>
        <img src="https://stil.kurir.rs/data/images/2014/10/13/20/49695_caj-od-sipurka_share.jpg" style="width:100%">
        <div class="text">Dog rose</div>
    </div>
    <div class="mySlides fade">
        <div class="numbertext">8 / 10</div>
        <img src="https://eklinika.telegraf.rs/wp-content/uploads/2020/08/shutterstock_702364171-scaled.jpg" style="width:100%">
        <div class="text">Klamath weed</div>
    </div>
    <div class="mySlides fade">
        <div class="numbertext">9 / 10</div>
        <img src="https://ocdn.eu/pulscms-transforms/1/jR5k9kpTURBXy9mMzk0MDkyZjI5NzgyZTI2YjhmNWVkZTFmYWFlMGJlNC5qcGeRkwLNAp4A3gABoTAF" style="width:100%">
        <div class="text">Satureia</div>
    </div>
    <div class="mySlides fade">
        <div class="numbertext">10 / 10</div>
        <img src="https://eklinika.telegraf.rs/wp-content/uploads/2021/12/27/trnjine-shutterstock_1476243824-910x728.jpg" style="width:100%">
        <div class="text">Thorn</div>
    </div>
    <a class="prev" onclick="plusSlides(-1)">❮</a>
    <a class="next" onclick="plusSlides(1)">❯</a>

</div>
<br>

<div style="text-align:center">
    <span class="dot" onclick="currentSlide(1)"></span>
    <span class="dot" onclick="currentSlide(2)"></span>
    <span class="dot" onclick="currentSlide(3)"></span>
</div>

<script>
    let slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
        showSlides(slideIndex += n);
    }

    function currentSlide(n) {
        showSlides(slideIndex = n);
    }

    function showSlides(n) {
        let i;
        let slides = document.getElementsByClassName("mySlides");
        let dots = document.getElementsByClassName("dot");
        if (n > slides.length) {slideIndex = 1}
        if (n < 1) {slideIndex = slides.length}
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex-1].style.display = "block";
        dots[slideIndex-1].className += " active";
    }
</script>

</body>
</html>


</body>
</html>


</body>
