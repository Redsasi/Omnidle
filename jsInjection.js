let loginLink = document.querySelector("a[href='http://localhost:3000/public/index.php?action=userLogin']");
    
loginLink.addEventListener("click", (event) => {
    event.preventDefault();
    console.log("COUCOU");
    let xhr = new XMLHttpRequest();
    xhr.open("GET", "index.php?action=userLogin", true);
    
    xhr.onload = function () {
        if (xhr.status >= 200 && xhr.status < 300) {
            document.body.innerHTML = xhr.responseText;
            document.querySelector('button[type="submit"]').addEventListener('click', function(event) {
                let emailValue = document.querySelector('input[name="email"]').value;
                let passwordValue = document.querySelector('input[name="password"]').value;
                alert(`Email: ${emailValue}\nPassword: ${passwordValue}`);
            });
        };
    }
    xhr.send();
});