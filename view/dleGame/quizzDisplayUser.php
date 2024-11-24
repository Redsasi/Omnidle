<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8" />
      <title>Omnidle</title>
      <link href="style.css" rel="stylesheet" /> 
   </head>
   <body>
      <h1>MENU PRINCIPAL</h1>
      <div class="displayQuizzes">
         <?php foreach($quizzes as $quizz):?>
         <div class="quizzDisplay">
            <h1><?=$quizz['QUIZZ_NAME']?></h1>
            <img src="data:image/png;base64,<?=base64_encode($quizz["QUIZZ_IMAGE"])?>" alt="<?=$quizz['QUIZZ_NAME']?>">
            <p><?=$quizz['QUIZZ_DESCRIPTION']?></p>
            <div class="quizzAction">
               <a href="<?=URL_QUIZZES_UPDATE?>&id=<?=$quizz["QUIZZ_ID"]?>"><button>Updage</button></a>
               <a><button>Delete</button></a>
            </div>
         </div>
         <?php endforeach; ?>
      </div>
   </body>
</html>