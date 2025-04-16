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
      chatBox.innerHTML = ""; // Clear all messages
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
              I'm here to assist you with all your vehicle cleaning needs. 
              Whether it's a car or a bike, just let me know what you'd like to book.
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
                      <h4>Car Wash</h4>
                      <img src="assets/images/carwash_icon.png" alt="Car Wash Icon">
                    </div>
                    <p>Premium exterior and interior cleaning for your car. Shine like new!</p>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="iconcontent hover-effect" id="bike-wash-option">
                    <div class="icon_bot">
                      <h4>Bike Wash</h4>
                      <img src="assets/images/bikewash_icon.png" alt="Bike Wash Icon">
                    </div>
                    <p>Quick and thorough cleaning for your two-wheeler. Ride fresh!</p>
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
          .getElementById("bike-wash-option")
          ?.addEventListener("click", bikeWashOptions);
      }, 100);
    }

    function carWashOptions() {
      conversationState = "car_wash";

      const messageHTML = `
          <div class="bot-message">
          <br>
          <strong>Car Wash Plan – <span class="rupee">₹</span>699/month</strong><br>
          <u>Includes:</u>
          <ul class="checklist">
            <li>30 Exterior Washes (Wet/Dry)</li>
            <li>4 Premium Interior Foam Wash & Vacuum Cleaning</li>
            <li>Bi-weekly Air Pressure Check</li>
            <li>Monthly Once Under-Chassis Wash</li>
          </ul>
          </div>
        `;

      addCustomHTMLMessage(messageHTML, "bot");

      showOptions([
        {
          text: "🚗 Book Car Wash Plan",
          action: () => confirmBooking("Monthly Car Wash Plan", 699),
        },
        { text: "🔙 Back to main menu", action: resetToMainMenu },
      ]);
    }

    function bikeWashOptions() {
      conversationState = "bike_wash";

      const messageHTML = `
          <div class="bot-message">
          <br>
          <strong>🏍️ Bike Wash Plan – <span class="rupee">₹ </span>199/month</strong><br>
          <u>Includes:</u>
          <ul class="checklist">
            <li>3 Washes Per Week</li>
            <li>Yearly Once Oil Change</li>
          </ul>
          </div>
        `;

      addCustomHTMLMessage(messageHTML, "bot");

      showOptions([
        {
          text: "🏍️ Book Bike Wash Plan",
          action: () => confirmBooking("Monthly Bike Wash Plan", 199),
        },
        { text: "🔙 Back to main menu", action: resetToMainMenu },
      ]);
    }

    function confirmBooking(service, price) {
      addCustomHTMLMessage(
        `
          <div class="message-bubble">
            You've selected: <strong>${service}</strong> for <span class="rupee">₹</span>${price}.<br>Should I book this for you?
          </div>
        `,
        "bot"
      );

      showOptions([
        {
          text: "Yes, please book it",
          action: () => completeBooking(service, price),
        },
        {
          text: "No, show other options",
          action: () => {
            if (conversationState === "car_wash") carWashOptions();
            else if (conversationState === "bike_wash") bikeWashOptions();
            else resetToMainMenu();
          },
        },
        {
          text: "Booking Both Two Services",
          action: () => {
            addCustomHTMLMessage(
              `
                  <div class="message-bubble">
                    Thank you for using our service! Have a great day! 🚗💨
                  </div>
                `,
              "bot"
            );
            setTimeout(() => {
              const bothModalForm = new bootstrap.Modal(document.getElementById("bothModal"));
              bothModalForm.show();
              resetToMainMenu();
            }, 1000);
           
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

              // Open the appropriate modal based on the service booked
              if (service.includes("Car")) {
                const carModal = new bootstrap.Modal(
                  document.getElementById("carModal")
                );
                carModal.show();
              } else if (service.includes("Bike")) {
                const bikeModal = new bootstrap.Modal(
                  document.getElementById("bikeModal")
                );
                bikeModal.show();
              }
              resetToMainMenu();
            }, 1500);
          },
        },
      ]);
      // Close the chat after a short delay
    }
  } else {
    console.error("One or more required elements are missing from the DOM");
  }
});
