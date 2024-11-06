$(document).ready(function() {
    $('#registerForm').on('submit', function(e) {
        e.preventDefault();
        const username = $('#username').val();
        const email = $('#email').val();
        const password = $('#password').val();
        const confirmPassword = $('#confirmPassword').val();

        if (password !== confirmPassword) {
            $('#message').text("Passwords do not match.").css('color', 'red');
            return;
        }

        $.ajax({
            url: 'server.php',
            method: 'POST',
            data: {
                action: 'register',
                username: username,
                email: email,
                password: password
            },
            success: function(response) {
                $('#message').text(response);
                if (response.includes("successful")) {
                    setTimeout(() => {
                        window.location.href = 'index.html';
                    }, 2000);
                }
            }
        });
    });

    $('#loginForm').on('submit', function(e) {
        e.preventDefault();
        const email = $('#loginEmail').val();
        const password = $('#loginPassword').val();

        $.ajax({
            url: 'server.php',
            method: 'POST',
            data: {
                action: 'login',
                email: email,
                password: password
            },
            success: function(response) {
                $('#loginMessage').text(response);
                if (response.includes("successful")) {
                    setTimeout(() => {
                        window.location.href = 'profile.html';
                    }, 2000);
                }
            }
        });
    });

    $('#profileForm').on('submit', function(e) {
        e.preventDefault();
        const username = $('#profileUsername').val();
        const email = $('#profileEmail').val();
        const password = $('#profilePassword').val();

        $.ajax({
            url: 'server.php',
            method: 'POST',
            data: {
                action: 'updateProfile',
                username: username,
                email: email,
                password: password
            },
            success: function(response) {
                $('#profileMessage').text(response);
            }
        });
    });

    $('#logout').on('click', function() {
        $.ajax({
            url: 'server.php',
            method: 'POST',
            data: {
                action: 'logout'
            },
            success: function(response) {
                window.location.href = 'index.html';
            }
        });
    });

    $('#backToMain').on('click', function() {
        window.location.href = 'index.html';
    });
});
