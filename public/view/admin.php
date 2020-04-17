<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./../css/header.min.css">
    <link rel="stylesheet" type="text/css" href="./../css/admin.min.css">
    <title>Admin</title>

</head>

<body>
    <?php include "./include/header.php" ?>

    <section>
        <h1>Admin Panel</h1>

        <div class="wrapper">
            <h2>Articles List</h2>
            <label for="genres">Choose a article genre:</label>

            <select id="cars" name="genres">
                <option value="str">Strategy</option>
                <option value="rpg">Role-Playing Game</option>
                <option value="fps">First Person Shooter</option>
                <option value="sim">Simulation Game</option>
                <option value="???">Other</option>
            </select>
            <div class="scroll">
                <div class="scrollcontent">
                    <ul>
                    <?php
                    require_once './../../backend/controller/article.php';

                    $user = new Article();
                    $DATA = $user->getArticles();
                    foreach ($DATA as $d) {
                        echo "
                        <li>
                            <h3 class='name'>" . $d["title"] . "</h3>
                            <a href='/public/view/article.php?id=". $d['id'] . "'>Watch Article</a>
                            <a href='./add_edit.php?id=". $d['id'] . "&option=editArt'><button class='edit'>Edit</button></a>
                            <a href='/backend/router/admin-routs.php?id=". $d['id'] . "&option=article'><button class='delete'>Delete</button></a>
                        </li>
                        ";
                    }
                    ?>
                    </ul>
                </div>
                <div class="scrollbar">
                    <div id="scroller" class="scroller"></div>
                </div>
            </div>

            <a href="./add_edit.php" class="add"><button>Add Article</button></a>
        </div>



        <div class="wrapper user">
            <h2>User List</h2>
            <div class="scroll">
                <div class="scrollcontent">
                    <ul>

                        <?php
                            require_once './../../backend/controller/users.php';

                            $user = new Users();
                            $DATA = $user->getUsers();
                            
                            foreach ($DATA as $d) {
                                echo "
                                <li>
                                    <h3 class='name'>" . $d["userName"] . "</h3>
                                    <p>Data of Register: " . $d["reg_date"] . "</p>
                                    <a href='./add_edit.php?id=". $d['id'] . "&option=editUser'><button class='edit'>Edit</button></a>
                                    <a href='/backend/router/admin-routs.php?id=". $d['id'] . "&option=deleteUser'><button class='delete'>Delete</button></a>
                                    <a href='/'><button class='comment'>See Coments</button></a>
                                </li>
                                ";
                            }
                        ?>
                    </ul>
                </div>
                <div class="scrollbar">
                    <div class="scroller" class="scroller"></div>
                </div>
            </div>
        </div>

    </section>

    <?php include "./include/footer.php" ?>


    <script type="text/jаvascript">
        TINY.scroller.init('scroll','scrollcontent','scrollbar','scroller','buttonclick');
    </script>
</body>

</html>