
// Jelszó figyelmeztető kiírása
document.getElementById('pass1').addEventListener('input', function() {
    var pass1 = this.value;
    var pass1Error = document.getElementById('pass1_error');
    var pass2 = document.getElementById('pass2');
    var pass2Error = document.getElementById('pass2_error');

    var minLength = pass1.length >= 6;
    var hasUpperCase = /[A-Z]/.test(pass1);
    var hasNumber = /[0-9]/.test(pass1);
    var pass_text = "";

    if (minLength) {
        pass_text += "<span id='text1' style='color: green;'>Legyen legalább 6 karakter hosszú!</span><br>";
    } else {
        pass_text += "<span id='text1' style='color: red;'>Legyen legalább 6 karakter hosszú!</span><br>";
    }
    if (hasUpperCase) {
        pass_text += "<span id='text2' style='color: green;'>Legyen benne nagybetű!</span><br>";
    } else {
        pass_text += "<span id='text2' style='color: red;'>Legyen benne nagybetű!</span><br>";
    }
    if (hasNumber) {
        pass_text += "<span id='text3' style='color: green;'>Legyen benne szám!</span><br>";
    } else {
        pass_text += "<span id='text3' style='color: red;'>Legyen benne szám!</span><br>";
    }

    if (pass1 === '') {
        pass1Error.style.display = 'none';
        pass2.disabled = true;
    } else {
        pass1Error.style.display = 'block';
        pass1Error.innerHTML = pass_text;
        pass2.disabled = false;
    }
});

document.getElementById('pass2').addEventListener('input', function() {
    var pass1 = document.getElementById('pass1').value;
    var pass2 = this.value;
    var pass2Error = document.getElementById('pass2_error');

    if (pass2 === '') {
        pass2Error.style.display = 'none';
    } else {
        if (pass2 === pass1) {
            pass2Error.style.color = 'green';
            pass2Error.innerHTML = 'A két jelszónak egyeznie kell.';
        } else {
            pass2Error.style.color = 'red';
            pass2Error.innerHTML = 'A két jelszónak egyeznie kell.';
        }
        pass2Error.style.display = 'block';
    }
});

// Checkbox
document.getElementById('showPass').addEventListener('change', function() {
    var pass1 = document.getElementById('pass1');
    var pass2 = document.getElementById('pass2');
    var pass3 = document.getElementById('pass');
    
    if (this.checked) {
        pass1.type = 'text';
        pass2.type = 'text';
        pass3.type = 'text';
    } else {
        pass1.type = 'password';
        pass2.type = 'password';
        pass3.type = 'password';
    }
});

// Checkbox
document.getElementById('showPass2').addEventListener('change', function() {
    var pass3 = document.getElementById('pass');
    
    if (this.checked) {
        pass3.type = 'text';
    } else {
        pass3.type = 'password';
    }
});