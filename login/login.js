function login() {

    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;
    const login_form = document.getElementById('login_form');

    // Validate username length
    if (username.length < 8) {
        const message = '<div class="alert alert-danger p-1" role="alert"><i class="bi bi-exclamation-circle me-1"></i>Username must be at least 8 characters long</div>';
        document.getElementById('alert').innerHTML = message;
        login_form.reset();
        return;
    } else {
        // Show spinner and disable the button
        // document.getElementById('spinner').style.display = 'inline-block';
        // document.getElementById('status').style.display = 'inline-block';
        // document.getElementById('loginButton').disabled = true;

        let formData = new FormData();
        formData.append('username', username);
        formData.append('password', password);

        fetch('../login/toLogin.php', {
            method: 'POST',
            body: formData
        })
            .then(response => {
                console.log(response);
                if (!response.ok) {

                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                console.log(data);
                if (!data.success) {
                    const message = '<div class="alert alert-danger p-1" role="alert"><i class="bi bi-exclamation-circle me-1"></i>' + data.message + '</div>';
                    document.getElementById('alert').innerHTML = message;
                    login_form.reset();
                } else {
                    login_form.reset();
                    window.location.href = data.redirect;
                }



            })
            .catch(error => {
                console.error('Error:', error);
                // login_form.reset();
            });
    }



}

function register() {

    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;

    let formData = new FormData();
    formData.append('username', username);
    formData.append('password', password);

    fetch('../login/toRegister.php', {
        method: 'POST',
        body: formData
    })
        .then(response => {
            console.log(response);
            if (!response.ok) {

                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            console.log(data);

        })
        .catch(error => {
            console.error('Error:', error);
        });

}