document.addEventListener("DOMContentLoaded", function () {
    let menu = document.querySelector('#menu-bar');
    let navbar = document.querySelector('.navbar');
    let header = document.querySelector('.header-2');
    let userIcon = document.getElementById('user-icon');
    let modal = document.getElementById('login-modal');
    let closeButton = document.getElementById('close-login');
    let loginButton = document.getElementById('login-button');
    let registerButton = document.getElementById('register-button');
    let modalRegister = document.getElementById('modal-register');
    let closeRegister = document.getElementById('close-register');
    let registerSubmit = document.getElementById('register-submit');
    let successMessage = document.getElementById('success-message');
    let closeSuccess = document.getElementById('close-success');
    let errorMessage = document.getElementById('error-message');
    let closeError = document.getElementById('close-error');
    let username = document.getElementById('register-username');
    let password = document.getElementById('password-register');
    let passwordConfirm = document.getElementById('password-confirm-register');

    menu.addEventListener('click', () => {
        menu.classList.toggle('fa-times');
        navbar.classList.toggle('active');
    });

    window.onscroll = () => {
        menu.classList.remove('fa-times');
        navbar.classList.remove('active');

        if (window.scrollY > 150) {
            header.classList.add('active');
        } else {
            header.classList.remove('active');
        }
    };

    userIcon.addEventListener('click', () => {
        modal.style.display = 'block';
    });

    closeButton.addEventListener('click', () => {
        modal.style.display = 'none';
    });
    
    loginButton.addEventListener('click', () => {
        modal.style.display = 'none';
    });

    registerButton.addEventListener('click', () => {
        modalRegister.style.display = 'block';
    });

    closeRegister.addEventListener('click', () => {
        modalRegister.style.display = 'none';
    });

    registerSubmit.addEventListener('click', () => {
        const usernameValue = username.value;
        const passwordValue = password.value;
        const passwordConfirmValue = passwordConfirm.value;

        if (passwordValue === passwordConfirmValue) {
            modalRegister.style.display = 'none';
            successMessage.style.display = 'block';

            document.getElementById('success-text').textContent = "Registro bem-sucedido!";
        } else {
            document.getElementById('error-text').textContent = "As senhas não coincidem. Por favor, tente novamente.";
            errorMessage.style.display = 'block';
        }
    });

    closeSuccess.addEventListener('click', () => {
        successMessage.style.display = 'none';
    });

    closeError.addEventListener('click', () => {
        errorMessage.style.display = 'none';
    });

    window.addEventListener('click', (event) => {
        if (event.target === modal) {
            modal.style.display = 'none';
        } else if (event.target === modalRegister) {
            modalRegister.style.display = 'none';
        } else if (event.target === successMessage) {
            successMessage.style.display = 'none';
        } else if (event.target === errorMessage) {
            errorMessage.style.display = 'none';
        }
    });
});
