<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>GLINTWISE INDIA</title>
  <link rel="icon" type="image/png" href="assets/images/logo.svg">

  <!-- Bootstrap CSS -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/media.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <!-- Swiper CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />


  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.3/dist/sweetalert2.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.3/dist/sweetalert2.min.css">

  <script src="https://cdn.jsdelivr.net/npm/@emailjs/browser@4/dist/email.min.js"></script>
  <script>
    (function() {
      emailjs.init("service_akdvear");
    })();
  </script>
</head>

<body>

  <header>
    <div class="container">
      <div class="navbar">

        <!-- Logo -->
        <a href="#" class="logo">
          <img src="assets/images/logo.png" alt="Logo">
        </a>

        <!-- Navigation Menu (Desktop) -->
        <nav class="nav-links">
          <a href="index.php">Home</a>
          <a href="about-us.php">About Us</a>
          <a href="services.php">Services</a>
          <a href="contactus.php">Contact Us</a>
        </nav>

        <!-- Menu Button for Mobile -->
        <button id="menu-btn" class="menu-icon">&#9776;</button>

      </div>
    </div>
  </header>

  <!-- Off-Canvas Mobile Menu -->
  <div id="mobile-menu" class="mobile-menu">
    <button id="close-menu" class="close-btn">&times;</button>
    <nav>
      <a href="index.php">Home</a>
      <a href="about-us.php">About Us</a>
      <a href="services.php">Services</a>
      <a href="contactus.php">Contact Us</a>
    </nav>
  </div>

  <div id="customToast" class="custom-toast">
  <span id="toastMessage"></span>
  <button onclick="hideToast()">×</button>

 
</div>

  <style>
    /* Custom modal width */
    .custom-modal {
      max-width: 90vw;
      /* Adjust width as needed */
      width: 70vw;
    }
  </style>

  <!-- Modal -->
  <div class="modal fade" id="carModal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered  custom-modal"> <!-- Large modal -->
      <div class="modal-content">

        <div class="modal-body"><img src="assets/images/close.png" class="form_close" onclick="closeModalcar()" aria-label="Close" />

          <script>
            function closeModalcar() {
              var modal = document.getElementById('carModal');
              var modalInstance = bootstrap.Modal.getInstance(modal);
              modalInstance.hide();
            }
          </script>

          <div class="container-fluid">
            <div class="row">

              <div class="col-lg-6 p-0 d-flex align-items-center justify-content-center bg_popup" style="min-height: 400px;">
                <!-- <img src="assets/images/carwash.png" alt=""> -->
              </div>

              <!-- Right Column (Form) -->
              <div class="col-lg-6">
                <div class="form_section">
                  <div class="form_content">
                    <h4 class="form_title">Hello</h4>
                    <p class="form_subtitle">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna</p>
                  </div>
                  <form id="myForm1"> 
                  <input type="hidden" name="formId" value="form1">
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="mb-3">
                          <label class="form-label">First Name</label>
                          <input type="text" name="firstName" class="form-control" required>
                        </div>
                      </div>

                      <div class="col-lg-6">
                        <div class="mb-3">
                          <label class="form-label">Last Name</label>
                          <input type="text" name="lastName" class="form-control" required>
                        </div>

                      </div>
                      <div class="col-lg-12">
                        <div class="mb-3">
                          <label class="form-label">Phone</label>
                          <input type="text" name="phone" class="form-control" required>
                        </div>
                      </div>
                      <div class="col-lg-12">
                        <div class="mb-3">
                          <label class="form-label">Email</label>
                          <input type="email" name="email" class="form-control" required>
                        </div>
                      </div>

                      <div class="col-lg-12">
                        <div class="mb-3">
                          <label class="form-label">Address</label>
                          <input type="text" name="address" class="form-control" required>
                        </div>
                      </div>

                      <div class="col-lg-6">
                        <div class="mb-3">
                          <label class="form-label">City/Town</label>
                          <input type="text" name="city" class="form-control" required>
                        </div>
                      </div>

                      <div class="col-lg-6">
                        <div class="mb-3">
                          <label class="form-label">Postcode</label>
                          <input type="text" name="postcode" class="form-control" required>
                        </div>
                      </div>

                      <div class="col-lg-6">
                        <div class="mb-3">
                          <label class="form-label">Vehicle Name</label>
                          <input type="text" name="vehicleName" class="form-control" required>
                        </div>
                      </div>

                      <div class="col-lg-6">

                        <div class="mb-3">
                          <label class="form-label">Vehicle Model</label>
                          <input type="text" name="vehicleModel" class="form-control" required>
                        </div>
                      </div>

                      <div class="col-lg-12">
                        <button type="submit" class="btn btn-form1  w-100">Submit</button>
                      </div>

                    </div>
                  </form>
           


                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal -->
  <div class="modal fade" id="bikeModal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered  custom-modal"> <!-- Large modal -->
      <div class="modal-content">

        <div class="modal-body"><img src="assets/images/close.png" class="form_close" onclick="closeModal()" aria-label="Close" />

          <script>
            function closeModal() {
              var modal = document.getElementById('bikeModal');
              var modalInstance = bootstrap.Modal.getInstance(modal);
              modalInstance.hide();
            }
          </script>

          <div class="container-fluid">
            <div class="row">

              <div class="col-lg-6 d-flex align-items-center justify-content-center bg_popup1" style="min-height: 400px;">

              </div>

              <!-- Right Column (Form) -->
              <div class="col-lg-6">
                <div class="form_section">
                  <div class="form_content">
                    <h4 class="form_title">Book Now</h4>
                    <p class="form_subtitle">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna</p>
                  </div>
                  <form id="myForm">
                  <input type="hidden" name="formId" value="form2">
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="mb-3">
                          <label class="form-label">First Name</label>
                          <input type="text" name="firstName" class="form-control" required>
                        </div>
                      </div>

                      <div class="col-lg-6">
                        <div class="mb-3">
                          <label class="form-label">Last Name</label>
                          <input type="text" name="lastName" class="form-control" required>
                        </div>
                      </div>

                      <div class="col-lg-12">
                        <div class="mb-3">
                          <label class="form-label">Phone</label>
                          <input type="text" name="phone" class="form-control" required>
                        </div>
                      </div>

                      <div class="col-lg-12">
                        <div class="mb-3">
                          <label class="form-label">Email</label>
                          <input type="email" name="email" class="form-control" required>
                        </div>
                      </div>

                      <div class="col-lg-12">
                        <div class="mb-3">
                          <label class="form-label">Address</label>
                          <input type="text" name="address" class="form-control" required>
                        </div>
                      </div>

                      <div class="col-lg-6">
                        <div class="mb-3">
                          <label class="form-label">City/Town</label>
                          <input type="text" name="city" class="form-control" required>
                        </div>
                      </div>

                      <div class="col-lg-6">
                        <div class="mb-3">
                          <label class="form-label">Postcode</label>
                          <input type="text" name="postcode" class="form-control" required>
                        </div>
                      </div>

                      <div class="col-lg-6">
                        <div class="mb-3">
                          <label class="form-label">Vehicle Name</label>
                          <input type="text" name="vehicleName" class="form-control" required>
                        </div>
                      </div>

                      <div class="col-lg-6">
                        <div class="mb-3">
                          <label class="form-label">Vehicle Model</label>
                          <input type="text" name="vehicleModel" class="form-control" required>
                        </div>
                      </div>

                      <div class="col-lg-12">
                        <button type="submit" class="btn btn-form1 w-100">Submit</button>
                      </div>
                    </div>
                  </form>

                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>