<?php
/** @var $params \app\models\RegistrationModel
 */                                            // a sami podaci su preneti preko partialView
                                               //parametar ce biti tipa RegisterModel, samo da bi editor mogao da prepozna odredjene podatke unutar ovog param

    ?>
            <div class="row">
                <div class="col-lg-4 col-md-8 col-12 mx-auto">
                    <div class="card z-index-0 fadeIn3 fadeInBottom">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                                <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Registration</h4>
                                <div class="row mt-3">
                                    <div class="col-2 text-center ms-auto">
                                        <a class="btn btn-link px-3" href="javascript:;">
                                            <i class="fa fa-facebook text-white text-lg"></i>
                                        </a>
                                    </div>
                                    <div class="col-2 text-center px-1">
                                        <a class="btn btn-link px-3" href="javascript:;">
                                            <i class="fa fa-github text-white text-lg"></i>
                                        </a>
                                    </div>
                                    <div class="col-2 text-center me-auto">
                                        <a class="btn btn-link px-3" href="javascript:;">
                                            <i class="fa fa-google text-white text-lg"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action = "/registrationProcess" method = "post" role="form">
                                <div class="input-group input-group-outline my-3">
                                    <label class="form-label"></label>
                                    <input type="text" class="form-control" name="ime" placeholder="Name">
                                    <?php
                                    if ($params !== null && $params->errors !== null)
                                    {
                                        foreach ($params->errors as $objectNum => $item) {

                                            if ($objectNum == "ime")
                                            {
                                                echo "<span class='text-danger'>$item[0]</span>";
                                            }
                                        }
                                    }
                                    ?>
                                </div>
                                <div class="input-group input-group-outline my-3">
                                    <label class="form-label"></label>
                                    <input type="text" class="form-control" name="prezime" placeholder="Surname">
                                    <?php
                                    if ($params !== null && $params->errors !== null)
                                    {
                                        foreach ($params->errors as $objectNum => $item) {

                                            if ($objectNum == "prezime")
                                            {
                                                echo "<span class='text-danger'>$item[0]</span>";
                                            }
                                        }
                                    }
                                    ?>
                                </div>
                                <div class="input-group input-group-outline my-3">
                                    <label class="form-label"></label>
                                    <input type="email" class="form-control" name="email" placeholder="Email">
                                    <?php
                                    if ($params !== null && $params->errors !== null)
                                    {
                                        foreach ($params->errors as $objectNum => $item) {

                                            if ($objectNum == "email")
                                            {
                                                echo "<span class='text-danger'>$item[0]</span>";
                                            }
                                        }
                                    }
                                    ?>
                                </div>
                                <div class="input-group input-group-outline mb-3">
                                    <label class="form-label"></label>
                                    <input type="password" class="form-control" name="password" placeholder="Password">
                                    <?php
                                    if ($params !== null && $params->errors !== null)
                                    {
                                        foreach ($params->errors as $objectNum => $item) {

                                            if ($objectNum == "password")
                                            {
                                                echo "<span class='text-danger'>$item[0]</span>";
                                            }
                                        }
                                    }
                                    ?>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2">Register Now</button>
                                </div>
                                <p class="mt-4 text-sm text-center">
                                    You have already an account?
                                    <a href="/login" class="text-primary text-gradient font-weight-bold">Login</a>
                                </p>
                            </form>
                        </div>
                        </div>
                        </div>
                        </div>