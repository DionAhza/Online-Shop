<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<header>
    <nav class="navbar navbar-expand-lg " style="background-color: #cfecf1">
        <div class="container text-white">
          <a class="navbar-brand" href="<?php echo e(route('home')); ?>">Toko Online</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end gap-2" id="navbarSupportedContent">
            <ul class="navbar-nav gap-3">
              
              
              
           
              <form class="d-flex" role="search" method="GET" action="<?php echo e(route('cari')); ?>">
                <input class="form-control me-2" type="search" placeholder="Search" name="cari" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
              <li class="nav-item dropdown">
                <?php if(auth()->guard()->check()): ?>
                    <?php if(Auth::user()->role === 'seller'): ?>
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            ingin jual produk?
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="<?php echo e(route('barang')); ?>">tambah produk</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="<?php echo e(route('toko.saya')); ?>">lihat produk anda</a></li>
                        </ul>
                    <?php endif; ?>
                <?php endif; ?>
            </li>
              <?php if(auth()->guard()->guest()): ?>
              <li class="nav-item dropdown">
                <button class="nav-link dropdown-toggle btn " href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd"><path d="M24 0v24h-24v-24h24zm-6.118 16.064c-2.293-.529-4.427-.993-3.394-2.945 3.146-5.942.834-9.119-2.488-9.119-3.388 0-5.643 3.299-2.488 9.119 1.064 1.963-1.15 2.427-3.394 2.945-2.048.473-2.124 1.49-2.118 3.269l.004.667h15.993l.003-.646c.007-1.792-.062-2.815-2.118-3.29z"/></svg>
                </button>
                
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="<?php echo e(route('login')); ?>">Login</a></li>
                  <li><a class="dropdown-item" href="<?php echo e(route('register.user')); ?>">Daftar sebagai pelanggan</a></li>
                  <li><a class="dropdown-item" href="<?php echo e(route('register.seller')); ?>">Daftar sebagai Penjual</a></li>
                </ul>
               
              </li>
              <?php endif; ?>
              <?php if(auth()->guard()->check()): ?>
                
              <li class="nav-item">
                <a class="nav-link" href="<?php echo e(route('cart')); ?>"><svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd"><path d="M13.5 21c-.276 0-.5-.224-.5-.5s.224-.5.5-.5.5.224.5.5-.224.5-.5.5m0-2c-.828 0-1.5.672-1.5 1.5s.672 1.5 1.5 1.5 1.5-.672 1.5-1.5-.672-1.5-1.5-1.5m-6 2c-.276 0-.5-.224-.5-.5s.224-.5.5-.5.5.224.5.5-.224.5-.5.5m0-2c-.828 0-1.5.672-1.5 1.5s.672 1.5 1.5 1.5 1.5-.672 1.5-1.5-.672-1.5-1.5-1.5m16.5-16h-2.964l-3.642 15h-13.321l-4.073-13.003h19.522l.728-2.997h3.75v1zm-22.581 2.997l3.393 11.003h11.794l2.674-11.003h-17.861z"/></svg></a>
              </li>
              <?php endif; ?>
              <?php if(auth()->guard()->check()): ?>
              <li class="nav-item dropdown">
                <button class="nav-link dropdown-toggle btn " href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <?xml version="1.0" encoding="utf-8"?>
                  <!-- Uploaded to: SVG Repo, www.svgrepo.com, Generator: SVG Repo Mixer Tools -->
                  <svg width="30px" height="30px" viewBox="0 0 1024 1024" class="icon"  version="1.1" xmlns="http://www.w3.org/2000/svg"><path d="M803.903676 585.006787m-100.928928 0a100.928928 100.928928 0 1 0 201.857856 0 100.928928 100.928928 0 1 0-201.857856 0Z" fill="#FAE1DC" /><path d="M191.733214 585.006787m-100.928928 0a100.928928 100.928928 0 1 0 201.857856 0 100.928928 100.928928 0 1 0-201.857856 0Z" fill="#FAE1DC" /><path d="M506.690736 556.043959m-338.311227 0a338.311227 338.311227 0 1 0 676.622455 0 338.311227 338.311227 0 1 0-676.622455 0Z" fill="#FAE1DC" /><path d="M1003.82127 491.380301H13.229063c-0.670273 0-1.234713-0.56444-1.234713-1.234712v-53.374858c0-0.670273 0.56444-1.234713 1.234713-1.234713h990.592207c0.670273 0 1.234713 0.56444 1.234712 1.234713v53.374858c0 0.670273-0.56444 1.234713-1.234712 1.234712z" fill="#63BCBC" /><path d="M743.191098 129.609536H271.425087c-18.379578 0-28.92755 14.040445-33.407793 36.40638L191.204051 440.369036c0 20.03762 15.028215 36.40638 33.407793 36.40638h565.357219c18.379578 0 33.407793-16.404038 33.407793-36.40638l-46.777965-274.35312c-3.10442-20.778448-15.028215-36.40638-33.407793-36.40638z" fill="#63BCBC" /><path d="M797.236228 685.935715c-59.054535 98.812278-167.038964 164.992869-290.545492 164.992869s-231.490957-66.18059-290.545492-164.992869h-21.942605c50.94071 122.377648 171.625039 208.454749 312.45282 208.454749 140.827781 0 261.547387-86.077101 312.452819-208.454749h-21.87205z" fill="#00263A" /><path d="M515.827609 725.199573c-79.797706 0-144.461364 47.307128-144.461364 105.620836 0 8.360768 1.481655 16.474593 3.986358 24.27092h280.950012c2.504703-7.796328 3.986358-15.910153 3.986357-24.27092 0-58.313708-64.698935-105.620836-144.461363-105.620836z m1.55221 120.119888c-55.562063 0.952493-68.650016-66.956695-68.650016-66.956695h134.125056c0.035278 0-9.912978 66.004203-65.47504 66.956695z" fill="#00263A" /></svg>
                </button>
                
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="<?php echo e(route('logout')); ?>">Logout</a></li>
                  <li><a class="dropdown-item" href="<?php echo e(route('profile')); ?>">Your Profile</a></li>
                  <?php if(auth()->guard()->check()): ?>
                    <?php if(Auth::user()->role === 'seller'): ?>
                  <li><a class="dropdown-item" href="<?php echo e(route('order')); ?>">Lihat Order</a></li>
                  <?php endif; ?>
                  <?php endif; ?>
                </ul>
               
              </li>
              <?php endif; ?>
              <li class="nav-item">
                <a href="<?php echo e(route('contact')); ?>" class="nav-link"><svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd"><path d="M16 22.621l-3.521-6.795c-.007.004-1.974.97-2.064 1.011-2.24 1.086-6.799-7.82-4.609-8.994l2.082-1.026-3.492-6.817-2.106 1.039c-1.622.845-2.298 2.627-2.289 4.843.027 6.902 6.711 18.013 12.212 18.117.575.011 1.137-.098 1.677-.345.121-.055 2.102-1.029 2.11-1.033zm4-5.621h-1v-13h1v13zm-2-2h-1v-9h1v9zm4-1h-1v-7h1v7zm-6-1h-1v-5h1v5zm-2-1h-1v-3h1v3zm10 0h-1v-3h1v3zm-12-1h-1v-1h1v1z"/></svg></a>
              </li>
              
            </ul>
          </div>
        </div>
      </nav>
</header>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script><?php /**PATH C:\laragon\www\Toko_Online\resources\views\components\nav.blade.php ENDPATH**/ ?>