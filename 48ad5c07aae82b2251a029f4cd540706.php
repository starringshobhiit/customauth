
<?php $__env->startSection('content'); ?>;
<h1> Home: <?php echo e(Auth::user()->name); ?></h1>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\test\customauth\resources\views/home.blade.php ENDPATH**/ ?>