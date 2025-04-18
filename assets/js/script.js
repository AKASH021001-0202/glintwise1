// Main DOMContentLoaded handler
document.addEventListener("DOMContentLoaded", function () {
  // Initialize Chatbot
  // initChatbot();

  // Initialize Form Select Elements
  initSelectInputs();

  // Initialize Swiper Carousel
  initSwiper();

  // Initialize FAQ Accordion
  initFAQ();

  // Initialize Counter Animations
  initCounters();

  // Initialize Video Controls
  initVideoControls();
});

// =====================
// 2. FORM SELECT INPUTS
// =====================
function initSelectInputs() {
  document.querySelectorAll(".input-container select").forEach((select) => {
    select.addEventListener("change", function () {
      this.classList.toggle("has-value", !!this.value);
    });
    // Initialize on load
    if (select.value) select.classList.add("has-value");
  });
}

// =====================
// 3. SWIPER CAROUSEL
// =====================

function initSwiper() {
  const aboutswiper = document.querySelector(".mySwiper11");
  if (aboutswiper) {
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
  }

  // Initialize horizontal swiper
  const horizontalSwiperEl = document.querySelector(".mySwiper");
  if (horizontalSwiperEl) {
    new Swiper(".mySwiper", {
      slidesPerView: 3,
      spaceBetween: 10,
      loop: true,
      navigation: false,
      pagination: false,
      autoplay: {
        delay: 1000,
        disableOnInteraction: false,
      },
      speed: 800,
      freeMode: true,
      freeModeMomentum: true,
      breakpoints: {
        992: {
          slidesPerView: 3,
        },
        768: {
          slidesPerView: 2,
          spaceBetween: 8,
        },
        576: {
          slidesPerView: 1,
          spaceBetween: 5,
        },
      },
    });
  }

  // Initialize vertical swipers in testimonials section
  const testimonialSection = document.getElementById("testi_monials");
  if (testimonialSection) {
    // Swiper moving up (reverse direction)
    const swiperUpEl = testimonialSection.querySelector(".swiper-up");
    if (swiperUpEl) {
      new Swiper(swiperUpEl, {
        direction: "vertical",
        loop: true,
        slidesPerView: 2, // Reduced from 4 to fix loop warning
        spaceBetween: 20,
        autoplay: {
          delay: 3000,
          disableOnInteraction: false,
          reverseDirection: true,
        },
        pagination: {
          el: swiperUpEl.querySelector(".swiper-pagination"),
          clickable: true,
        },
        breakpoints: {
          992: {
            slidesPerView: 3,
          },
          768: {
            slidesPerView: 1,
            spaceBetween: 15,
          },
          576: {
            slidesPerView: 1,
            spaceBetween: 10,
          },
        },
      });
    }

    // Swiper moving down (normal direction)
    const swiperDownEl = testimonialSection.querySelector(".swiper-down");
    if (swiperDownEl) {
      new Swiper(swiperDownEl, {
        direction: "vertical",
        loop: true,
        slidesPerView: 3, // Reduced from 3 to ensure smooth looping
        spaceBetween: 20,
        autoplay: {
          delay: 3000,
          disableOnInteraction: false,
        },
        pagination: {
          el: swiperDownEl.querySelector(".swiper-pagination"),
          clickable: true,
        },
        breakpoints: {
          992: {
            slidesPerView: 3,
          },
          768: {
            slidesPerView: 1,
            spaceBetween: 15,
          },
          576: {
            slidesPerView: 1,
            spaceBetween: 10,
          },
        },
      });
    }
  }
}

// =====================
// 4. FAQ ACCORDION
// =====================
function initFAQ() {
  const faqItems = document.querySelectorAll(".faq-item");
  if (faqItems.length === 0) return;

  faqItems.forEach((item) => {
    item.addEventListener("click", () => {
      const answer = item.querySelector(".faq-answer");
      const icon = item.querySelector(".faq-icon");
      const isOpen = item.classList.contains("open");

      // Close all first
      document.querySelectorAll(".faq-item").forEach((i) => {
        i.classList.remove("open");
        i.querySelector(".faq-answer").style.display = "none";
        const icon = i.querySelector(".faq-icon");
        if (icon) {
          icon.classList.remove("fa-minus");
          icon.classList.add("fa-plus");
        }
      });

      // Toggle current if wasn't open
      if (!isOpen) {
        item.classList.add("open");
        answer.style.display = "block";
        if (icon) {
          icon.classList.remove("fa-plus");
          icon.classList.add("fa-minus");
        }
      }
    });
  });
}

