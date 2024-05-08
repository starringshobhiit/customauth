<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
</head>
<body>
    <div class="container">
        <form method="POST" action="<?php echo e(route('register')); ?>" class="form">
            <?php echo csrf_field(); ?>

            <h2>Register</h2>

            <label for="name">Name</label>
            <input type="text" id="name" name="name" required autofocus>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>

            <label for="password_confirmation">Confirm Password</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required>

            <button type="submit">Register</button>

            <?php if($errors->any()): ?>
                <div class="error">
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php echo e($error); ?><br>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php endif; ?>

            <?php if(session('success')): ?>
                <div class="success">
                    <?php echo e(session('success')); ?>

                </div>
            <?php endif; ?>
        </form>
    </div>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\test\customauth\resources\views/auth/register.blade.php ENDPATH**/ ?>