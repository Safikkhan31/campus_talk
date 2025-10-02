let iframe = document.getElementById("profile_update_iframe");

function start_iframe(name="", branch="", department="", year=0, cgpa=0){
    let iframe_html = `
        <iframe srcdoc='
            <html>
                <body>
                    <form action="../handlers/profile_update.php" target="_parent" method="POST">
                        <label for="user_name">Name:</label>
                        <input name="user_name" value="${name}">

                        <br>

                        <label for="branch">Branch:</label>
                        <input name="branch" value="${branch}">

                        <br>

                        <label for="department">Department:</label>
                        <input name="department" value="${department}">

                        <br>

                        <label for="year">Year:</label>
                        <input name="year" value="${year}"><br>

                        <label for="cgpa">CGPA:</label>
                        <input name="cgpa" value="${cgpa}">

                        <input type="submit">
                    </form>
                </body>
            </html>
        '>
        </iframe>
    `;

    iframe.innerHTML = iframe_html;
}

function start_iframe_icon(){
    let iframe_html = `
        <iframe srcdoc='
            <html>
                <body>
                    <form action="../handlers/profile_icon_update.php" target="_parent" method="POST" enctype="multipart/form-data">
                        
                        <label for="profile_icon">pofile_image:</label>
                        <input type="file" name="profile_icon">

                        <input type="submit">
                    </form>
                </body>
            </html>
        '>
        </iframe>
    `;

    iframe.innerHTML = iframe_html;
}