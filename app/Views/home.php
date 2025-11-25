<div class="container">
<h2>Hello from Home view</h2>

    <?php if (!empty($posts)): ?>
        <?php foreach ($posts as $post): ?>
            <h3><?= $post['title']; ?></h3>
            <p><?= $post['content']; ?></p>
        <?php endforeach; ?>
    <?php endif; ?>

</div>
