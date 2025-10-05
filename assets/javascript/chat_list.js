function start_iframe(link) {
    let chat_list = document.getElementById("chat_list");

    chat_list.classList.add("srink");

    const contant = `
        <iframe src="${link}"></iframe>
    `;
    let frame = document.getElementById("chat_iframe");
    frame.innerHTML = contant;
}
