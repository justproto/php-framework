<div class="container">
    <h1><?= $title ?? ''; ?></h1>

    <div class="row">

        <div class="col-md-6 offset-md-3">

            <form action="<?= base_url('/register'); ?>" method="post">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control <?= get_validation_class('name', $errors ?? []) ?>" id="name" placeholder="name" value="<?= old('name'); ?>">
                    <?= get_errors('name', $errors ?? []) ?>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" name="email" class="form-control <?= get_validation_class('email', $errors ?? []) ?>" id="email" placeholder="name@example.com" value="<?= old('email'); ?>">
                    <?= get_errors('email', $errors ?? []) ?>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control <?= get_validation_class('password', $errors ?? []) ?>" id="password" placeholder="">
                </div>

                <div class="mb-3">
                    <label for="confirmPassword" class="form-label">Confirm password</label>
                    <input type="password" name="confirmPassword" class="form-control <?= get_validation_class('confirmPassword', $errors ?? []) ?>" id="confirmPassword" placeholder="">
                </div>

                <button type="submit" class="btn btn-primary">Register</button>
            </form>
        </div>
    </div>

</div>