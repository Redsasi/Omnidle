<!DOCTYPE html>
<html>

<head>
   <meta charset="utf-8" />
   <title>Omnidle</title>
</head>

<body>
   <?php
   if (isset($_SESSION["userId"]))
      require '../view/layout/headerLogin.php';
   else
      require '../view/layout/headerLogout.php';
   ?>
   <h1>MENU PRINCIPAL</h1>
   <div class="quizzPage">
      <button onclick="pageDown()">&#9664;</button>
      <div class="displayQuizzes" id="displayQuizzes">
         <?php foreach ($quizzes as $quizz): ?>
            <a href="<?= URL_QUIZZES_PLAY ?>&quizzId=<?= $quizz["QUIZZ_ID"] ?>">
               <div class="quizzDisplay">
                  <h1><?= $quizz['QUIZZ_NAME'] ?></h1>
                  <img src="data:image/png;base64,<?= base64_encode($quizz["QUIZZ_IMAGE"]) ?>" alt="<?= $quizz['QUIZZ_NAME'] ?>">
                  <p><?= $quizz['QUIZZ_DESCRIPTION'] ?></p>
               </div>
            </a>
         <?php endforeach; ?>
      </div>
      <button onclick="pageUp()">&#9654;</button>
   </div>
   <script>
      var numPage = 1;

      function pageUp() {
         numPage++;
         displayPage();
      }

      function pageDown() {
         if (numPage > 1) {
            numPage--;
            displayPage()
         }
      }

      function addQuizz(quizz) {
         var container = document.getElementById("displayQuizzes");
         let link = document.createElement('a');
         link.href = "<?= URL_QUIZZES_PLAY ?>&quizzId=" + quizz["QUIZZ_ID"];

         let quizzDiv = document.createElement('div');
         quizzDiv.className = 'quizzDisplay';

         let title = document.createElement('h1');
         title.textContent = quizz["QUIZZ_NAME"];

         let img = document.createElement('img');
         img.src = 'data:image/png;base64,' + quizz["QUIZZ_IMAGE"];
         img.alt = quizz["QUIZZ_NAME"];

         let desc = document.createElement('p');
         desc.textContent = quizz["QUIZZ_DESCRIPTION"];

         // Assembler les éléments
         quizzDiv.appendChild(title);
         quizzDiv.appendChild(img);
         quizzDiv.appendChild(desc);
         link.appendChild(quizzDiv);
         container.appendChild(link);
      }

      function displayPage() {
         var xhr = new XMLHttpRequest();
         xhr.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
               document.getElementById("displayQuizzes").innerHTML = '';
               listQuizzes = JSON.parse(xhr.responseText);
               listQuizzes.forEach((e) => addQuizz(e));
            }
         };

         xhr.open("GET", "<?= URL_QUIZZES_GET_QUIZZES_PAGE ?>&page=" + numPage, true);
         xhr.send();
      }
      displayPage();
   </script>
</body>

</html>