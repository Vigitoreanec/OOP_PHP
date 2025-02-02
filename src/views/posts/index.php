<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<?php
//var_dump($_GET);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $text = $_POST['text'];

    //insert

    header('Location: /');
    exit;
}

?>

<body>
    <div><?= $message ?></div>
    <form action="/?c=posts&a=save" method="post">
        <input type="text" name="title" placeholder="Название поста" /><br />
        <input type="text" name="text" placeholder="Текст поста" /><br />
        <input type="submit" value="Добавить" />
    </form>
    <section style="text-align: center;  
                    margin-top: 0;
                    margin-bottom: 0;">
        <h1>Blog Posts</h1>
        <div style="margin: 42px auto 0 calc(((100% - 1480px) / 2));
                    display: grid;
                    grid-template-columns: repeat(3, auto);
                    min-height: 100%;
                    background-color: #ececec;">

            <?php foreach ($posts as $post): ?>
                <div class="u-carousel-duration-750 u-carousel-right u-gallery u-layout-grid u-lightbox u-show-text-always u-thumbnails-position-bottom u-gallery-1" id="carousel-49c1" data-pswp-uid="1">

                    <div style=" text-align: center; background: grey; height: auto; max-width: 250px; margin: 20px auto">
                        <div style="display:inline; position:relative;">
                            <a href="/?c=posts&a=show&id=<?= $post['id'] ?>">
                                <span><?= $post['title'] ?></span>
                            </a>
                            <a href="/?c=posts&a=delete&id=<?= $post['id'] ?>">
                                <span style="position:absolute; padding:0 5px; right:0;">❌</span>
                            </a>
                            <div class="u-align-center u-over-slide u-over-slide-1">
                                <span><?= $post['text'] ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

</body>

</html>