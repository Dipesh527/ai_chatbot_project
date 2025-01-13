document.addEventListener("DOMContentLoaded", function () {
  const messageInput = document.getElementById("message-input");
  const sendButton = document.getElementById("send-button");
  const chatMessages = document.getElementById("chat-messages");

  // Function to add a message to the chat
  function addMessage(content, sender = "user") {
      const messageDiv = document.createElement("div");
      messageDiv.classList.add("chat-message", sender);
      messageDiv.innerText = content;
      chatMessages.appendChild(messageDiv);
      chatMessages.scrollTop = chatMessages.scrollHeight; // Auto-scroll to bottom
  }

  // Send button click event
  sendButton.addEventListener("click", function () {
      const userMessage = messageInput.value.trim();
      if (!userMessage) return;

      // Add user's message to the chat
      addMessage(userMessage, "user");
      messageInput.value = "";

      // Send the message to the backend
      axios
          .post("/chat/message", { message: userMessage })
          .then((response) => {
              const botMessage = response.data.reply;
              addMessage(botMessage, "bot");
          })
          .catch((error) => {
            console.error("Error sending message:", error);
            addMessage(`Error: ${error.response.status}`, "bot");
        });
  });
});
