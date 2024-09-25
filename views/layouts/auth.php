<!--
=========================================================
* Material Dashboard 2 - v3.0.4
=========================================================

* Product Page: https://www.creative-tim.com/product/material-dashboard
* Copyright 2022 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <title>
        Material Dashboard 2 by Creative Tim
    </title>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <!-- Nucleo Icons -->
    <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <!-- CSS Files -->
    <link id="pagestyle" href="../assets/css/material-dashboard.css?v=3.0.4" rel="stylesheet" />
    <script

            src="https://code.jquery.com/jquery-3.6.3.min.js"
            integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU="
            crossorigin="anonymous"></script>

    <style>

        .chat-sign-button {
            width: 60px;
            height: 60px;
            background-color: #007bff;
            font-size: 20px;
            color: white;
            border: none;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
        }

        #chat-widget-button i {
            font-size: 24px; /* Velicina ikonice unutar dugmeta */
        }

        #chat-widget {
            width: 350px; /* Pocetna sirina kartice */
            height: 500px; /* Pocetna visina kartice */
            bottom: 130px;
            right: 20px;
            position: fixed;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            overflow: hidden;
            transition: all 0.3s ease; /* Animacija prelaza */
            display: flex;
            flex-direction: column;
            border-radius: 30px; /* Zaobljene ivice kartice */
        }

        #chat-widget .card-body {
            height: calc(100% - 80px); /* Visina kartice minus */
            overflow-y: auto; /*Vertikalno skrolovanje */
            position: relative; /* Potrebno za pozicioniranje indikatora kucanja, hocu da ga smestim dole, sve mi se prikazuje gore i ne svidja mi se */
        }

        /* Stil za indikaciju kucanja */
        .typing-indicator {
            display: none; /* Sakrij indikator inicijalno */
            font-size: 16px;
            color: #888;
            position: absolute;
            bottom: 10px; /* Ovo bi trebalo da resi da ga prikazuje dole */
            left: 10px; /* Pozicioniraj dole levo */
            display: flex;
            justify-content: center; /* Centriraj tačkice */
        }

        .typing-indicator span {
            display: inline-block;
            width: 10px;
            height: 10px;
            margin-right: 5px;
            border-radius: 50%;
            background: #007bff;
            animation: typing 1.5s infinite;
        }

        .typing-indicator span:nth-child(2) {
            animation-delay: 0.2s;
        }

        .typing-indicator span:nth-child(3) {
            animation-delay: 0.4s;
        }

        @keyframes typing {
            0% { opacity: 0; }
            50% { opacity: 1; }
            100% { opacity: 0; }
        }

        /* Stil za poruke */
        .message {
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 10px;
            max-width: 80%;
            clear: both;
            position: relative;
        }

        /* Stil za poruke korisnika */
        .user-message {
            background-color: #007bff;
            color: white;
            text-align: left; /* Poruka korisnika levo */
            margin-left: 0; /* Poruka korisnika na levoj strani */
            margin-right: auto; /* Automatsko poravnanje poruke na levo */
            display: flex;
            align-items: center;
        }

        /* Ikona korisnika */
        .user-message i {
            font-size: 20px; /* Veličina ikone */
            margin-right: 10px; /* Razmak između ikone i teksta */
        }

        /* Stil za poruke bota */
        .bot-message {
            background-color: #f1f1f1;
            color: #333;
            text-align: left; /* Poruka bota levo */
            margin-left: auto; /* Automatsko poravnanje poruke na desnu stranu */
            margin-right: 0; /* Poruka bota na desnoj strani */
            position: relative; /* Potrebno za pozicioniranje ikone bota */
            padding-left: 50px; /* Povećanje leve strane zbog ikone */
        }

        /* Ikonica bota */
        .bot-message-icon {
            position: absolute;
            top: 10px;
            left: 10px;
        }

        /* Velicina ikonice bota */
        .bot-message-icon i {
            font-size: 20px; /* Velicina ikonicee */
            margin-right: 5px; /* Razmak između ikonice i teksta */
        }

        .card-header {
            background-color: #007bff !important;
            color: white !important;
        }

        /* Stil za ikonicu u header-u */
        .card-header i {
            font-size: 35px;
            margin-right: 5px;
        }

        .card-footer {
            display: flex;
            justify-content: center; /* Poravnaj input u centru */
            padding: 0; /* Ukloni padding */
            background-color: #f8f9fa;
            border-bottom-left-radius: 30px; /* Zaobljenje donjeg levog ugla */
            border-bottom-right-radius: 30px; /* Isto samo desnog ugla */
        }

        #chat-widget-input {
            width: 100%; /* Povecacu input da zauzima celu širinu */
            border-radius: 25px; /* Ovalne ivice */
            border: 1px solid #ced4da; /* Sivi okvir, hocu bolju bolju, mada se ne vidi nesto lepo, ali je prijatnije */
            padding: 10px 15px; /* Malo veci padding za bolji izgled */
            box-sizing: border-box;
        }
    </style>
</head>

