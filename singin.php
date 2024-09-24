<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>Omnidle</title>
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
  <?php include_once("include/header.php");?>
  <?php include_once("include/nav.php");?>
      <main>
        <div>
            <label for="singin_username">username :</label>
            <input type="text" id="singin_username" name="singin_username"  required>
            <label for="singin_email">Email :</label>
            <input type="email" name="singin_email" id="singin_email" required>
            <label for="password">Password :</label>
            <input type="password" id="singin_password" name="singin_password" required>
        </div>
        <button id="btn_creat_acount">sing in</button>
        <script>
        //envoyer la demande de connexion
        document.getElementById('btn_creat_acount').addEventListener('click', function() {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    var jsonData = JSON.parse(xmlhttp.responseText);
                    if (jsonData.success) {
                        alert(jsonData.message);
                    }else{
                        alert(jsonData.error);
                        input_username.value = NULL;
                        input_motdepass.value = NULL;
                        input_motdepass.value = NULL;
                    }
                }
            };
            //reception des donnée et traitement de celle ci
            let data = new FormData();
            var input_username = document.getElementById('singin_username');
            console.dir(input_username);
            var input_email = document.getElementById('singin_email');
            console.dir(input_email);
            var input_motdepass = document.getElementById('singin_password');
            console.dir(input_motdepass);

            data.append('username', input_username.value);
            data.append('email',input_email.value);
            data.append('password', input_motdepass.value);

            //envoie de la requete HTML
            xmlhttp.open("POST", "crud/account/create_acount.php");
            xmlhttp.send(data);       
        });
        </script>
      </main>
      <?php include_once("include/footer.php");?>
  </body>
</html>