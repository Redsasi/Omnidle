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
      <form action="<?=URL_QUIZZES_UPDATE?>&quizzId=<?=$quizz["QUIZZ_ID"]?>" method="post" enctype="multipart/form-data">
         <label for="name">Name</label>
         <input type="text" name="name" value="<?=$quizz['QUIZZ_NAME']?>" required>
         
         <label for="description">Description</label>
         <input type="text" name="description" value="<?=$quizz['QUIZZ_DESCRIPTION']?>" required>
         
         <label for="image">Image</label>
         <input type="file" id="image" name="image" accept="image/*">

         <button type="submit">envoyer</button>
      </form>
      <div>
         
      </div>
   </body>
</html>