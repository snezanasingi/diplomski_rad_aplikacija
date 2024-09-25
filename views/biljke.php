<div class="row">
    <div class="col-12">
        <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-capitalize ps-3">Warehouse</h6>
                </div>
            </div>
<div class="card-body px-0 pb-2">
    <div class="table-responsive p-0">
        <table class="table align-items-center justify-content-center mb-0">
            <thead>
            <tr>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Quantity</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Price</th>
                <th></th>
            </tr>
            </thead>
            <tbody id = "plants">

            </tbody>
        </table>
                         </div>
                    </div>
                </div>
            </div>
        </div>
<script>
    $(document).ready(function() {
        $.get("/api/administration/biljke", function(result) {
            $.each(JSON.parse(result), function(i, item) {
                $("#plants").append(
                    "<tr>" +
                    "<td>" +
                    "<div class='d-flex px-2'>" +
                    "<div>" +
                    "<img src='../assets/img/small-logos/logo-asana.svg' class='avatar avatar-sm rounded-circle me-2' alt='spotify'>" +
                    "</div>" +
                    "<div class='my-auto'>" +
                    "<h6 class='mb-0 text-sm'>" + item.naziv + " </h6>" +
                    "</div>" +
                    "</div>" +
                    "</td>" +
                    "<td>" +
                    "<h6 class='mb-0 text-sm'>" + item.kolicina + " </h6>" +
                    "</td>" +
                    "<td>" +
                    "<h6 class='mb-0 text-sm'>" + item.cena +  " </h6>" +
                    "</td>" +
                    "<td class='align-middle'>" +
                    "</td>" +
                    "</tr>"
                );
            });
        });
    });
</script>