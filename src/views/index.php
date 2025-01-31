<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Blog Posts</h1>
    <div>
        <?php foreach ($posts as $post): ?>
            <div style=" text-align: center; background: grey; height: auto; width: 350px; margin: 20px auto">
                <a href="/?c=posts&a=post&id=<?= $post['id'] ?>">
                    <span>Post #<?= $post['id'] ?> -> <?= $post['title'] ?></span>
                </a>
            </div>
            <div style=" height: auto; width: 100px; margin: 20px auto">
                <span><?= $post['text'] ?></span>
            </div>
        <?php endforeach; ?>
    </div>
</body>

</html>