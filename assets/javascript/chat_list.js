function start_iframe(link) {
    const contant = `
        <iframe src="${link}"></iframe>
    `;
    let frame = document.getElementById("chat_iframe");
    frame.innerHTML = contant;
}
