function checkPasswordStrength() {
    const password = document.getElementById('password').value;
    const strengthText = document.getElementById('password-strength');

    if (password.length === 0) {
        strengthText.textContent = '';
        strengthText.style.color = '';
        return;
    }

    let strength = 0;

    if (password.length >= 8) strength++;
    if (/[A-Z]/.test(password)) strength++;
    if (/\d/.test(password)) strength++;

    if (strength === 0) {
        strengthText.textContent = 'Nagyon gyenge';
        strengthText.style.color = 'red';
    } else if (strength === 1) {
        strengthText.textContent = 'Gyenge';
        strengthText.style.color = 'orange';
    } else if (strength === 2) {
        strengthText.textContent = 'Közepes';
        strengthText.style.color = 'goldenrod';
    } else if (strength === 3) {
        strengthText.textContent = 'Erős';
        strengthText.style.color = 'green';
    }
}
