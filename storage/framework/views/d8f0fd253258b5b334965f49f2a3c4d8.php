<title>Halaman | <?php echo e($title); ?></title>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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

<?php if($carts->isEmpty()): ?>
<h1 class="text-center m-2">Isi keranjang <?php echo e($user); ?> Kosong</h1>
<?php else: ?>
<?php if(session('success')): ?>
        <div class="alert alert-success">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>
<h1 class="text-center m-2">Isi keranjang <?php echo e($user); ?> ada: <?php echo e(count($carts)); ?> Barang</h1>
            <?php $__currentLoopData = $carts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="container py-5">
                    <div class="row justify-content-center mb-3">
                      <div class="col-md-12 col-xl-10">
                        <div class="card shadow-0 border rounded-3">
                          <div class="card-body">
                            <div class="row">
                              <div class="col-md-12 col-lg-3 col-xl-3 mb-4 mb-lg-0">
                                <div class="bg-image hover-zoom ripple rounded ripple-surface">
                                  <img src="<?php echo e(asset('img/' . $item->barang->gambar)); ?>" alt="<?php echo e($item->barang->nama_barang); ?>"
                                    class="w-100" />
                                </div>
                              </div>
                              <div class="col-md-6 col-lg-6 col-xl-6">
                                <h5><?php echo e($item->barang->nama_barang); ?></h5>
                                <p class="text-truncate mb-4 mb-md-0">
                                Metode Pembayaran: <br>
                                <?php
                                    $pembayaran = json_decode($item->barang->bayar)
                                ?>
                                <?php echo e(implode(", ",$pembayaran)); ?>

                                </p>
                                
                                <div class="d-flex align-items-center">
                                    <!-- Tombol untuk kurangi jumlah -->
                                    <form action="<?php echo e(route('cart.update', $item->id)); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('PATCH'); ?>
                                        <input type="hidden" name="quantity" value="<?php echo e($item->quantity - 1); ?>">
                                        <button type="submit" class="btn btn-outline-secondary" 
                                            <?php if($item->quantity <= 1): ?> disabled <?php endif; ?>>
                                            -
                                        </button>
                                    </form>
                                
                                    <!-- Jumlah Barang -->
                                    <p class="text-truncate mb-4 mb-md-0 mx-2 fs-3"><?php echo e($item->quantity); ?></p>
                                
                                    <!-- Tombol untuk tambah jumlah -->
                                    <form action="<?php echo e(route('cart.update', $item->id)); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('PATCH'); ?>
                                        <input type="hidden" name="quantity" value="<?php echo e($item->quantity + 1); ?>">
                                        <button type="submit" class="btn btn-outline-secondary" 
                                            <?php if($item->quantity >= $item->barang->stock): ?> disabled <?php endif; ?>>
                                            +
                                        </button>
                                    </form>
                                </div>
                                <form action="<?php echo e(route('cart.destroy',$item->id)); ?>" method="POST">
                                <?php echo method_field('DELETE'); ?>
                                <?php echo csrf_field(); ?>
                                <button class="btn btn-danger"><i class="material-icons">&#xe872;</i></button>
                            </form>
                              </div>
                              <?php if(session('error')): ?>
                            <div class="alert alert-danger">
                                <?php echo e(session('error')); ?>

                            </div>
                            <?php endif; ?>
                            
                            
                              <div class="col-md-6 col-lg-3 col-xl-3 border-sm-start-none border-start">
                                <div class="d-flex flex-row align-items-center mb-1">
                                  <h4 class="mb-1 me-1">Rp: <?php echo e(number_format( $item->barang->harga,0,",")); ?></h4>
                                </div>
                                <a href="<?php echo e(route('toko',$item->barang->user_id)); ?>" >
                                <h6 class="text-success">Penjual: <?php echo e($item->barang->user->name); ?></h6>
                                </a>
                                <div class="d-flex flex-column mt-4">
                                  <a href="<?php echo e(route('barang.show',$item->barang->id)); ?>" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-sm" >Details</a>
                                  <a href="<?php echo e(route('beli',$item->barang->id)); ?>" data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-primary btn-sm mt-2" type="button">
                                    Checkout
                                  </a>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<?php /**PATH C:\laragon\www\Toko_Online\resources\views/pelanggan/cart.blade.php ENDPATH**/ ?>