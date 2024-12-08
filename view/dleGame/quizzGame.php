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
      <script src="../public/js/dleGame.js"></script>
      <div id="game">
         <div id="gameInput">
            <select name="entityInput" id="entityInput">
               <option value="">--Please choose an option--</option>
            </select>
            <button onclick="playGame()">ok</button>
         </div>
         <table id="tblTry">
         </table>    
      </div>
   </body>
</html>