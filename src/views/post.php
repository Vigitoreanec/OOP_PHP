<h1>Пост</h1>

<?php if ($post): ?>
    <div style=" text-align: center; background: blue; height: auto; width: 350px; margin: 20px auto">
        <h3>Пост <?= $post->title ?></h3>
        <span>ТЕКСТ <?= $post->text ?></span>
    </div>

<?php else: ?>
    <span>Нет такого поста</span>
<?php endif; ?>