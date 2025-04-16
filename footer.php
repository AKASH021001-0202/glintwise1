<!-- Footer Section -->
<footer>
  <div class="footer">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="footer-widgets">

            <img src="assets/images/logo.svg" alt="">
            <h2>Lorem ipsum dolor sit amet, consectetur</h2>
          </div>
        </div>
        <div class="col-md-3 ">

          <div class="footer-widgets">

            <h2>Quick Link</h2>
            <ul class="footer-links">
              <li><a href="#" class="text-dark">Home</a></li>
              <li><a href="#" class="text-dark">About Us</a></li>
              <li><a href="#" class="text-dark">Services</a></li>
              <li><a href="#" class="text-dark">Contact Us</a></li>

            </ul>
          </div>



        </div>
        <div class="col-md-3 ">
          <div class="footer-widgets">

            <p><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3886.36923168024!2d80.2139718!3d13.075769999999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a5267003c657569%3A0xa84b56820d738629!2sGlintwise%20India!5e0!3m2!1sen!2sin!4v1742972054676!5m2!1sen!2sin" width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="footer_boottom">
    <div class="container">
      <div class="row">

        <div class="col-lg-12 copyright">
          <p> &copy; 2024 GLINTWISE INDIA. All rights reserved. </p>
        </div>
      </div>
    </div>
  </div>
</footer>
<!-- Floating Chat Icon -->
<div class="chat-icon" id="chat-icon"><img src="assets/images/robot.png" style="padding: 10px;" alt=""></div>

<div class="chat-container" id="chat-container">

  <div class="chat-box" id="chatBox">



  </div>
  <div class="chat-footer">
    <div class="footer-content">

      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="footer_chatbot">Customer <span class="color-primary">Support</span> </h3>
          </div>
          <div class="col-lg-6">
            <div class="footer_support">


              <img src="assets/images/support.png" alt="">
              <p><a href="tel:+1800 202 6161"> 1800 202 6161 </a></p>

            </div>
          </div>
          <div class="col-lg-6">
            <div class="footer_support">

              <img src="assets/images/whatsapp.png" alt="">
              <p><a href="https://wa.me/918798701245?text=Hi,%20I%20need%20help%20with%20car/bike%20wash%20services">81100 50600 </a></p>
            </div>
          </div>

        </div>

      </div>
    </div>
  </div>
</div>

</div>

<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/chatbot.js"></script>
<script src="assets/js/script.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
  function startRazorpayPayment() {
    const options = {
      key: "rzp_test_1DP5mmOlF5G5ag", // ✅ Test key
      amount: 500, // amount in paise (₹500.00)
      currency: "INR",
      name: "Test Company",
      description: "Test Transaction",
      handler: function(response) {
        alert("Payment successful! ID: " + response.razorpay_payment_id);
        // ✅ Optional: Redirect or show confirmation page
        // window.location.href = "thankyou.html";
      },
      prefill: {
        name: "Your Name",
        email: "test@example.com",
        contact: "9999999999",
      },
      theme: {
        color: "#3399cc",
      },
    };

    const rzp = new Razorpay(options);
    rzp.open();
  }
</script>

<script>
  document.addEventListener("DOMContentLoaded", function() {
    AOS.init({
      duration: 2000,
      easing: "ease-in-out",
      once: false,
      mirror: false,
    });
  });
</script>
<script>
  new Swiper(".mySwiper11", {
    direction: "vertical",
    spaceBetween: 10,
    effect: "creative",
    creativeEffect: {
      prev: {
        shadow: true,
        translate: [0, "-10%", -100],
      },
      next: {
        translate: [0, "100%", 0],
      },
    },
    mousewheel: {
      releaseOnEdges: true,
      sensitivity: 1,
    },
    loop: false,
    slidesPerView: 1,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    speed: 1000,
    grabCursor: true,
    touchRatio: 1.5,
    touchEventsTarget: "container",
  });
</script>


<script>
  const showToast = (message, isSuccess = true) => {
    const toast = document.getElementById("customToast");
    const toastMsg = document.getElementById("toastMessage");

    toastMsg.textContent = message;
    toast.style.backgroundColor = isSuccess ? "#28a745" : "#dc3545";
    toast.classList.add("show");

    setTimeout(() => hideToast(), 5000);
  };

  const hideToast = () => {
    document.getElementById("customToast").classList.remove("show");
  };

  const handleFormSubmit = (formId) => {
    const form = document.getElementById(formId);


    if (!form) return;

    form.addEventListener("submit", function(e) {
      e.preventDefault();

      const formData = new FormData(form);
      console.log(formData);
      const submitBtn = form.querySelector("button[type='submit']");

      submitBtn.disabled = true;
      submitBtn.textContent = "Submitting...";

      fetch("submit.php", {
          method: "POST",
          body: formData,
        })
        .then((res) => res.text())
        .then((data) => {
          showToast(data || "Form submitted successfully!");
          form.reset();
          startRazorpayPayment();
        })
        .catch((err) => {
          console.error(err);
          showToast("Something went wrong. Please try again.", false);
        })
        .finally(() => {
          submitBtn.disabled = false;
          submitBtn.textContent = "Submit";
        });
    });
  };

  handleFormSubmit("myForm1");
  handleFormSubmit("myForm");
  handleFormSubmit("bothModalForm");
