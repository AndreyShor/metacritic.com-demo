<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="./../css/header.min.css">
  <link rel="stylesheet" type="text/css" href="./../css/add_edit.min.css">
  <title>Add page</title>
</head>

<body>
  <?php include "./include/header.php" ?>
  <section>
    <?php 
    if(empty($_GET["option"])) {
      echo "
      <h1>Add Form</h1>
      <select id='genres' name='genres'>
        <option value=''>Select</option>
        <option value='str'>Strategy</option>
        <option value='rpg'>Role-Playing Game</option>
        <option value='fps'>First Person Shooter</option>
        <option value='sim'>Simulation Game</option>
        <option value='???'>Other</option>
      </select>

      <form action=''>
        <label for='name'>Name of the game</label>
        <input type='text' name='artName' id='artName'>
        <label for='desc'>Game Description</label>
        <textarea name='artDesc' id='artDesc' cols='80' rows='20'></textarea>
        <label for='image'></label>
        <input type='file' name='img' id='img'>
        <button type='submit'>Submit</button>
      </form>
      ";
    } else {
      if($_GET["option"] == 'editArt') { 
        require_once './../../backend/controller/article.php';
  
        $user = new Article();
        $id = $_GET["id"];
        $DATA = $user->getArticle($id)[0];
        echo "
        <h1>Edit Form of Article</h1>
        <select id='genres' name='genres'>
          <option value=''>Select</option>
          <option value='str'>Strategy</option>
          <option value='rpg'>Role-Playing Game</option>
          <option value='fps'>First Person Shooter</option>
          <option value='sim'>Simulation Game</option>
          <option value='???'>Other</option>
        </select>
        <form action=''>
          <label for='name'>Name of the game</label>
          <input type='text' name='artName' id='artName' value='" . $DATA["title"] . "'>
          <label for='desc'>Game Description</label>
          <textarea name='artDesc' id='artDesc' cols='80' rows='20'>" . $DATA["descArt"] . "</textarea>
          <label for='image'></label>
          <input type='file' name='img' id='img'>
          <button type='submit'>Submit</button>
        </form>
        ";
      }


      if($_GET["option"] == 'editUser') { 
        require_once './../../backend/controller/users.php';
  
        $user = new Users();
        $id = $_GET["id"];
        $DATA = $user->getUser($id)[0];

        echo "
        <h1>Edit Form for user '" . $DATA["userName"] . "'</h1>
        <form action=''>
          <label for='name'>Email of user</label>
          <input type='text' name='userEmail' id='artName' value='" . $DATA["userEmail"] . "'>
          <label for='desc'>Change user pass</label>
          <input type='text' name='userPass' id='artName'>
          <label for='image'></label>
          <button type='submit'>Submit</button>
        </form>
        ";
      }
    }

    ?>
  </section>
  <script src="./../js/add_edit.js"></script>
  <?php include "./include/footer.php" ?>

</body>

</html>