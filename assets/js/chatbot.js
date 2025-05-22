document.addEventListener("DOMContentLoaded", function () {
  const chatBox = document.getElementById("chatBox");
  const chatIcon = document.getElementById("chat-icon");
  const chatContainer = document.getElementById("chat-container");
  let conversationState = "start";
  let isChatOpen = false;

  if (chatBox && chatIcon && chatContainer) {
    chatIcon.addEventListener("click", function (e) {
      e.stopPropagation();
      toggleChat();
    });

    document.addEventListener("click", function (e) {
      if (
        isChatOpen &&
        !chatContainer.contains(e.target) &&
        e.target !== chatIcon
      ) {
        toggleChat();
      }
    });

    chatContainer.addEventListener("click", function (e) {
      e.stopPropagation();
    });

    function toggleChat() {
      isChatOpen = !isChatOpen;
      if (isChatOpen) {
        chatContainer.classList.add("visible");
        if (chatBox.children.length === 0) {
          const typing = showTypingIndicator();
          setTimeout(() => {
            removeTypingIndicator(typing);
            showInitialOptions();
          }, 1500);
        }
      } else {
        chatContainer.classList.remove("visible");
      }
    }

    function clearChat() {
      chatBox.innerHTML = "";
    }

    function resetToMainMenu() {
      clearChat();
      if (!isChatOpen) {
        chatContainer.classList.add("visible");
        isChatOpen = true;
      }
      const typing = showTypingIndicator();
      setTimeout(() => {
        removeTypingIndicator(typing);
        showInitialOptions();
      }, 800);
    }

    function showTypingIndicator() {
      const typing = document.createElement("div");
      typing.className = "typing-indicator";
      typing.innerHTML = `
          <div class="typing-dot"></div>
          <div class="typing-dot"></div>
          <div class="typing-dot"></div>
        `;
      chatBox.appendChild(typing);
      chatBox.scrollTop = chatBox.scrollHeight;
      return typing;
    }

    function removeTypingIndicator(typingElement) {
      if (typingElement && typingElement.parentNode) {
        typingElement.parentNode.removeChild(typingElement);
      }
    }

    function addMessage(text, sender, isOption = false) {
      const msg = document.createElement("div");
      msg.classList.add("message", `${sender}-message`);
      if (isOption) msg.classList.add("option-message");
      msg.innerText = text;
      chatBox.appendChild(msg);
      chatBox.scrollTop = chatBox.scrollHeight;
      return msg;
    }

    function addCustomHTMLMessage(htmlContent, sender) {
      const msg = document.createElement("div");
      msg.classList.add("message", `${sender}-message`);
      msg.innerHTML = htmlContent;
      chatBox.appendChild(msg);
      chatBox.scrollTop = chatBox.scrollHeight;
    }

    function showOptions(optionsArray) {
      document.querySelectorAll(".option-message").forEach((el) => el.remove());

      optionsArray.forEach((option) => {
        const optionElement = document.createElement("div");
        optionElement.classList.add("message", "bot-message", "option-message");

        optionElement.innerHTML = `
            <div class="option-card">
              <div class="option-content">${option.text}</div>
            </div>
          `;
        optionElement.style.cursor = "pointer";

        optionElement.onclick = () => {
          document
            .querySelectorAll(".option-message")
            .forEach((el) => el.remove());
          addMessage(option.text, "user");
          const typing = showTypingIndicator();
          setTimeout(() => {
            removeTypingIndicator(typing);
            option.action();
          }, 800);
        };

        chatBox.appendChild(optionElement);
        chatBox.scrollTop = chatBox.scrollHeight;
      });
    }

    function showInitialOptions() {
      conversationState = "start";

      const welcomeHTML = `
          <div class="start-message">
            <h3 style="margin: 0 0 8px 0; text-align:center" class="span_heading">AI Assistant</h3>
            <p class="robot_intro">Hey, <span class="color-primary">Buddy</span> 👋<br>
            How can I help you today?</p>
            <p class="robot_content">
              I'm here to assist you with our premium car wash services and combo packages.
            </p>
          </div>
        `;

      const welcomeOptions = `
          <div class="starting_option">
            <div class="container">
              <div class="row">
                <div class="col-lg-6">
                  <div class="iconcontent hover-effect" id="car-wash-option">
                    <div class="icon_bot">
                      <h4>Car Wash Plans</h4>
                      <img src="assets/images/carwash_icon.png" alt="Car Wash Icon">
                    </div>
                    <p>our Basic and Premium car wash packages</p>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="iconcontent hover-effect" id="both-option">
                    <div class="icon_bot">
                      <h4>Car & Bike Combo</h4>
                      <img src="assets/images/bikewash_icon.png" alt="Combo Icon">
                    </div>
                    <p>Special package for both car and bike owners</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        `;

      addCustomHTMLMessage(
        `<div class="bot-message start-message-wrapper">${
          welcomeHTML + welcomeOptions
        }</div>`,
        "bot"
      );

      setTimeout(() => {
        document
          .getElementById("car-wash-option")
          ?.addEventListener("click", carWashOptions);
        document
          .getElementById("both-option")
          ?.addEventListener("click", bothOptions);
      }, 100);
    }

    function carWashOptions() {
      conversationState = "car_wash";

      const messageHTML = `
          <div class="bot-message">
            <p style="margin-bottom:0; "><B>Choose a Car Wash Plan:</B></p>        
            
          </div>
        `;

      addCustomHTMLMessage(messageHTML, "bot");

      showOptions([
        {
          text: "Basic Car Wash (SMALL CARS) (₹699)",
          action: () =>
            confirmBooking("Basic Car Wash Plan (SMALL CARS) ", 699),
        },
        {
          text: "Premium Car Wash (SUV+ BIG CARS) (₹899)",
          action: () =>
            confirmBooking("Premium Car Wash Plan (SUV+ BIG CARS)", 899),
        },
        { text: "🔙 Back to main menu", action: resetToMainMenu },
      ]);
    }

    function bothOptions() {
      conversationState = "both";

      const messageHTML = `
                <div class="bot-message">
                  <strong>Car & Bike Combo Plan – <span class="rupee">₹</span>999/month</strong><br>
                  <u>Includes:</u>
                  <ul class="checklist">
                    <li><strong>Car Services:</strong></li>
                    <li>15 Exterior Washes (Wet/Dry)</li>
                    <li>2 Interior Foam Wash & Vacuum Cleaning</li>
                    <li><strong>Bike Services:</strong></li>
                    <li>12 Washes (3 per week)</li>
                    <li>Yearly Once Oil Change</li>
                    <li>Chain Lubrication Every 2 Months</li>
                  </ul>
                  <p class="text-success">Save ₹399 compared to booking separately!</p>
                </div>
        `;

      addCustomHTMLMessage(messageHTML, "bot");

      showOptions([
        {
          text: "Book Combo Plan (₹999)",
          action: () => confirmBooking("Car & Bike Combo Plan", 999),
        },
        { text: "🔙 Back to main menu", action: resetToMainMenu },
      ]);
    }

    function confirmBooking(service, price) {
      let detailsHTML = "";
      console.log("Service received:", service); // Debug log

      // Normalize the service name for comparison
      const normalizedService = service
        .toLowerCase()
        .replace(/\s+/g, " ")
        .trim();

      if (normalizedService.includes("basic car wash")) {
        detailsHTML = `
          <div class="plan-option">
            <u>Includes:</u>
            <ul class="checklist">
              <li>30 Exterior Wash.</li>
              <li>Monthly 4 Interior Wash & Vaccum.</li>
              <li>Weekly 2 Air Checkup.</li>
              <li>Puncher Free (2-Times).</li>
            </ul>
          </div>
        `;
      } else if (normalizedService.includes("premium car wash")) {
        detailsHTML = `
          <div class="plan-option">
            <u>Includes:</u>
            <ul class="checklist">
              <li>30 Exterior Wash.</li>
              <li>Monthly 4 Interior Wash & Vaccum.</li>
              <li>Weekly 2 Air Checkup.</li>
              <li>Puncher Free (2-Times).</li>
            </ul>
          </div>
        `;
      } else if (normalizedService.includes("combo")) {
        detailsHTML = `
          <div class="plan-option">
            <u>Includes:</u>
            <ul class="checklist">
              <li><strong>Car & Bike Services:</strong></li>
              <li>Weekly Three(3) Bike Wash.</li>
              <li>30 Exterior Wash.</li>           
              <li>Weekly 2 Air Checkup.</li>
              <li>Puncher Free (2-Times).</li>
         
            </ul>
          </div>
        `;
      }

      addCustomHTMLMessage(
        `
        <div class="message-bubble">
          <strong>Please confirm your ${service} selection:</strong><br>
          ${detailsHTML}
          <div class="price-confirmation">
            Total Amount: <span class="rupee">₹</span>${price}
          </div>
          Is this correct?
        </div>
        `,
        "bot"
      );

      showOptions([
        {
          text: "Yes, book now",
          action: () => completeBooking(service, price),
        },
        {
          text: "No, choose again",
          action: () => {
            if (conversationState === "car_wash") carWashOptions();
            else if (conversationState === "both") bothOptions();
            else resetToMainMenu();
          },
        },
      ]);
    }

    function completeBooking(service, price) {
      addCustomHTMLMessage(
        `
            <div class="message-bubble">✅ Your ${service} is booked for <span class="rupee">₹</span>${price}!</div>
        `,
        "bot"
      );

      addCustomHTMLMessage(
        `
            <div class="message-bubble">
              Would you like to book another service?
            </div>
          `,
        "bot"
      );

      showOptions([
        { text: "Yes, book another", action: resetToMainMenu },
        {
          text: "No, I'm done",
          action: () => {
            addCustomHTMLMessage(
              `<div class="message-bubble"> Thank you for using our service! Have a great day! 🚗💨 </div>`,
              "bot"
            );
            setTimeout(() => {
              toggleChat();

              if (service.includes("Car") && !service.includes("Bike")) {
                const carModal = new bootstrap.Modal(
                  document.getElementById("carModal")
                );
                carModal.show();
              } else if (service.includes("Combo")) {
                const bothModal = new bootstrap.Modal(
                  document.getElementById("bothModal")
                );
                bothModal.show();
              }
              resetToMainMenu();
            }, 1500);
          },
        },
      ]);
    }
  } else {
    console.error("One or more required elements are missing from the DOM");
  }
});
