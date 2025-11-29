<div class="container">
<h2>Hello from Home view</h2>

<!--    --><?php //= echo session()->get('name'); ?>

    <?php if (!empty($posts)): ?>
        <?php foreach ($posts as $post): ?>
            <h5>
                <a href="#">
                    <?= $post['title']; ?>
                </a> |
                <a href="<?= base_url('/posts/edit?id=' . $post['id'] ) ?>">
                    Edit
                </a> |
                <a href="<?= base_url('/posts/delete?id=' . $post['id'] ) ?>">
                    Delete
                </a>
            </h5>
<!--            <p>--><?php //= $post['content']; ?><!--</p>-->
        <?php endforeach; ?>
    <?php endif; ?>

</div>
