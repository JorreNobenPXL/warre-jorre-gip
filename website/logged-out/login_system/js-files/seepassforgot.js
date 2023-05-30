const togglePasswordnew = document.querySelector('#togglePasswordnew');
const passwordnew = document.querySelector('#newpass');

  togglePasswordnew.addEventListener('click', function (e) {
    // toggle the type attribute
    const type = passwordnew.getAttribute('type') === 'password' ? 'text' : 'password';
    passwordnew.setAttribute('type', type);
    // toggle the eye slash icon
    this.classList.toggle('fa-eye-slash');
});

const togglePasswordconfirm = document.querySelector('#togglePasswordconfirm');
const passwordconfirm = document.querySelector('#confirmpass');

  togglePasswordconfirm.addEventListener('click', function (e) {
    // toggle the type attribute
    const type = passwordconfirm.getAttribute('type') === 'password' ? 'text' : 'password';
    passwordconfirm.setAttribute('type', type);
    // toggle the eye slash icon
    this.classList.toggle('fa-eye-slash');
});