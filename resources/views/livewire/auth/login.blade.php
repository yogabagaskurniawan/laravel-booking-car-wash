<div>
    <!-- authentication start -->
    <div class="grocery-authentication" style="background-image: url(/user/assets/images/grocery/pattern2.png) !important">
        <div class="custom-container">
            <div class="logo-content">
                <img src="/user/assets/images/logo/logoNew.png" class="img-fluid logo mb-2"  alt="" style="width: 250px !important">
                <p>Toko Car Detailing kami siap memberikan layanan perawatan dan detailing terbaik untuk kendaraan Anda agar selalu tampil seperti baru.</p>
            </div>
            <div class="auth-box">
                <div class="auth-title">
                    <h4>Login Akun</h4>
                </div>

                <form class="form-style-7" wire:submit="proccesslogin">
                    <div class="form-box mb-19">
                        <input type="email" class="form-control" placeholder="Alamat Email" wire:model="email">
                        <i class="ri-mail-open-line"></i>
                        @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-box mb-2">
                        <input type="password" class="form-control" placeholder="Password" wire:model="password">
                        <i class="ri-lock-line"></i>
                    </div>
                    <h6 class="forgot-text text-end fw-normal mb-19">
                        <a href="forgot-password.html" class="content-color">Forgot password?</a>
                    </h6>
                    <button class="btn border border-0 grocery-btn theme-btn" wire:loading><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-loader spin me-2"><line x1="12" y1="2" x2="12" y2="6"></line><line x1="12" y1="18" x2="12" y2="22"></line><line x1="4.93" y1="4.93" x2="7.76" y2="7.76"></line><line x1="16.24" y1="16.24" x2="19.07" y2="19.07"></line><line x1="2" y1="12" x2="6" y2="12"></line><line x1="18" y1="12" x2="22" y2="12"></line><line x1="4.93" y1="19.07" x2="7.76" y2="16.24"></line><line x1="16.24" y1="7.76" x2="19.07" y2="4.93"></line></svg>  Loading</button>
                    <button type="submit" class="btn border border-0 grocery-btn theme-btn" wire:loading.remove>Sign in</button>
                </form>
            </div>
        </div>
    </div>
    <!-- authentication end -->
    <!-- spacing start -->
    <div class="grocery-bottom-spacing"></div>
    <!-- spacing end -->
</div>
