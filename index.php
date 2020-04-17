<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Game Blog</title>
    <link rel="stylesheet" type="text/css" href="./public/css/style.min.css">
    <link rel="stylesheet" type="text/css" href="./public/css/header.min.css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
</head>

<body>

  <header>
    <ul>
      <a href="/"><li>Home</li></a>
      <a href="./../public/view/articles.php"><li>Game List</li></a>
      

      <?php
        include './backend/controller/auth.php';
        session_start();
        if (isset($_SESSION["Login"])) {
          $user = new Auth();
          if($user->userIsAdmin($_SESSION["user"])){
              echo '
              <a href="./../public/view/admin.php">
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
            <a on href="./../public/view/login.php">
                <li>Login</li>
            </a> ';
        }

        
        ?>

    </ul>
  </header>
   <div class="intro">
        <div class="intro__text">

          <div class="content">
            <div class="content__container">
              <p class="content__container__text">Hello</p>

              <ul class="content__container__list">
                <li class="content__container__list__item">world !</li>
                <li class="content__container__list__item">bob !</li>
                <li class="content__container__list__item">users !</li>
                <li class="content__container__list__item">everybody !</li>
              </ul>
            </div>
          </div>
          <hr>
          <h2>Game Review Blogggg</h2>
        </div>
    </div>

    <section>
        <h1>Games</h1>
        <article>
            <h2>Sid Meier’s Civilization VI</h2>
            <img src="./public/img/civi.jpg" alt="desert">
            <p>Too cultivated use solicitude frequently. Dashwood likewise up consider continue entrance ladyship oh.
                Wrong guest given purse power is no. Friendship to connection an am considered difficulty. Country met
                pursuit lasting moments why calling certain the. Middletons boisterous our way understood law. Among
                state cease how and sight since shall. Material did pleasure breeding our humanity she contempt had. So
                ye really mutual no cousin piqued summer result. </p>

        </article>
        <article>
            <h2>Disco Elysium</h2>
            <img src="./public/img/disco.jpg" alt="mars">
            <p>Although moreover mistaken kindness me feelings do be marianne. Son over own nay with tell they cold upon
                are. Cordial village and settled she ability law herself. Finished why bringing but sir bachelor
                unpacked any thoughts. Unpleasing unsatiable particular inquietude did nor sir. Get his declared
                appetite distance his together now families. Friends am himself at on norland it viewing. Suspected
                elsewhere you belonging continued commanded she. </p>
        </article>

    <div class="btn_more">
      <a href="./../public/view/articles.php" class="btn-1">
        <span class="txt">More Articles</span>
        <span class="round"><i class="fa fa-chevron-right"></i></span>
      </a>
    </div>

    </section>
    <footer>
        <div class="upper">
          <div class="logo">
            <h3>Creator: Andrey Shorstkin</h3>
            <h2>Online Blog, Essex Uni. Project</h2>
          </div>
          <ul class="footer_menu">
            <li class="item"><a href="" >Main Page</a></li>
            <li class="item"><a href="" >Admin Page</a></li>
            <li class="item"><a href="" >Login</a></li>
            <li class="item"><a href="" >Register</a></li>
          </ul>
        </div>
        <div class="lower">
          <ul class="copyright">
            <li>Address: Colchester, UK </li>
            <li>Andrey: andrejs232@gmail.com</li>
            <li>© Copyright 2019</li>
          </ul>
        </div>
      </footer>

      <script src="./public/js/auth.js"></script>
</body>

</html>