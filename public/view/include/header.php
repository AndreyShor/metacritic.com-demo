

<script src="./../js/auth.js"></script>
<header>
    <ul>
        <a href="./../../index.php">
            <li>Home</li>
        </a>
        <a href="./articles.php">
            <li>Game List</li>
        </a>
        <?php
        require_once './../../backend/controller/auth.php';
        session_start(); 
        if (isset($_SESSION["Login"])) {
            $user = new Auth();
            if($user->userIsAdmin($_SESSION["user"])){
                echo '
                <a href="./admin.php">
                    <li>Admin</li>
                </a>  ';
            } else {
                echo '';
            }
        }
        if (isset($_SESSION["Login"])) {
            if($_SESSION["Login"] = true){
                echo '
                <a onclick="onExit()">
                    <li>Exit</li>
                </a> "';
            }
        } else {
            echo '
            <a href="./login.php">
                <li>Login</li>
            </a> ';
        } 
        ?>
    </ul>
</header>
