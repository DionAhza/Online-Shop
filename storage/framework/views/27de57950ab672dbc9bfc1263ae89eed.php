<title>Halaman | <?php echo e($title); ?></title>

<?php if (isset($component)) { $__componentOriginalff09156f73c896030ee75284e9b2c466 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalff09156f73c896030ee75284e9b2c466 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.nav','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('nav'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalff09156f73c896030ee75284e9b2c466)): ?>
<?php $attributes = $__attributesOriginalff09156f73c896030ee75284e9b2c466; ?>
<?php unset($__attributesOriginalff09156f73c896030ee75284e9b2c466); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalff09156f73c896030ee75284e9b2c466)): ?>
<?php $component = $__componentOriginalff09156f73c896030ee75284e9b2c466; ?>
<?php unset($__componentOriginalff09156f73c896030ee75284e9b2c466); ?>
<?php endif; ?>

<div class="container mt-5 mb-4">
    <h1 class="text-center mb-4">Daftar Orderan untuk <?php echo e($userName->name); ?> </h1>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-4 col-xl-3">
            <div class="card shadow-sm bg-primary text-white order-card text-center">
                <div class="card-body">
                    <h6 class="mb-3">Orders Received</h6>
                    <div class="d-flex  align-items-center mb-0">
                        <svg  xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16">
                            <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5M3.14 5l.5 2H5V5zM6 5v2h2V5zm3 0v2h2V5zm3 0v2h1.36l.5-2zm1.11 3H12v2h.61zM11 8H9v2h2zM8 8H6v2h2zM5 8H3.89l.5 2H5zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0m9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0"/>
                          </svg>
                        <h2 class=""><span><?php echo e(count($orders)); ?></span></h2>
                    </div>
                    <hr class="my-4">
                    <p class="mb-0">Completed Orders <span class="float-end">351</span></p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php if(session('success')): ?>

<div class="alert alert-success">
    <?php echo e(session('success')); ?>

</div>
<?php endif; ?>

    <div class="row row-cols-1 row-cols-md-3 g-4">
        <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col">
                <div class="card h-100 border-primary">
                    <img src="<?php echo e(asset('img/' . $order->barang->gambar)); ?>" class="card-img-top" alt="<?php echo e($order->barang->nama_barang); ?>">
                    <div class="card-body bg-light">
                        <h5 class="card-title"><?php echo e($order->barang->nama_barang); ?></h5>
                        <p class="card-text"><strong>Diinput oleh: </strong><?php echo e($order->user->name); ?></p>
                        <p class="card-text">Jumlah: <?php echo e($order->jumlah); ?></p>
                        <p class="card-text">Alamat: <?php echo e($order->user->alamat); ?></p>
                        <p class="card-text">Metode Pembayaran: <?php echo e($order->pembayaran); ?></p>
                    </div> 
                    <form action="<?php echo e(route('terima',$order->id)); ?>" method="POST">
                        <?php echo method_field('DELETE'); ?>
                        <?php echo csrf_field(); ?>
                    <button class="btn btn-outline-danger item-center mx-5">Sudah diterima</button>
                </form>
                </div>
               
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php /**PATH C:\laragon\www\Toko_Online\resources\views\penjual\order.blade.php ENDPATH**/ ?>