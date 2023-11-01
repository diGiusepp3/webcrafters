document.addEventListener("DOMContentLoaded", function () {
    const logoutLink = document.getElementById("logoutLink");
    const logoutResponse = document.getElementById("logoutResponse");

    logoutLink.addEventListener("click", function (e) {
        e.preventDefault(); // Prevent default link behavior

        // Perform AJAX request
        const xhr = new XMLHttpRequest();
        xhr.open("GET", "/functions/logout.php", true);
        xhr.onreadystatechange = function () {
            console.log("Ready state: " + xhr.readyState + ", Status: " + xhr.status);
            if (xhr.readyState === 4 && xhr.status === 200) {
                const response = JSON.parse(xhr.responseText);
                if (response.status === "success") {
                    // Handle successful logout
                    logoutResponse.textContent = "Uitgelogd!";
                    // Add additional logic here to update the page as needed.
                } else {
                    // Handle other response statuses
                    logoutResponse.textContent = "Er is iets fout gegaan.";
                }
            }
        };
        xhr.send();
    });
});
