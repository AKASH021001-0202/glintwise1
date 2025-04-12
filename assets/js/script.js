// Main DOMContentLoaded handler
document.addEventListener("DOMContentLoaded", function() {
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
  // 1. CHATBOT FUNCTIONALITY
  // // =====================
  // function initChatbot() {
  //   const chatBox = document.getElementById("chat-box");
  //   if (!chatBox) return;
  
  //   function addBotMessage(message, buttons = []) {
  //     const botMessage = document.createElement("div");
  //     botMessage.classList.add("bot-message");
  //     botMessage.innerHTML = message;
  //     chatBox.appendChild(botMessage);
  
  //     if (buttons.length > 0) {
  //       const buttonContainer = document.createElement("div");
  //       buttonContainer.classList.add("button-container");
  
  //       buttons.forEach(btnText => {
  //         const button = document.createElement("button");
  //         button.textContent = btnText;
  //         button.addEventListener("click", () => handleUserSelection(btnText));
  //         buttonContainer.appendChild(button);
  //       });
  
  //       chatBox.appendChild(buttonContainer);
  //     }
  
  //     chatBox.scrollTop = chatBox.scrollHeight;
  //   }
  
  //   function handleUserSelection(userMessage) {
  //     document.querySelectorAll(".button-container").forEach(e => e.remove());
  
  //     const userMsg = document.createElement("div");
  //     userMsg.classList.add("user-message");
  //     userMsg.textContent = userMessage;
  //     chatBox.appendChild(userMsg);
  
  //     setTimeout(() => {
  //       const response = getBotResponse(userMessage);
  //       addBotMessage(response.message, response.buttons);
  //     }, 1000);
  //   }
  
  //   function getBotResponse(input) {
  //     const responses = {
  //       "Car Wash Membership": { 
  //         message: "Our car wash memberships offer unlimited washes! Choose a plan:", 
  //         buttons: ["Basic - $20/month", "Premium - $40/month", "Platinum - $60/month"]
  //       },
  //       "Laundry Services": { 
  //         message: "We provide high-quality laundry services. What do you need?", 
  //         buttons: ["Wash & Fold", "Dry Cleaning", "Ironing Services"]
  //       },
  //       "Basic - $20/month": { 
  //         message: "The Basic plan includes 5 washes per month. Would you like to subscribe?", 
  //         buttons: ["Yes", "No"]
  //       },
  //       "Premium - $40/month": { 
  //         message: "The Premium plan includes unlimited washes + free vacuuming. Would you like to subscribe?", 
  //         buttons: ["Yes", "No"]
  //       },
  //       "Platinum - $60/month": { 
  //         message: "The Platinum plan includes unlimited washes, vacuuming, and interior cleaning. Subscribe?", 
  //         buttons: ["Yes", "No"]
  //       },
  //       "Wash & Fold": { 
  //         message: "Wash & Fold service costs $1.50 per pound. Need pickup service?", 
  //         buttons: ["Yes", "No"]
  //       },
  //       "Dry Cleaning": { 
  //         message: "Dry Cleaning starts at $5 per item. Need pickup service?", 
  //         buttons: ["Yes", "No"]
  //       },
  //       "Ironing Services": { 
  //         message: "Ironing services cost $2 per garment. Need pickup service?", 
  //         buttons: ["Yes", "No"]
  //       },
  //       "Yes": { 
  //         message: "Great! Please provide your contact details at our service center.", 
  //         buttons: []
  //       },
  //       "No": { 
  //         message: "Alright! Let me know if you need anything else.", 
  //         buttons: ["Car Wash Membership", "Laundry Services"]
  //       }
  //     };
  
  //     return responses[input] || { message: "I didn't understand that.", buttons: [] };
  //   }
  
  //   // Start chatbot
  //   addBotMessage("How can I help you?", ["Car Wash Membership", "Laundry Services"]);
  // }
  
  // =====================
  // 2. FORM SELECT INPUTS
  // =====================
  function initSelectInputs() {
    document.querySelectorAll(".input-container select").forEach(select => {
      select.addEventListener("change", function() {
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
                slidesPerView: 3
              },
              768: {
                slidesPerView: 2,
                spaceBetween: 8
              },
              576: {
                slidesPerView: 1,
                spaceBetween: 5
              }
            }
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
              slidesPerView: 4,
              spaceBetween: 20,
              centeredSlides: true,
              pagination: {
                el: swiperUpEl.querySelector(".swiper-pagination"),
                clickable: true,
              },
              autoplay: {
                delay: 3000,
                disableOnInteraction: false,
                reverseDirection: true
              },
              breakpoints: {
                992: {
                  slidesPerView: 4
                },
                768: {
                  slidesPerView: 1,
                  spaceBetween: 15
                },
                576: {
                  slidesPerView: 1,
                  spaceBetween: 10
                },
                320: {
                  slidesPerView: 1,
                  spaceBetween: 5
                }
              }
            });
          }
      
          // Swiper moving down (normal direction)
          const swiperDownEl = testimonialSection.querySelector(".swiper-down");
          if (swiperDownEl) {
            new Swiper(swiperDownEl, {
              direction: "vertical",
              loop: true,
              slidesPerView: 4,
              spaceBetween: 20,
              centeredSlides: true,
              pagination: {
                el: swiperDownEl.querySelector(".swiper-pagination"),
                clickable: true,
              },
              autoplay: {
                delay: 3000,
                disableOnInteraction: false,
              },
              breakpoints: {
                992: {
                  slidesPerView: 4
                },
                768: {
                  slidesPerView: 3,
                  spaceBetween: 15
                },
                576: {
                  slidesPerView: 2,
                  spaceBetween: 10
                },
                320: {
                  slidesPerView: 1,
                  spaceBetween: 5
                }
              }
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
  
    faqItems.forEach(item => {
      item.addEventListener("click", () => {
        const answer = item.querySelector(".faq-answer");
        const icon = item.querySelector(".faq-icon");
        const isOpen = item.classList.contains("open");
  
        // Close all first
        document.querySelectorAll(".faq-item").forEach(i => {
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
  
  // function initCounters() {
  //   const counters = document.querySelectorAll('.counter-box-text h2');
  //   if (counters.length === 0) return;
  
  //   const speed = 500;
    
  //   counters.forEach(counter => {
  //     const originalText = counter.textContent;
  //     const endsWithPlus = originalText.endsWith('+');
  //     const target = +originalText.replace(/[^0-9]/g, '');
  //     const increment = target / speed;
  
  //     counter.textContent = '0' + (endsWithPlus ? '+' : '');
  
  //     const updateCount = () => {
  //       const current = +counter.textContent.replace(/[^0-9]/g, '');
  //       if (current < target) {
  //         counter.textContent = Math.ceil(current + increment).toLocaleString() + (endsWithPlus ? '+' : '');
  //         requestAnimationFrame(updateCount);
  //       } else {
  //         counter.textContent = target.toLocaleString() + (endsWithPlus ? '+' : '');
  //       }
  //     };
  
  //     const observer = new IntersectionObserver((entries) => {
  //       if (entries[0].isIntersecting) {
  //         updateCount();
  //         observer.unobserve(counter);
  //       }
  //     }, { threshold: 0.5 });
  
  //     observer.observe(counter);
  //   });
  // }
  function initCounters() {
    const counter = document.getElementById('satisfiedClientsCounter');
    if (!counter) return;
  
    const baseCount = 1500;
  
    fetch('get-counter.php')
      .then(response => response.text())
      .then(successPageCount => {
        successPageCount = parseInt(successPageCount) || 0;
        console.log('Live Success Count:', successPageCount);
  
        const target = baseCount + successPageCount;
        const speed = 500;
        const increment = target / speed;
        let current = 0;
  
        const updateCount = () => {
          if (current < target) {
            current += increment;
            counter.textContent = Math.ceil(current).toLocaleString() + '+';
            requestAnimationFrame(updateCount);
          } else {
            counter.textContent = target.toLocaleString() + '+';
          }
        };
  
        const observer = new IntersectionObserver((entries) => {
          if (entries[0].isIntersecting) {
            updateCount();
            observer.unobserve(counter);
          }
        }, { threshold: 0.5 });
  
        observer.observe(counter);
      });
  }

  
  
  // =====================
  // 6. VIDEO CONTROLS
  // =====================

  
  function initVideoControls() {
    // Banner Video Controls
    const bannerVideo = document.getElementById('bannerVideo');
    const bannerUnmuteBtn = document.getElementById('unmuteButton');
    
    if (bannerVideo && bannerUnmuteBtn) {
      initVideoPlayer(bannerVideo, bannerUnmuteBtn);
    }
  
    // How It Works Video Controls
    const howItWorksVideo = document.querySelector('#howItWorks video');
    const howItWorksMuteBtn = document.querySelector('#howItWorks .video-control-btn');
    
    if (howItWorksVideo && howItWorksMuteBtn) {
      initVideoPlayer(howItWorksVideo, howItWorksMuteBtn);
    }
  
    function initVideoPlayer(video, controlBtn) {
      // Set initial state
      video.pause();
      video.muted = true;
      video.setAttribute('playsinline', '');
      video.setAttribute('webkit-playsinline', '');
      
      // Try autoplay with error handling
      const playPromise = video.play();
      
      if (playPromise !== undefined) {
        playPromise.catch(error => {
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
          video.play().catch(e => console.log('Play after unmute failed:', e));
        }
      };
  
      // Update button visual state
      const updateMuteButtonState = () => {
        const isMuted = video.muted;
        controlBtn.classList.toggle('unmuted', !isMuted);
        controlBtn.setAttribute('aria-label', isMuted ? 'Unmute' : 'Mute');
        
        // Update icon (assuming Font Awesome classes)
        const icon = controlBtn.querySelector('i, svg');
        if (icon) {
          icon.classList.toggle('fa-volume-up', !isMuted);
          icon.classList.toggle('fa-volume-mute', isMuted);
        }
      };
  
      // Event listeners
      controlBtn.addEventListener('click', toggleMute);
      
      // Handle video state changes
      video.addEventListener('volumechange', updateMuteButtonState);
      video.addEventListener('play', () => {
        controlBtn.style.display = 'flex'; // Show controls when playing
      });
      
      // Initial setup
      updateMuteButtonState();
      controlBtn.style.display = 'flex'; // Show by default (will hide if autoplay fails)
      
      // Optional: Hide controls after delay when not hovering
      let hideTimeout;
      const videoContainer = video.parentElement;
      
      videoContainer.addEventListener('mouseenter', () => {
        clearTimeout(hideTimeout);
        controlBtn.style.opacity = '1';
      });
      
      videoContainer.addEventListener('mouseleave', () => {
        hideTimeout = setTimeout(() => {
          if (!video.paused) {
            controlBtn.style.opacity = '0';
          }
        }, 2000);
      });
    }
  }



  // =====================
  // POLYFILLS
  // =====================
  // requestAnimationFrame polyfill
  (function() {
    var lastTime = 0;
    var vendors = ['ms', 'moz', 'webkit', 'o'];
    for(var x = 0; x < vendors.length && !window.requestAnimationFrame; ++x) {
      window.requestAnimationFrame = window[vendors[x]+'RequestAnimationFrame'];
      window.cancelAnimationFrame = window[vendors[x]+'CancelAnimationFrame'] 
                                 || window[vendors[x]+'CancelRequestAnimationFrame'];
    }
  
    if (!window.requestAnimationFrame) {
      window.requestAnimationFrame = function(callback) {
        var currTime = new Date().getTime();
        var timeToCall = Math.max(0, 16 - (currTime - lastTime));
        var id = window.setTimeout(function() { 
          callback(currTime + timeToCall); 
        }, timeToCall);
        lastTime = currTime + timeToCall;
        return id;
      };
    }
  
    if (!window.cancelAnimationFrame) {
      window.cancelAnimationFrame = function(id) {
        clearTimeout(id);
      };
    }
  }());
