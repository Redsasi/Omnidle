<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8" />
      <title>Sign in</title>
      <link href="style.css" rel="stylesheet" /> 
   </head>
   <body>
    <form action="<?=URL_USER_SINGUP?>" method="post">
        <label for="pseudo">Pseudo</label>
        <input type="text" name="pseudo" required>
        
        <label for="email">Email</label>
        <input type="text" name="email" required>
        
        <label for="password">Mot de pass</label>
        <input type="password" name="password" required>
        <button type="submit">envoyer</button>
    </form>
   </body>
</html>