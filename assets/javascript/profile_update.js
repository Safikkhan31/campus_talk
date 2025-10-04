function showModal(contentHTML) {
    const overlay = document.getElementById("modal_overlay");
    const box = document.getElementById("modal_box");

    box.innerHTML = `
        ${contentHTML}
    `;

    overlay.style.display = "flex";

    // close modal
    document.getElementById("close_modal").onclick = () => {
        overlay.style.display = "none";
    };
}

function start_iframe(name = "", branch = "", department = "", year = 0, cgpa = 0) {
    const formHTML = `
        <form action="../handlers/profile_update.php" target="_parent" method="POST">
            <button id="close_modal">&times;</button>
            <label for="user_name">Name:</label>
            <input name="user_name" value="${name}" required>

            <label for="branch">Branch:</label>
            <input name="branch" value="${branch}" required>

            <label for="department">Department:</label>
            <input name="department" value="${department}" required>

            <label for="year">Year:</label>
            <input name="year" type="number" value="${year}" required>

            <label for="cgpa">CGPA:</label>
            <input name="cgpa" type="number" step="0.01" value="${cgpa}" required>

            <input type="submit" value="Update Profile">
        </form>
    `;

    showModal(formHTML);
}

function start_iframe_icon() {
    const formHTML = `
        <form action="../handlers/profile_icon_update.php" target="_parent" method="POST" enctype="multipart/form-data">
            <button id="close_modal">&times;</button>
            <label for="profile_icon">Profile Image:</label>
            <input type="file" name="profile_icon" accept="image/*" required>

            <input type="submit" value="Upload Image">
        </form>
    `;

    showModal(formHTML);
}