<body class="bg-gray-200">
<div class="container position-sticky z-index-sticky top-0">
    <div class="row">
        <div class="col-12">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg blur border-radius-xl top-0 z-index-3 shadow position-absolute my-3 py-2 start-0 end-0 mx-4">
                <div class="container-fluid ps-2 pe-0">
                    <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 " href="/">
                        Plant Company
                    </a>
                    <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon mt-2">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </span>
                    </button>
                    <div class="collapse navbar-collapse" id="navigation">
                        <ul class="navbar-nav me=1 ms-auto">
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center me-2 active" aria-current="page" href="/administration/users">
                                    <i class="fa fa-chart-pie opacity-6 text-dark me-1"></i>
                                    Dashboard
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link me-2" href="/registration">
                                    <i class="fas fa-user-circle opacity-6 text-dark me-1"></i>
                                    Register Now
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link me-2" href="/login">
                                    <i class="fas fa-key opacity-6 text-dark me-1"></i>
                                    Login
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link me-2" href="/about">
                                    <i class="fas fa-user-circle opacity-6 text-dark me-1"></i>
                                    About us
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
        </div>
    </div>
</div>
<main class="main-content  mt-0">
    <div class="page-header align-items-start min-vh-100" style="background-image: url('https://static.vecteezy.com/system/resources/previews/004/898/759/large_2x/green-computing-green-technology-green-it-csr-and-it-ethics-concept-photo.jpg');">
        <span class="mask bg-gradient-dark opacity-6"></span>
        <div class="col-md-8 mt-10 ms-12 ">
{{ renderPartialView }}
        </div>
        <footer class="footer position-absolute bottom-2 py-2 w-100">
            <div class="container">
                <div class="row align-items-center justify-content-lg-between">
                    <div class="col-12 col-md-6 my-auto">
                        <div class="copyright text-center text-sm text-white text-lg-start">
                            © <script>
                                document.write(new Date().getFullYear())
                            </script>,
                            made with <i class="fa fa-heart" aria-hidden="true"></i> by
                            <a href="https://www.creative-tim.com" class="font-weight-bold text-white" target="_blank">Creative Tim</a>
                            for a better web.
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <div class="container">
            <!-- Dugme za pokretanje ceta -->
            <button id="chat-widget-button" type="button"
                    class="btn btn-danger rounded-circle position-fixed chat-sign-button" style="background-color: #007bff; color: white; border: none; bottom: 50px; right: 50px;">
                <i class="fas fa-comments"></i>
            </button>

            <!-- Sadrzaj ceta -->
            <div id="chat-widget" class="card position-fixed shadow d-none">
                <div class="card-header bg-primary text-white">
                    <i class="fa-brands fa-bots"></i>
                    <button id="chat-widget-close-button" type="button" class="btn-close float-end"
                            aria-label="Zatvori"></button>
                </div>

                <!-- Mesto prikazivanja poruka -->
                <div class="card-body" id="chat-widget-messages">
                    <!-- Indikacija kucanja tu je zovem valjda -->
                    <div id="typing-indicator" class="typing-indicator">
                        <span></span><span></span><span></span>
                    </div>
                </div>

                <div class="card-footer">
                    <input type="text" class="form-control" id="chat-widget-input" placeholder="Send message">
                </div>
            </div> <!-- Kraj ceta -->
        </div>

    </div>
</main>
<!--   Core JS Files   -->
<script src="../assets/js/core/popper.min.js"></script>
<script src="../assets/js/core/bootstrap.min.js"></script>
<script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
<script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>

<script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
            damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
</script>
<!-- Github buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
<script src="../assets/js/material-dashboard.min.js?v=3.0.4"></script>


<script>
    $(document).ready(function () {
        $("#chat-widget-button").on("click", function () {
            $("#chat-widget").toggleClass("d-none");
            hideTypingIndicator(); // Sakrij indikator kucanja kada se otvori chatbot
        });

        $("#chat-widget-close-button").on("click", function () {
            $("#chat-widget").addClass("d-none");
            hideTypingIndicator(); // Sakrij indikator kucanja kada se zatvori chatbot
        });

        function scrollToBottom() {
            const messages = $("#chat-widget-messages");
            messages.scrollTop(messages[0].scrollHeight);
        }

        function showTypingIndicator() {
            $("#typing-indicator").show();
            scrollToBottom(); // Skroluj do dna da bi se indikator prikazao
        }

        function hideTypingIndicator() {
            $("#typing-indicator").hide();
        }

        $("#chat-widget-input").keypress(function (event) {
            if (event.which === 13) {
                let userMessage = $("#chat-widget-input").val();
                $("#chat-widget-input").val("");

                $("#chat-widget-messages").append(`
                        <div class="message user-message">
                            <i class="fa-regular fa-user"></i> ${userMessage}
                        </div>
                    `);
                scrollToBottom();

                // Dodaj indikator kucanja odmah ispod user poruke btw 13 je enter ako se ne varam
                showTypingIndicator();

                $.ajax({
                    type: "POST",
                    url: "http://localhost:5005/webhooks/rest/webhook",
                    contentType: "application/json",
                    data: JSON.stringify({ message: userMessage }),
                    success: function(data){
                        setTimeout(function() {
                            let botResponse = data[0].text;
                            console.log(botResponse);
                            $("#chat-widget-messages").append(`
                                    <div class="message bot-message">
                                        <div class="bot-message-icon">
                                            <i class="fa-solid fa-robot"></i>
                                        </div>
                                        ${botResponse}
                                    </div>
                                `);
                            scrollToBottom();
                            hideTypingIndicator();                                                                          // Sakrij indikator kucanja nakon što bot odgovori
                        }, 1000);                                                                                           // Simuliraj kašnjenje od 1 sekunde
                    },
                    error: function() {
                        hideTypingIndicator();                                                                              // Sakrij indikator kucanja u slučaju greske
                    }
                });
            }
        });
    });
</script>

</body>

</html>