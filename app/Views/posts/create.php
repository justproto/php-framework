<div class="container">

    <div class="row">

        <div class="col-md-6 offset-md-3">
            <h1>Create post form page</h1>

            <form method="post" action="<?= base_url('/posts/store'); ?>">

                <?= get_csrf_field(); ?>

                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" name="title" class="form-control <?= get_validation_class('title') ?>" id="title" placeholder="Title" value="<?= old('title'); ?>">
                    <?= get_errors('title') ?>
                </div>
                <div class="mb-3">
                    <label for="content" class="form-label">Content</label>
                    <textarea class="form-control <?= get_validation_class('content') ?>" name="content" id="content" rows="3"><?= old('content'); ?></textarea>
                    <?= get_errors('content') ?>
                </div>

                <button type="submit" class="btn btn-primary">Send</button>
            </form>

            <?php
            session()->remove('form_data');
            session()->remove('form_errors');
            ?>
        </div>
    </div>

</div>