<?php
session_start();
include "includes/auth.php";
include "includes/header-2.php";
?>
<section class="kati">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card my-4 text-black" style="border-radius: 25px;">
          <form class="mx-1 mx-md-4" method="post" action="includes/auth.php" enctype="multipart/form-data"> <!-- Added enctype for file upload -->
            <div class="card-body p-md-4">
              <div class="row justify-content-center">
                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                  <p class="text-center text-accent h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div data-mdb-input-init class="form-outline flex-fill mb-0">
                      <label class="form-label" for="fname">Name</label> 
                      <input type="text" class="form-control" name="fname" id="fname" /> 
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div data-mdb-input-init class="form-outline flex-fill mb-0">
                      <label class="form-label" for="email">Your Email</label> 
                      <input type="email" class="form-control" name="email" id="email" /> 
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div data-mdb-input-init class="form-outline flex-fill mb-0">
                      <label class="form-label" for="nin">NIN</label>
                      <input type="number" class="form-control" name="nin" id="nin" /> 
                    </div>
                  </div>

                </div>
                <div class="col-lg-6 justify-content-center order-1 order-lg-2">
                  <img src="assets/img/onboards.svg" class="img-fluid animated" alt="Sample image">
                </div>
              </div>
              <div class="row justify-content-center">
                <div class="col-md-10 col-lg-6 col-xl-5">

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fa-solid fa-phone fa-lg me-3 fa-fw"></i>
                    <div data-mdb-input-init class="form-outline flex-fill mb-0">
                      <label class="form-label" for="number">Mobile Number</label>
                      <input type="text" class="form-control" name="number" id="number" /> 
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-flag fa-lg me-3 fa-fw"></i>
                    <div data-mdb-input-init class="form-outline flex-fill mb-0">
                        <label class="form-label" for="state">State</label>
                        <select class="form-control" name="state" id="state" required>
                            <option value="">Select a state</option>
                            <?php foreach ($states as $state): ?>
                                <option value="<?php echo htmlspecialchars($state); ?>"><?php echo htmlspecialchars($state); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-location-crosshairs fa-lg me-3 fa-fw"></i>
                    <div data-mdb-input-init class="form-outline flex-fill mb-0">
                        <label class="form-label" for="localgov">Local Government</label>
                        <select class="form-control" name="localGov" id="localgov" required>
                            <option value="">Select a local government</option>
                        </select>
                    </div>
                </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fa-solid fa-screwdriver-wrench fa-lg me-3 fa-fw"></i>
                    <div data-mdb-input-init class="form-outline flex-fill mb-0">
                      <label class="form-label" for="skill">Who are you? <br> <span>Please select employer if you are a client</span></label> 
                      <select class="form-control" name="skill" id="skill">
                      <option>Select your work</option>
                      <?php foreach ($skiills as $skiill): ?>
                          <option value="<?php echo htmlspecialchars($skiill); ?>"><?php echo htmlspecialchars($skiill); ?></option>
                      <?php endforeach; ?>
                      </select>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-location-crosshairs fa-lg me-3 fa-fw"></i>
                    <div data-mdb-input-init class="form-outline flex-fill mb-0">
                      <label class="form-label" for="bio">Bio</label> 
                      <input type="text" class="form-control" name="bio" id="bio" /> 
                    </div>
                  </div>

                </div>
                <div class="col-lg-6 justify-content-center">

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="far fa-image fa-lg me-3 fa-fw"></i>
                    <div data-mdb-input-init class="form-outline flex-fill mb-0">
                      <label class="form-label" for="profile">Profile Picture</label> 
                      <input type="file" class="form-control" name="profile" id="profile" /> 
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                    <div data-mdb-input-init class="form-outline flex-fill mb-0">
                      <label class="form-label" for="password">Password</label> 
                      <input type="password" name="password" class="form-control" id="password" /> 
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                    <div data-mdb-input-init class="form-outline flex-fill mb-0">
                      <label class="form-label" for="confirm_password">Repeat your password</label> 
                      <input type="password" name="confirm_password" class="form-control" id="confirm_password" /> 
                    </div>
                  </div>

                  <div class="form-check d-flex justify-content-center">
                    <p>Already have an account? <a href="login.php">Login</a></p>
                  </div>

                  <div class="form-check d-flex justify-content-center mb-5">
                    <input class="form-check-input me-2" type="checkbox" value="" id="terms" require/> 
                    <label class="form-check-label" for="terms">
                      I agree to all statements in <a href="#!">Terms of service</a>
                    </label>
                  </div>

                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button type="submit" name="register" class="btn-action-lg">Register</button> 
                  </div>

                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

<?php
include "includes/script.php";
?>
