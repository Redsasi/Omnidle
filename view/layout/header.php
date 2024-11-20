
<link href="../public/css/style.css" rel="stylesheet" /> 
<header>
    <nav>
    <div>
        <ul>
            <li><a href="<?=URL_DLEGAME_CREATE?>">Creat a new Quizz</a></li>
            <li><a href="#">Likn 6</a></li>
        </ul>
    </nav>
    </div>
    <div>

    </div>
    <div>
        <h1>OMNIDLE</h1>
    </div>
    <div class="userMenu">
    <?php if(isset($_SESSION["userId"])): ?>
        <div class="dropdown">
            <img src="../public/image/userConnected.png" alt="Connected User Icone">
            <div class="dropdown-content">
            <a href="<?=URL_USER_LOGOUT?>">Logout</a>
            </div>
        </div>
    <?php else: ?>
        <div class="dropdown">
            <img src="../public/image/connexion.png" alt="User Icone">
            <div class="dropdown-content">
                <a href="<?=URL_USER_LOGIN?>">Login</a>
                <a href="<?=URL_USER_SINGUP?>">Singup</a>
            </div>
        </div>
    <?php endif; ?>
    </div>
</header>