<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Game List</title>
  <link rel="stylesheet" type="text/css" href="./../css/style.min.css">
  <link rel="stylesheet" type="text/css" href="./../css/header.min.css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
</head>

<body>
  
  <?php include "./include/header.php" ?>

  <section>
    <h1>All Game List</h1>
    <label for="genres">Choose a game genre:</label>

    <select id="cars" name="genres" onchange="location = this.value;">
      <option value="">Select</option>
      <option value="http://localhost/public/view/articles.php?genre=str">Strategy</option>
      <option value="http://localhost/public/view/articles.php?genre=rpg">Role-Playing Game</option>
      <option value="http://localhost/public/view/articles.php?genre=fps">First Person Shooter</option>
      <option value="http://localhost/public/view/articles.php?genre=sim">Simulation Game</option>
      <option value="http://localhost/public/view/articles.php?genre=???">Other</option>
    </select>
    
    <?php
    require_once './../../backend/controller/article.php';

    $user = new Article();
    $DATA = $user->getArticles();

    if(empty($_GET["genre"])) {

      $user = new Article();
      $DATA = $user->getArticles();

      foreach ($DATA as $d) {

        echo "
        <article>
          <h2>". $d['title'] ."</h2>
          <img src='". $d['imageUrl'] ."' alt='". $d['title'] ."'>
          <p> ". $d['descArt'] ." </p>
          <div class='btn'>
            <a href='/public/view/article.php?id=". $d['id'] . "'class='btn-1'>
              <span class='txt' '>More</span>
              <span class='round'><i class='fa fa-chevron-right'></i></span>
            </a>
          </div>
        </article> ";

      }
    } else {

      $user = new Article();
      $DATA = $user->filterArticle($_GET["genre"]);
      foreach ($DATA as $d) {


        echo "
        <article>
          <h2>". $d['title'] ."</h2>
          <img src='". $d['imageUrl'] ."' alt='". $d['title'] ."'>
          <p> ". $d['descArt'] ." </p>
          <div class='btn'>
            <a href='/public/view/article.php?id=". $d['id'] . "'class='btn-1'>
              <span class='txt' '>More</span>
              <span class='round'><i class='fa fa-chevron-right'></i></span>
            </a>
          </div>
        </article> ";
        
      }

      
    }
    ?>

  </section>
  <?php include "./include/footer.php" ?>

</body>

</html>