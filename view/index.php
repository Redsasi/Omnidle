<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8" />
      <title>Omnidle</title>
   </head>
   <body>
      <?php
         if(isset($_SESSION["userId"]))
            require '../view/layout/headerLogin.php';
         else
            require '../view/layout/headerLogout.php';
      ?>
      <h1>MENU PRINCIPAL</h1>
      <div class="displayQuizzes">
         <?php foreach($quizzes as $quizz):?>
            <a href="<?=URL_QUIZZES_PLAY?>&quizzId=<?=$quizz["QUIZZ_ID"]?>">
               <div class="quizzDisplay">
                  <h1><?=$quizz['QUIZZ_NAME']?></h1>
                  <img src="data:image/png;base64,<?=base64_encode($quizz["QUIZZ_IMAGE"])?>" alt="<?=$quizz['QUIZZ_NAME']?>">
                  <p><?=$quizz['QUIZZ_DESCRIPTION']?></p>
               </div>
            </a>
         <?php endforeach; ?>
      </div>
   </body>
</html>