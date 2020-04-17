<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./../css/header.min.css">
    <link rel="stylesheet" type="text/css" href="./../css/article.min.css">
    <title>Document</title>
</head>

<body>
    <?php include "./include/header.php" ?>
    <?php 
    require_once './../../backend/controller/article.php';

    $user = new Article();
    $id = $_GET["id"];
    $DATA = $user->getArticle($id)[0];
    echo "
        <section class='artcile'>
            <img src='" . $DATA["imageUrl"] . "' alt='civil'>
            <h1>" . $DATA["title"] . "</h1>
            <p>" . $DATA["descArt"] . "</p>
        </section>
        ";
    ?>

    <section class="comments">
        <?php 
    if (isset($_SESSION["Login"])) {
        if($_SESSION["Login"] = true){
            echo '
            <h2>Your Review</h2>
            <textarea name="" id="comment_text" cols="180" rows="30"></textarea>
            <div class="rating_block">
                <input name="rating" value="5" id="rating_5" type="radio" />
                <label for="rating_5" class="label_rating"></label>

                <input name="rating" value="4" id="rating_4" type="radio" />
                <label for="rating_4" class="label_rating"></label>

                <input name="rating" value="3" id="rating_3" type="radio" />
                <label for="rating_3" class="label_rating"></label>

                <input name="rating" value="2" id="rating_2" type="radio" />
                <label for="rating_2" class="label_rating"></label>

                <input name="rating" value="1" id="rating_1" type="radio" />
                <label for="rating_1" class="label_rating"></label>
            </div>
            <button id="submit_comment" for="name">Submit</button>
            ';
        } else {
            echo '';
        }
    } else {
        echo '';
    }
    ?>




        <h2>Peoples Review</h2>
        <hr>
        <?php 
        require_once './../../backend/controller/users.php';

        $user = new Users();
        $DATA = $user->fetchComments($id);

        foreach($DATA as $d) {
            echo "
            <div class='comment'>
                <h3>" . $d["userName"] . "</h3>
                <h3>" . $d["rating"] . "/5</h3>
                <p>" . $d["review"] . "</p>
            </div>
            ";
        }

        ?>
    </section>


    <?php include "./include/footer.php" ?>
</body>
<script src="./../js/article_comment.js"></script>

</body>

</html>