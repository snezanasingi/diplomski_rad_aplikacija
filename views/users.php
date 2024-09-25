
<div class="row">
    <div class="col-12">
        <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-capitalize ps-3">Plant Company Employees</h6>
                </div>
            </div>
            <div class="card-body px-0 pb-2">
                <div class="table-responsive p-0">
                    <table class="table align-items-center justify-content-center mb-0">
                        <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Employees</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Shift</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Status</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">Completion</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody id = "users">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
        $(document).ready(function (){    //f-ja dolazi iz JQuery, nemam pojma kako ovo detaljno funkcionise nzm mozda je l je sve ucitano
            $.get("/api/administration/users", function(result) {
                //console.log(result);
                $.each(JSON.parse(result),function(i, item) {
                    $("#users").append(    //da bih prosirila
                        "<tr>" +
                        "<td>" +
                        "<div class='d-flex px-2'>" +
                        "<div>" +
                        "<img src='../assets/img/small-logos/devto.svg' class='avatar avatar-sm rounded-circle me-2' alt= 'xd'> " +
                    "</div>" +
                    "<div class='my-auto'>" +
                    "<h6 class='mb-0 text-sm'>" + item.ime + " " + item.prezime + " </h6>" +
                    "</div>" +
                    "</div>" +
                    "</td>" +
                    "<td>" +
                    "<p class='text-sm font-weight-bold mb-0'>prva</p>" +
                    "</td>" +
                    "<td>" +
                    "<span class='text-xs font-weight-bold'>done</span>" +
                    "</td>" +
                    "<td class='align-middle text-center'>" +
                    "<div class='d-flex align-items-center justify-content-center'>" +
                    "<span class='me-2 text-xs font-weight-bold'>100%</span>" +
                    "<div>" +
                    "<div class='progress'>" +
                    "<div class='progress-bar bg-gradient-success' role='progressbar' aria-valuenow='100' aria-valuemin='0' aria-valuemax='100' style='width:100%';'></div>" +
                    "</div>" +
                    "</div>" +
                    "</div>" +
                    "</td>" +
                    "<td class='align-middle'>" +
                    "<button class='btn btn-link text-secondary mb-0' aria-haspopup='true' aria-expanded='false'>" +
                    "<i class='fa fa-ellipsis-v text-xs'></i>" +
                    "</button>" +
                    "</td>" +
                    "</tr>"
                     );
                });
            });
        });
</script>
