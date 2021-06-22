<!DOCTYPE html>
<html lang="lt">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Exo:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <title>U3</title>
</head>

<?php
// Connection credentials
$mysqli = new mysqli("localhost", "root", "student", "egzaminas");

// Check connection
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}

// get all results from table 
$result = mysqli_query($mysqli, "select courses.id, title, image_path, long_description, author, rating, count(comments.id) as comments_count from courses 
JOIN comments on courses.id=comments.course_id GROUP BY comments.course_id");
?>

<body>
    <header class="mb-5">
        <img id="logo" src="./img/logo.png" alt="logo">
    </header>
    <main>
        <section>

            <div class="container">
                <h2>Naujausi kursai</h2>
                <div class="row">
                    <?php
                    // print all records
                    while ($row = mysqli_fetch_object($result)) {
                    ?>
                        <div class="card col mx-auto col-4 my-3 mx-2" style="width: 18rem;">
                            <img src="<?= $row->image_path ?>" class="card-img-top" alt="css">
                            <div class="card-body">
                                <h5 class="card-title"><a href="#"><?= $row->title ?></a></h5>
                                <h6 class="card-subtitle mb-2 text-muted"><?= $row->author ?></h6>
                                <p class="card-text"><?= $row->long_description ?></p>
                                <p class="d-flex justify-content-between">
                                    <span><?= $row->rating ?>&nbsp;
                                        <?php
                                        for ($i = 1; $i <= 5; $i++) {
                                            if ($i <= $row->rating) {
                                                echo '<i id="star-' . $i . '" class="fas fa-star ' . $row->id . '"></i>';
                                            } else {
                                                echo '<i id="star-' . $i . '" class="far fa-star ' . $row->id . '"></i>';
                                            }
                                        }
                                        ?>
                                    </span>
                                    <span><?= $row->comments_count ?>&nbsp;<i class="fas fa-comment"></i></span>
                                </p>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </section>

        <section>
            <div class="container">
                <h2>Sekite naujienas</h2>
                <p id="subtitle">Norite gauti pranešimus apie naujus kursus? Užsisakykite mūsų naujienlaiškį!</p>
                <div class="row">
                    <div class="col">
                        <form action="#" method="post">
                            <label for="name">Vardas</label><br>
                            <input class="mb-3" type="text" name="name" id="name"><br>
                            <label for="email">El. paštas</label><br>
                            <input class="mb-3" type="email" name="email" id="email"><br>
                            <input id="submit" class="mb-3" type="submit" value="Užsisakyti"><br>
                        </form>
                        <div class="alert alert-success d-none" role="alert">

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <div class="container">
        <footer class="mt-5 pt-3">
            <p>&copy; 2021 Karolis Kvatavičius</p>
        </footer>
    </div>
    <script src="./js/script.js"></script>
</body>

</html>