</script>


<script>
  // Select elements
  const menuBtn = document.getElementById('menu-btn');
  const closeBtn = document.getElementById('close-menu');
  const mobileMenu = document.getElementById('mobile-menu');
  const header = document.querySelector('header');
  const body = document.body;

  // Function to close menu
  const closeMenu = () => {
    mobileMenu.style.right = "-100%";
    body.style.overflow = "auto";
  };

  // Open Menu
  menuBtn.addEventListener('click', (event) => {
    event.preventDefault();
    mobileMenu.style.right = "0";
    body.style.overflow = "hidden";
  });

  // Close Menu Button
  closeBtn.addEventListener('click', closeMenu);

  // Close Menu When Clicking Outside
  document.addEventListener('click', (event) => {
    if (!mobileMenu.contains(event.target) && !menuBtn.contains(event.target)) {
      closeMenu();
    }
  });

  // Prevent closing when clicking inside the menu
  mobileMenu.addEventListener('click', (event) => {
    event.stopPropagation();
  });

  // Sticky Header Effect
  window.addEventListener('scroll', () => {
    if (window.scrollY > 50) {
      header.classList.add('sticky');
    } else {
      header.classList.remove('sticky');
    }
  });
</script>


<script>
  function refreshCaptcha() {
    $("#captchaContainer").load("captcha.php");
  }

  // Refresh CAPTCHA every 2 minutes
  setInterval(refreshCaptcha, 120000);

  // Initial load of CAPTCHA
  $(document).ready(function() {
    refreshCaptcha();
  });
</script>


<script>
  document.addEventListener("DOMContentLoaded", function() {

    (function() {
      emailjs.init({
        publicKey: "161cGnXXEFeweqc5B", // Your public key
        blockHeadless: true, // Prevents spam
      });
      console.log("EmailJS initialized successfully");
    })();

    // Form submission handler
    $(document).on('click', '#csend', function(e) {
      e.preventDefault();
      const submitBtn = $(this);
      submitBtn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Sending...');

      // Collect and prepare form data
      const templateParams = {
        name: $('#name').val().trim(),

        email: $('#email').val().trim(),
        message: $('#msg').val().trim(),

        captcha: $('#captcha').val().trim()
      };



      // Validate form
      if (!validateForm(templateParams)) {
        submitBtn.prop('disabled', false).html('Submit');
        return;
      }

      // Send email using EmailJS
      emailjs.send('service_akdvear', 'template_5ivkce2', templateParams)
        .then(function(response) {
          console.log('Email successfully sent!', response);
          Swal.fire({
            title: 'Success!',
            text: 'Form submitted successfully!',
            icon: 'success',
            confirmButtonColor: '#28a745'
          });
          $('#contact_form')[0].reset();

          // Refresh CAPTCHA after successful submission
          if (typeof refreshCaptcha === 'function') {
            refreshCaptcha();
          }
        })
        .catch(function(error) {
          console.error('Email sending failed:', error);
          Swal.fire({
            title: 'Error!',
            text: 'Failed to submit form. Please try again or contact support.',
            icon: 'error',
            confirmButtonColor: '#d33'
          });
        })
        .finally(function() {
          submitBtn.prop('disabled', false).html('Submit');
        });
    });

    // Form validation function
    function validateForm(data) {
      let isValid = true;

      // Clear previous errors
      $('.is-invalid').removeClass('is-invalid');

      // Validation checks
      const showValidationError = (fieldId, message) => {
        $(fieldId).addClass('is-invalid');
        Swal.fire({
          title: 'Validation Error',
          text: message,
          icon: 'error',
          confirmButtonColor: '#d33'
        });
        isValid = false;
      };

      if (!data.name) {
        showValidationError('#name', 'Full name is required');
      }



      if (!data.email || !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(data.email)) {
        showValidationError('#email', 'Please enter a valid email address');
      }



      if (!data.message) {
        showValidationError('#msg', 'Please enter your Message');
      }

      if (!data.captcha) {
        showValidationError('#captcha', 'Please complete the CAPTCHA');
      }

      return isValid;
    }


  });
</script>


<script>
  let vid = document.getElementById("howItWorksVideo");

  function playVid() {
    vid.play();
  }
</script>



</body>

</html>