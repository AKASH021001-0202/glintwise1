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

  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">



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
  <!-- Modal -->
  <div class="modal fade" id="bothModal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered  custom-modal"> <!-- Large modal -->
      <div class="modal-content">

        <div class="modal-body"><img src="assets/images/close.png" class="form_close" onclick="closeModal()" aria-label="Close" />

          <script>
            function closeModal() {
              var modal = document.getElementById('bothModal');
              var modalInstance = bootstrap.Modal.getInstance(modal);
              modalInstance.hide();
            }
          </script>

          <div class="container-fluid">
            <div class="row">

              <div class="col-lg-6 d-flex align-items-center justify-content-center bg_popup2" style="min-height: 400px;">

              </div>

              <!-- Right Column (Form) -->
              <div class="col-lg-6">
                <div class="form_section">
                  <div class="form_content">
                    <h4 class="form_title">Book Now</h4>
                    <p class="form_subtitle">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna</p>
                  </div>
                  <form id="bothModalForm">
                    <input type="hidden" name="formId" value="form3">
                    <div class="row">
                      <!-- Basic Details -->
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

                      <div class="col-lg-6">
                        <div class="mb-3">
                          <label class="form-label">Phone</label>
                          <input type="text" name="phone" class="form-control" required>
                        </div>
                      </div>

                      <div class="col-lg-6">
                        <div class="mb-3">
                          <label class="form-label">Email</label>
                          <input type="email" name="email" class="form-control" required>
                        </div>
                      </div>

                      <div class="col-lg-4">
                        <div class="mb-3">
                          <label class="form-label">Address</label>
                          <input type="text" name="address" class="form-control" required>
                        </div>
                      </div>

                      <div class="col-lg-4">
                        <div class="mb-3">
                          <label class="form-label">City/Town</label>
                          <input type="text" name="city" class="form-control" required>
                        </div>
                      </div>

                      <div class="col-lg-4">
                        <div class="mb-3">
                          <label class="form-label">Postcode</label>
                          <input type="text" name="postcode" class="form-control" required>
                        </div>
                      </div>

                      <!-- Bike Details -->
                      <div class="col-12 mt-4">
                        <h5>Bike Details</h5>
                      </div>



                      <div id="bikeFieldsContainer">
                        <!-- Bike fields will be generated here -->
                        <div class="row bike-fields-group">
                          <div class="col-lg-3">
                            <div class="mb-3">
                              <label class="form-label">Bike Type</label>
                              <input type="text" name="bikeType[]" class="form-control" required>
                            </div>
                          </div>
                          <div class="col-lg-3">
                            <div class="mb-3">
                              <label class="form-label">Bike Model</label>
                              <input type="text" name="bikeModel[]" class="form-control" required>
                            </div>
                          </div>
                          <div class="col-lg-3">
                            <div class="mb-3">
                              <label class="form-label">Bike Number</label>
                              <input type="text" name="bikeNumber[]" class="form-control" required>
                            </div>
                          </div>
                          <div class="col-lg-3">
                            <div class="mb-3 ">
                              <label class="form-label me-3">Quantity</label>
                              <div class="number-control d-flex">
                                <button type="button" class="bike-number-left btn btn-outline-secondary">-</button>
                                <input type="number" id="bikeCount" name="bikeCount" value="1" min="1" class="form-control number-quantity mx-2" style="width: 60px;">
                                <button type="button" class="bike-number-right btn btn-outline-secondary">+</button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <!-- Car Details -->
                      <div class="col-12 mt-4">
                        <h5>Car Details</h5>
                      </div>



                      <div id="carFieldsContainer">
                        <!-- Car fields will be generated here -->
                        <div class="row car-fields-group">
                          <div class="col-lg-3">
                            <div class="mb-3">
                              <label class="form-label">Car Type</label>
                              <input type="text" name="carType[]" class="form-control" required>
                            </div>
                          </div>
                          <div class="col-lg-3">
                            <div class="mb-3">
                              <label class="form-label">Car Model</label>
                              <input type="text" name="carModel[]" class="form-control" required>
                            </div>
                          </div>
                          <div class="col-lg-3">
                            <div class="mb-3">
                              <label class="form-label">Car Number</label>
                              <input type="text" name="carNumber[]" class="form-control" required>
                            </div>
                          </div>
                          <div class="col-lg-3">
                            <div class="mb-3 ">
                              <label class="form-label me-3">Quantity</label>
                              <div class="number-control d-flex">
                                <button type="button" class="car-number-left btn btn-outline-secondary">-</button>
                                <input type="number" id="carCount" name="carCount" value="1" min="1" class="form-control number-quantity mx-2" style="width: 60px;">
                                <button type="button" class="car-number-right btn btn-outline-secondary">+</button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-lg-12">
                        <button type="submit" class="btn btn-form1 w-100">Submit</button>
                      </div>
                    </div>
                  </form>

                  <script>
                    document.addEventListener("DOMContentLoaded", function() {
                      // Bike controls
                      const bikeCountInput = document.getElementById("bikeCount");
                      const bikeMinusBtn = document.querySelector(".bike-number-left");
                      const bikePlusBtn = document.querySelector(".bike-number-right");
                      const bikeFieldsContainer = document.getElementById("bikeFieldsContainer");

                      // Car controls
                      const carCountInput = document.getElementById("carCount");
                      const carMinusBtn = document.querySelector(".car-number-left");
                      const carPlusBtn = document.querySelector(".car-number-right");
                      const carFieldsContainer = document.getElementById("carFieldsContainer");

                      // Bike fields management
                      function updateBikeFields(count) {
                        const currentCount = bikeFieldsContainer.querySelectorAll('.bike-fields-group').length;

                        if (count > currentCount) {
                          for (let i = currentCount; i < count; i++) {
                            const newGroup = document.createElement('div');
                            newGroup.className = 'row bike-fields-group mt-2';
                            newGroup.innerHTML = `
                              <div class="col-lg-4">
                                <div class="mb-3">
                                  <label class="form-label">Bike Type</label>
                                  <input type="text" name="bikeType[]" class="form-control" required>
                                </div>
                              </div>
                              <div class="col-lg-4">
                                <div class="mb-3">
                                  <label class="form-label">Bike Model</label>
                                  <input type="text" name="bikeModel[]" class="form-control" required>
                                </div>
                              </div>
                              <div class="col-lg-4">
                                <div class="mb-3">
                                  <label class="form-label">Bike Number</label>
                                  <input type="text" name="bikeNumber[]" class="form-control" required>
                                </div>
                              </div>
                            `;
                            bikeFieldsContainer.appendChild(newGroup);
                          }
                        } else if (count < currentCount) {
                          const groups = bikeFieldsContainer.querySelectorAll('.bike-fields-group');
                          for (let i = currentCount - 1; i >= count; i--) {
                            bikeFieldsContainer.removeChild(groups[i]);
                          }
                        }
                      }

                      // Car fields management
                      function updateCarFields(count) {
                        const currentCount = carFieldsContainer.querySelectorAll('.car-fields-group').length;

                        if (count > currentCount) {
                          for (let i = currentCount; i < count; i++) {
                            const newGroup = document.createElement('div');
                            newGroup.className = 'row car-fields-group mt-2';
                            newGroup.innerHTML = `
                              <div class="col-lg-4">
                                <div class="mb-3">
                                  <label class="form-label">Car Type</label>
                                  <input type="text" name="carType[]" class="form-control" required>
                                </div>
                              </div>
                              <div class="col-lg-4">
                                <div class="mb-3">
                                  <label class="form-label">Car Model</label>
                                  <input type="text" name="carModel[]" class="form-control" required>
                                </div>
                              </div>
                              <div class="col-lg-4">
                                <div class="mb-3">
                                  <label class="form-label">Car Number</label>
                                  <input type="text" name="carNumber[]" class="form-control" required>
                                </div>
                              </div>
                            `;
                            carFieldsContainer.appendChild(newGroup);
                          }
                        } else if (count < currentCount) {
                          const groups = carFieldsContainer.querySelectorAll('.car-fields-group');
                          for (let i = currentCount - 1; i >= count; i--) {
                            carFieldsContainer.removeChild(groups[i]);
                          }
                        }
                      }

                      // Bike event listeners
                      bikeMinusBtn.addEventListener("click", () => {
                        let value = parseInt(bikeCountInput.value);
                        if (value > 1) {
                          value--;
                          bikeCountInput.value = value;
                          updateBikeFields(value);
                        }
                      });

                      bikePlusBtn.addEventListener("click", () => {
                        let value = parseInt(bikeCountInput.value);
                        value++;
                        bikeCountInput.value = value;
                        updateBikeFields(value);
                      });

                      bikeCountInput.addEventListener("change", () => {
                        let value = parseInt(bikeCountInput.value);
                        if (isNaN(value) || value < 1) {
                          value = 1;
                          bikeCountInput.value = value;
                        }
                        updateBikeFields(value);
                      });

                      // Car event listeners
                      carMinusBtn.addEventListener("click", () => {
                        let value = parseInt(carCountInput.value);
                        if (value > 1) {
                          value--;
                          carCountInput.value = value;
                          updateCarFields(value);
                        }
                      });

                      carPlusBtn.addEventListener("click", () => {
                        let value = parseInt(carCountInput.value);
                        value++;
                        carCountInput.value = value;
                        updateCarFields(value);
                      });

                      carCountInput.addEventListener("change", () => {
                        let value = parseInt(carCountInput.value);
                        if (isNaN(value) || value < 1) {
                          value = 1;
                          carCountInput.value = value;
                        }
                        updateCarFields(value);
                      });

                      // Initialize with 1 bike and 1 car
                      updateBikeFields(1);
                      updateCarFields(1);
                    });
                  </script>

                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>