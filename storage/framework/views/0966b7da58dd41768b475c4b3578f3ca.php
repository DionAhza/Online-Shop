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
<h1 class="text-center mt-2">Detail Barang</h1>


<div class="container mt-5 d-flex">
    <div class="card mb-4 shadow-sm border-0" style="max-width: 18rem;">
        <?php if(Auth::check() && (Auth::user()->id == $barang->user_id || Auth::user()->role == 'admin')): ?>
            <div class="d-flex">
                <!-- Tampilkan tombol update dan delete jika user adalah pemilik barang atau admin -->
                <button  class="btn btn-info m-2 px-4 text-white" data-bs-toggle="modal" data-bs-target="#updateModal" >
                    Edit
                </button>
                

                <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModal" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">Edit</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="<?php echo e(route('barang.update',$barang->id)); ?>" method="POST" enctype="multipart/form-data" class="p-5">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('PUT'); ?>
                                <div class="form-group">
                                    <label for="bayar">Metode pembayaran</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="bayar[]" id="bayar_cod" value="COD">
                                <label class="form-check-label" for="bayar_cod">
                                    COD
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="bayar[]" id="bayar_transfer" value="Transfer">
                                <label class="form-check-label" for="bayar_transfer">
                                    Transfer
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="bayar[]" id="bayar_qris" value="Qris">
                                <label class="form-check-label" for="bayar_qris">
                                    Qris
                                </label>
                            </div>
                                </div>
                                <div class="form-group">
                                    <label for="nama_barang">Nama Barang</label>
                                    <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="<?php echo e($barang->nama_barang); ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="harga">Harga</label>
                                    <input type="number" class="form-control" id="harga" name="harga" value="<?php echo e($barang->harga); ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="stock">Stock</label>
                                    <input type="number" class="form-control" id="stock" name="stock" value="<?php echo e($barang->stock); ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="gambar">Gambar</label>
                                    <input type="file" class="form-control" id="gambar" name="gambar">
                                </div>
                                <button type="submit" class="btn btn-primary mt-2">Simpan</button>
                            </form>
                            
                        </div>
                        
                      </div>
                    </div>
                  </div>
                
                <form action="<?php echo e(route('barang.delete',$barang->id)); ?>" method="Post" class="d-inline">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button type="submit" class="btn btn-danger px-4" onclick="return confirm('Apakah anda yakin ingin menghapus barang ini?')">
                        Delete
                    </button>
                </form>
            </div>
            <?php endif; ?>
        <?php if($barang->gambar): ?>
            <img src="<?php echo e(asset('img/' . $barang->gambar)); ?>" alt="<?php echo e($barang->nama_barang); ?>" class="img-fluid card-img-top w-110 mx-auto d-block p-3" style="object-fit: cover; height: 200px;">
        <?php endif; ?>
    
        <div class="card-body text-center">
            <h5 class="card-title"><?php echo e($barang->nama_barang); ?></h5>
            <a href="<?php echo e(route('toko', $barang->user_id)); ?>" class="hover:underline">
            <p class="text-muted">Penjual: <strong><?php echo e($barang->user->name); ?></strong></p>
        </a>
            <?php
                $pembayaran = json_decode($barang->bayar);
            ?>
            <p class="card-text">Metode Pembayaran : <?php echo e(implode(', ', $pembayaran)); ?></p>
            <p class="card-text">Harga: <strong>Rp <?php echo e(number_format($barang->harga, 0, ',', '.')); ?></strong></p>
            <p class="card-text">Stok: <strong><?php echo e($barang->stock); ?></strong></p>
        </div>
    </div>
    
 <div class="mt-auto pb-4 ml-3">
    
    <!-- Ini agar tombol ada di bagian bawah -->
    <form action="<?php echo e(route('cart.add')); ?>" method="POST" class="mt-2">
        <?php echo csrf_field(); ?>
        <input type="hidden" name="barang_id" value="<?php echo e($barang->id); ?>">
        <button href="<?php echo e(route('cart.add')); ?>" type="submit" class="btn btn-outline-warning"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M19.5 8c-2.485 0-4.5 2.015-4.5 4.5s2.015 4.5 4.5 4.5 4.5-2.015 4.5-4.5-2.015-4.5-4.5-4.5zm-.5 7v-2h-2v-1h2v-2l3 2.5-3 2.5zm-5.701-11.26c-.207-.206-.299-.461-.299-.711 0-.524.407-1.029 1.02-1.029.262 0 .522.1.721.298l3.783 3.783c-.771.117-1.5.363-2.158.726l-3.067-3.067zm3.92 14.84l-.571 1.42h-9.296l-3.597-8.961-.016-.039h9.441c.171-.721.46-1.395.848-2h-14.028v2h.643c.535 0 1.021.304 1.256.784l4.101 10.216h12l1.211-3.015c-.699-.03-1.368-.171-1.992-.405zm-6.518-14.84c.207-.206.299-.461.299-.711 0-.524-.407-1.029-1.02-1.029-.261 0-.522.1-.72.298l-4.701 4.702h2.883l3.259-3.26z"/></svg></button></form>
        <a href="" class="btn btn-outline-success"><svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd"><path d="M21.19 7h2.81v15h-21v-5h-2.81v-15h21v5zm1.81 1h-19v13h19v-13zm-9.5 1c3.036 0 5.5 2.464 5.5 5.5s-2.464 5.5-5.5 5.5-5.5-2.464-5.5-5.5 2.464-5.5 5.5-5.5zm0 1c2.484 0 4.5 2.016 4.5 4.5s-2.016 4.5-4.5 4.5-4.5-2.016-4.5-4.5 2.016-4.5 4.5-4.5zm.5 8h-1v-.804c-.767-.16-1.478-.689-1.478-1.704h1.022c0 .591.326.886.978.886.817 0 1.327-.915-.167-1.439-.768-.27-1.68-.676-1.68-1.693 0-.796.573-1.297 1.325-1.448v-.798h1v.806c.704.161 1.313.673 1.313 1.598h-1.018c0-.788-.727-.776-.815-.776-.55 0-.787.291-.787.622 0 .247.134.497.957.768 1.056.344 1.663.845 1.663 1.746 0 .651-.376 1.288-1.313 1.448v.788zm6.19-11v-4h-19v13h1.81v-9h17.19z"/></svg></a>
        <div class="d-flex justify-content-between align-items-center mb-4 mt-2">
            <a href="<?php echo e(route('home')); ?>" class="btn btn-primary ">&laquo; Back</a><br>
            
        </div>
    </div>
</div>

<?php /**PATH C:\laragon\www\Toko_Online\resources\views\pelanggan\barang.blade.php ENDPATH**/ ?>