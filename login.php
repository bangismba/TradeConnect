<?php


session_start();

include "includes/auth.php";
include "includes/header-2.php";

?>


<section class="kati">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card my-4" style="border-radius: 25px;">
          <div class="card-body p-md-4">
            <div class="row justify-content-center">
              <div class="col-md-8 col-lg-6 col-xl-5 order-2 order-lg-1">

                <p class="text-center text-accent h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">login</p>

                <form class="mx-1 mx-md-4" method="post">

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div data-mdb-input-init class="form-outline flex-fill mb-0">
                      <label class="form-label" for="form3Example3c">Your Email</label>
                      <input type="email" id="form3Example3c" name="email" class="form-control" />
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                    <div data-mdb-input-init class="form-outline flex-fill mb-0">
                      <label class="form-label" for="form3Example4c">Password</label>
                      <input type="password" name="password" id="form3Example4c" class="form-control" />
                    </div>
                  </div>

                  <div class="form-check d-flex justify-content-center">
                    <p>Don't have and account? <a href="register.php">Signup</a></p>
                  </div>
                  <div class="form-check d-flex justify-content-center mb-5">
                    <a href="register.php">Forgot Password</a>
                  </div>

                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button  type="submit" data-mdb-button-init data-mdb-ripple-init class="btn-action-lg" name="login">Login</button>
                  </div>

                </form>

              </div>
              <div class="col-md-8 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                <img src="assets/img/workers_tools.png"
                  class="img-fluid animated" alt="Sample image">

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php
// include "footer.php";
include "includes/script.php";

?>