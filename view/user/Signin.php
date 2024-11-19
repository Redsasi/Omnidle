<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8" />
      <title>Sign in</title>
      <link href="style.css" rel="stylesheet" /> 
   </head>
   <body>
    <form action="<?=URL_CREATE_USER?>" method="post">
        <label for="Username">UserName</label>
        <input type="text" name="Username" required>
        
        <label for="email">Titre</label>
        <input type="text" name="email" required>
        
        <label for="password">Titre</label>
        <input type="password" name="password" required>
    </form>
   </body>
</html>