<div class="container">

    <div class="row">

        <div class="col-md-6 offset-md-3">
            <h1>Contact form view page</h1>

            <form action="" method="post">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control <?= get_validation_class('name') ?>" id="name" placeholder="Name" value="<?= old('name'); ?>">
                    <?= get_errors('name') ?>
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" name="username" class="form-control <?= get_validation_class('username') ?>" id="username" placeholder="Username" value="<?= old('username'); ?>">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" name="email" class="form-control <?= get_validation_class('email') ?>" id="email" placeholder="name@example.com" value="<?= old('email'); ?>">
                    <?= get_errors('email') ?>
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