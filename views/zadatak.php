<div class="row">
    <div class="col-12">
        <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-capitalize ps-3">Welcome, choose your task</h6>
                </div>
            </div>
            <div class="card-body px-0 pb-2">
                <div class="table-responsive p-0">
                    <table class="table align-items-center justify-content-center mb-0">
                        <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Quantity</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Address</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Choose</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Employer</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody id="zadatak">

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="text-center">
                <button id="potvrdiBtn" class="btn btn-primary">Confirm</button>
            </div>
        </div>
    </div>
    <p class="mt-4 text-sm text-center">
        Da li zelite da kreirate zadatak?
        <br> </br>
        <a href="/administration/task1" class="text-primary text-gradient font-weight-bold">Create Task</a>
    </p>
</div>

<script>
    $(document).ready(function() {
        // Učitavanje izabranih zadataka iz localStorage prilikom učitavanja stranice
        var izabraniZadaci = JSON.parse(localStorage.getItem("izabraniZadaci")) || [];

        $.get("/api/administration/zadatak", function(result) {
            $.each(JSON.parse(result), function(i, item) {
                var checked = izabraniZadaci.includes("zadatak_" + i) ? "checked" : "";
                var rowClass = izabraniZadaci.includes("zadatak_" + i) ? "izabran" : "";

                $("#zadatak").append(
                    "<tr class='" + rowClass + "'>" +
                    "<td>" +
                    "<div class='d-flex px-2'>" +
                    "<div>" +
                    "<img src='../assets/img/small-logos/logo-asana.svg' class='avatar avatar-sm rounded-circle me-2' alt='spotify'>" +
                    "</div>" +
                    "<div class='my-auto'>" +
                    "<h6 class='mb-0 text-sm'>" + item.naziv + "</h6>" +
                    "</div>" +
                    "</div>" +
                    "</td>" +
                    "<td>" +
                    "<h6 class='mb-0 text-sm'>" + item.kolicina + "</h6>" +
                    "</td>" +
                    "<td>" +
                    "<h6 class='mb-0 text-sm'>" + item.adresa + "</h6>" +
                    "</td>" +
                    "<td class='align-middle'>" +
                    "<input type='checkbox' id='zadatak_" + i + "' " + checked + ">" +
                    "</td>" +
                    "<td>" +
                    "<h6 class='mb-0 text-sm'>" + item.email + "</h6>" +
                    "</td>" +
                    "</tr>"
                );
            });
        });

        // Postavljanje izabranih zadataka prilikom klika na checkbox
        $(document).on("change", "input[type='checkbox']", function() {
            var zadatakId = $(this).attr("id");
            var checked = $(this).is(":checked");

            if (checked) {
                izabraniZadaci.push(zadatakId);
            } else {
                izabraniZadaci = izabraniZadaci.filter(function(id) {
                    return id !== zadatakId;
                });
            }

            localStorage.setItem("izabraniZadaci", JSON.stringify(izabraniZadaci));
        });

        // Potvrda izbora zadatka
        $("#potvrdiBtn").click(function() {
            var checkedCount = izabraniZadaci.length;

            if (checkedCount > 0) {
                var potvrda = confirm("Are you sure you want to select " + checkedCount + " checked/on task/s?");
                if (potvrda) {
                    izabraniZadaci.forEach(function(zadatakId) {
                        $("#" + zadatakId).prop("disabled", true);
                    });

                    alert("You have successfully selected tasks:\n" + izabraniZadaci.join("\n"));
                }
            } else {
                alert("You have not selected any tasks.");
            }
        });
    });
</script>