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
            <button id="input">ok</button>
         </div>
         <table id="tblEntityTry">
            <thead><td>Name</td><td>First appeared</td><td>Filename extensions</td><td>Paradigme</td><td>Auteur</td></thead>
            <tbody id="EntityTry">
               <tr><td>JAVA</td><td class="tryTrue">1995</td><td class="tryFalse">.java, .class, .jar, .jad, .jmod</td><td class="tryPartial">orienté objet, impératif, Structuré, générique'</td><td class="tryFalse">Oracle Corporation</td></tr>
            </tbody>
         </table>    
      </div>
   </body>
</html>