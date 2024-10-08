<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman | <?php echo e($title); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body >
    <div class="container mt-5 ">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <!-- Form Card -->
                <?php if($errors->any()): ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>
                <div class="card shadow-lg border-info">
                    <div class="card-header bg-info text-white text-center">
                        <h3>Sign in</h3>
                    </div>
                    <div class="card-body p-4">
                        <form action="<?php echo e(route('auth')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email Address <i class="bi bi-envelope-fill"></i></label>
                                <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="Enter your email" aria-describedby="emailHelp">
                                <div id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</div>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Password <i class="bi bi-lock-fill"></i></label>
                                <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Enter your password">
                            </div>
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Remember Me</label>

                                <a href="<?php echo e(route('home')); ?>">Masuk tanpa login</a>
                            </div>
                            <button type="submit" class="btn btn-info w-100">Submit <i class="bi bi-arrow-right-circle-fill"></i></button>
                        </form>
                    </div>
                </div>
                <!-- End Form Card -->
            </div>
        </div>
    </div>

    <!-- Bootstrap Icons -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.js"></script>
</body>
</html>
<?php /**PATH C:\laragon\www\Toko_Online\resources\views/auth/login.blade.php ENDPATH**/ ?>