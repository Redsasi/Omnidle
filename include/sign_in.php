<div id="connexion" class="hidden">
        <label for="email">Email : </label>
        <input type="text" id="email" name="email">
        <label for="password">Password : </label>
        <input type="password" id="password" name="password">
        <button>connexion</button>
        <a href="inscription.php">create an account</a>
        <script>
            //hide and show the connexion box
            //https://stackoverflow.com/questions/33060993/click-outside-div-to-hide-div-in-pure-javascript
            document.onclick = function(e){
                let connDiv = document.getElementById('connexion');
                if(connDiv.contains(e.target) || e.target.id == 'logginImg' && connDiv.className == 'hidden'){
                    connDiv.className  = 'visible';
                }
                else{
                    connDiv.className  = 'hidden';
                }
            };
        var input_email = document.getElementById('email');
        var input_motdepass = document.getElementById('password');
        //envoyer la demande de connexion
        document.getElementById('login_submit').addEventListener('click', function() {
            //document.body.style.cursor = 'wait';
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    var jsonData = JSON.parse(xmlhttp.responseText);
                    if (jsonData.success) {
                        alert(jsonData.message);
                    }else{
                        alert(jsonData.message);
                        input_email.value = NULL;
                        input_motdepass.value = NULL;
                    }
                    //document.body.style.cursor = 'pointer';
                    //que faire a la récéption de la page web ( afficher une réponse/message d'erreur ou les liste ect...)
                }
            };
            //reception des donnée et traitement de celle ci
            let data = new FormData();

            //reception des donnée et traitement de celle ci
            data.append('email',input_email.value);
            data.append('password', input_motdepass.value);

            xmlhttp.open("POST", "crud/account/login.php");//la page de connexion
            xmlhttp.send(data);       
        });
        </script>
    </div>