// =====================
// 5. COUNTER ANIMATIONS
// =====================
function initCounters() {
  // Initialize all counters
  const counters = [
    {
      element: document.getElementById("satisfiedClientsCounter"),
      baseCount: 1500,
      endpoint: "get-counter.php"
    },
    {
      element: document.getElementById("professionalsCounter"),
      baseCount: 3000
    },
    {
      element: document.getElementById("servicesCounter"),
      baseCount: 5000
    }
  ].filter(counter => counter.element);

  counters.forEach(counter => {
    const updateCounter = (target) => {
      const speed = Math.min(2000, 1000 + (target / 10)); // Dynamic speed
      const increment = target / speed;
      let current = 0;

      const updateCount = () => {
        if (current < target) {
          current += increment;
          counter.element.textContent = Math.ceil(current).toLocaleString() + "+";
          requestAnimationFrame(updateCount);
        } else {
          counter.element.textContent = target.toLocaleString() + "+";
        }
      };

      const observer = new IntersectionObserver(
        (entries) => {
          if (entries[0].isIntersecting) {
            updateCount();
            observer.unobserve(counter.element);
          }
        },
        { threshold: 0.5 }
      );

      observer.observe(counter.element);
    };

    if (counter.endpoint) {
      fetch(counter.endpoint)
        .then((response) => response.text())
        .then((successPageCount) => {
          successPageCount = parseInt(successPageCount) || 0;
          const target = counter.baseCount + successPageCount;
          updateCounter(target);
        })
        .catch(() => {
          // Fallback to base count if fetch fails
          updateCounter(counter.baseCount);
        });
    } else {
      updateCounter(counter.baseCount);
    }
  });
}


// =====================
// 6. VIDEO CONTROLS
// =====================

function initVideoControls() {
  // Banner Video Controls
  const bannerVideo = document.getElementById("bannerVideo");
  const bannerUnmuteBtn = document.getElementById("unmuteButton");

  if (bannerVideo && bannerUnmuteBtn) {
    initVideoPlayer(bannerVideo, bannerUnmuteBtn);
  }

  // How It Works Video Controls
  const howItWorksVideo = document.querySelector("#howItWorks video");
  const howItWorksMuteBtn = document.querySelector(
    "#howItWorks .video-control-btn"
  );

  if (howItWorksVideo && howItWorksMuteBtn) {
    initVideoPlayer(howItWorksVideo, howItWorksMuteBtn);
  }

  function initVideoPlayer(video, controlBtn) {
    // Set initial state
    video.pause();
    video.muted = true;
    video.setAttribute("playsinline", "");
    video.setAttribute("webkit-playsinline", "");

    // Try autoplay with error handling
    const playPromise = video.play();

    if (playPromise !== undefined) {
      playPromise.catch((error) => {
        console.log(`${video.id} autoplay prevented:`, error);
        // Show fallback poster image if needed
        video.poster && (video.style.backgroundImage = `url(${video.poster})`);
      });
    }

    // Mute/unmute functionality
    const toggleMute = () => {
      video.muted = !video.muted;
      updateMuteButtonState();

      // Some browsers require play() after unmuting
      if (!video.muted && video.paused) {
        video.play().catch((e) => console.log("Play after unmute failed:", e));
      }
    };

    // Update button visual state
    const updateMuteButtonState = () => {
      const isMuted = video.muted;
      controlBtn.classList.toggle("unmuted", !isMuted);
      controlBtn.setAttribute("aria-label", isMuted ? "Unmute" : "Mute");

      // Update icon (assuming Font Awesome classes)
      const icon = controlBtn.querySelector("i, svg");
      if (icon) {
        icon.classList.toggle("fa-volume-up", !isMuted);
        icon.classList.toggle("fa-volume-mute", isMuted);
      }
    };

    // Event listeners
    controlBtn.addEventListener("click", toggleMute);

    // Handle video state changes
    video.addEventListener("volumechange", updateMuteButtonState);
    video.addEventListener("play", () => {
      controlBtn.style.display = "flex"; // Show controls when playing
    });

    // Initial setup
    updateMuteButtonState();
    controlBtn.style.display = "flex"; // Show by default (will hide if autoplay fails)

    // Optional: Hide controls after delay when not hovering
    let hideTimeout;
    const videoContainer = video.parentElement;

    videoContainer.addEventListener("mouseenter", () => {
      clearTimeout(hideTimeout);
      controlBtn.style.opacity = "1";
    });

    videoContainer.addEventListener("mouseleave", () => {
      hideTimeout = setTimeout(() => {
        if (!video.paused) {
          controlBtn.style.opacity = "0";
        }
      }, 2000);
    });
  }
}

// =====================
// POLYFILLS
// =====================
// requestAnimationFrame polyfill
(function () {
  var lastTime = 0;
  var vendors = ["ms", "moz", "webkit", "o"];
  for (var x = 0; x < vendors.length && !window.requestAnimationFrame; ++x) {
    window.requestAnimationFrame = window[vendors[x] + "RequestAnimationFrame"];
    window.cancelAnimationFrame =
      window[vendors[x] + "CancelAnimationFrame"] ||
      window[vendors[x] + "CancelRequestAnimationFrame"];
  }

  if (!window.requestAnimationFrame) {
    window.requestAnimationFrame = function (callback) {
      var currTime = new Date().getTime();
      var timeToCall = Math.max(0, 16 - (currTime - lastTime));
      var id = window.setTimeout(function () {
        callback(currTime + timeToCall);
      }, timeToCall);
      lastTime = currTime + timeToCall;
      return id;
    };
  }

  if (!window.cancelAnimationFrame) {
    window.cancelAnimationFrame = function (id) {
      clearTimeout(id);
    };
  }
})();
