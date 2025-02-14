const signUpButton = document.getElementById('signUp')//link
const signInButton = document.getElementById('signIn')
const signUpForm = document.getElementById('signUpForm')//form
const signInForm = document.getElementById('signInForm')

signUpButton.addEventListener('click', function(){
    signInForm.classList.add('hidden');
    signUpForm.classList.remove('hidden');
});

signInButton.addEventListener('click', function(){
    signInForm.classList.remove('hidden');
    signUpForm.classList.add('hidden');
});

const urlParams = new URLSearchParams(window.location.search);
if (urlParams.get('registered') === 'true') {
    signInForm.style.display = "block";
    signUpForm.style.display = "none"; // Hide sign-up form
}

const togglePassword = document.getElementById('togglePassword');
        const passwordField = document.getElementById('password');
        const eyeIcon = document.getElementById('eyeIcon');

        togglePassword.addEventListener('click', () => {
            const type = passwordField.type === 'password' ? 'text' : 'password';
            passwordField.type = type;
            eyeIcon.classList.toggle('fa-eye-slash');
        });

        // Toggle password visibility for sign-in form
        const togglePassword1 = document.getElementById('togglePassword1');
        const passwordField1 = document.getElementById('password1');
        const eyeIcon1 = document.getElementById('eyeIcon1');

        togglePassword1.addEventListener('click', () => {
            const type = passwordField1.type === 'password' ? 'text' : 'password';
            passwordField1.type = type;
            eyeIcon1.classList.toggle('fa-eye-slash');
        });

