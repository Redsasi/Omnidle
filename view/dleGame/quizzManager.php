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
        <script src="../public/js/quizzManager.js"></script>
        <table class="quizzManager">
            <tr>
                <td class="dragElement">Attributs</td>
                <td class="dragElement">Entity</td>
            </tr>
            <tr>
                <td class="dropElement">Attributs value</td>
                <td class="dropElement">Entity value</td>
            </tr>
        </table>
    </body>
</html>