let lastMessageId = 0;

function load_chat(other_id){
    let chat_box = document.getElementById("chat_box");

    fetch(`../handlers/chat_loader.php?other_id=${encodeURIComponent(other_id)}`)
        .then(response => response.json())
        .then(messages => {
            messages.forEach(msg => {
                if(msg.message_id > lastMessageId){
                    // create message div
                    const div = document.createElement("div");
                    div.textContent = msg.message;
                    if(msg.receiver_id === other_id){ // your message
                        div.className = "user_message";
                    } else { // other message
                        div.className = "other_message";
                    }

                    chat_box.appendChild(div);
                    chat_box.scrollTop = chat_box.scrollHeight; // auto-scroll

                    lastMessageId = msg.message_id;
                }
            });
        })
        .catch(err => console.error(err));

}

load_chat(window.other_id);
setInterval(() => {
    load_chat(window.other_id);
}, 2000);

let message_element = document.getElementById("message_input");

message_element.addEventListener("keydown", function(event){
    if(event.key == 'Enter'){
        send_message();
    }
});

function send_message(){
    let message = message_element.value;
    fetch(`../handlers/send_message.php?other_id=${encodeURIComponent(window.other_id)}&message=${encodeURIComponent(message)}`)
        .then(response => response.text())
        .then(data => {
            console.log(data); // optional: server response
            load_chat(window.other_id); // reload chat after sending
        })
        .catch(err => console.error(err));
    
    message_element.value = "";
}