<?php


use app\core\DbConnection;

$isAuthorized = true;

if (!$isAuthorized) {
    echo "Access denied. You are not authorized to view this page.";
    exit;
}

// Uključuje neophodne dependencies i konfiguracije
// Upit za preuzimanje podataka za analitiku



$connection = new DbConnection();

$resultFromDb = $connection->con()->query("SELECT naziv, kolicina, cena FROM biljke");


// Izdvoji podatke iz skupa rezultata i ubaci ih u nizove
$labels = [];
$quantities = [];
$prices = [];

while ($row = $resultFromDb->fetch_assoc())  {
    $labels[] = $row['naziv'];
    $quantities[] = $row['kolicina'];
    $prices[] = $row['cena'];
}

//var_dump(json_encode($labels));
//var_dump(json_encode($quantities)); exit;

?>
<!DOCTYPE html>
<html>
<head>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>Analitics</title>
</head>
<body>
<h1>Analytics of warehouse status</h1>

<canvas id="quantityChart" style="width: 100% !important; height: 400px !important;"></canvas>
<canvas id="priceChart" style="width: 100% !important; height: 400px !important;"></canvas>
<canvas id="combinedChart" style="width: 100% !important; height: 400px !important;"></canvas>

<script >
    var quantityChart = new Chart(document.getElementById("quantityChart"), {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($labels); ?>,
            datasets: [{
                label: 'Quantity',
                data: <?php echo json_encode($quantities); ?>,
                backgroundColor: 'rgba(54, 162, 235, 0.5)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: false,
            maintainAspectRatio: true,
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Quantity'
                    }
                },
                x: {
                    title: {
                        display: true,
                        text: 'Plant Name'
                    }
                }
            }
        }
    });

    // Generišite grafikon cena
    var priceChart = new Chart(document.getElementById("priceChart"), {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($labels); ?>,
            datasets: [{
                label: 'Price',
                data: <?php echo json_encode($prices); ?>,
                backgroundColor: 'rgba(255, 99, 132, 0.5)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: false,
            maintainAspectRatio: true,
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Price'
                    }
                },
                x: {
                    title: {
                        display: true,
                        text: 'Plant Name'
                    }
                }
            }
        }
    });

    //  Generiši kombinovani grafikon (linijski grafikon)
    var combinedChart = new Chart(document.getElementById("combinedChart"), {
        type: 'line',
        data: {
            labels: <?php echo json_encode($labels); ?>,
            datasets: [{
                label: 'Quantity',
                data: <?php echo json_encode($quantities); ?>,
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1,
                fill: false
            }, {
                label: 'Price',
                data: <?php echo json_encode($prices); ?>,
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1,
                fill: false
            }]
        },
        options: {
            responsive: false,
            maintainAspectRatio: true,
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Value'
                    }
                },
                x: {
                    title: {
                        display: true,
                        text: 'Plant Name'
                    }
                }
            }
        }
    });

</script>

</body>
</html>