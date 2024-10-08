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
<?php if(session('berhasil_cari')): ?>
<div class="alert alert-success">
    <?php echo e(session('berhasil_cari')); ?>

</div>
<?php endif; ?>
<?php if(session('gagal_cari')): ?>
<div class="alert alert-danger">
    <?php echo e(session('gagal_cari')); ?>

</div>
<?php endif; ?>
<h2 class="text-center text-opacity-20 m-2">Hasil Pencarian: <?php echo e($judul); ?></h2>
<div class="row m-4">
    <?php $__currentLoopData = $barang; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $produk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="col-md-4 mb-4">
        <div class="card shadow-sm h-100"> <!-- h-100 membuat tinggi card sama -->
            <a href="<?php echo e(route('barang.show', $produk->id)); ?>" class="text-decoration-none text-black">
                <img src="<?php echo e(asset('img/' . $produk->gambar)); ?>" alt="<?php echo e($produk->nama_barang); ?>" class="img-fluid card-img-top" style="height: 200px; object-fit: cover;"> <!-- height dan object-fit memastikan gambar tetap proporsional -->
            
            <div class="card-body d-flex flex-column">
                <h5 class="card-title"><?php echo e($produk->nama_barang); ?></h5>
                <h5 class="card-title"><?php echo e($produk->alamat); ?></h5>
                <p class="card-text mb-2">Rp: <?php echo e(number_format($produk->harga, 0, ',', '.')); ?></p>
            </a>
                <div class="mt-auto"> <!-- Ini agar tombol ada di bagian bawah -->
                    <?php if(auth()->guard()->guest()): ?>
                    <button  data-bs-toggle="modal" data-bs-target="#loginModal" class="btn btn-outline-primary">Masukan keranjang</button>
                    <button  data-bs-toggle="modal" data-bs-target="#loginModal"  class="btn btn-outline-secondary">Beli langsung</button>
                    
                    <div class="modal fade" id="loginModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h1 class="modal-title fs-5" id="loginModalLabel">Silahkan login terlebih dahulu</h1>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                          
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              <a href="<?php echo e(route('login')); ?>" class="btn btn-primary">Login</a>
                            </div>
                          </div>
                        </div>
                      </div>
                    
                    <?php endif; ?>
                    <?php if(auth()->guard()->check()): ?>
                    <a href="" class="btn btn-outline-primary">Masukan keranjang</a>
                    <a href="" class="btn btn-outline-secondary">Beli langsung</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    
    
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <!-- Card 2 -->
    <!-- Add more cards as needed -->
</div>
</div><?php /**PATH C:\laragon\www\Toko_Online\resources\views\pelanggan\cari.blade.php ENDPATH**/ ?>