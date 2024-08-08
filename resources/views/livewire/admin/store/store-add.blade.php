<div>
    <div class="page-meta">
        <nav class="breadcrumb-style-one" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin/services/list-services">Toko</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tambah Toko</li>
            </ol>
        </nav>
    </div>

    <div class="col-lg-12 layout-spacing layout-top-spacing">

        <div class="statbox widget box box-shadow">
            <div class="widget-content widget-content-area">
                <form class="" wire:submit="addService">
                    <div class="row mb-4">
                        <div class="col-sm-4">
                            <label>Nama Toko</label>
                            <input wire:model="name" type="text" class="form-control" id="post-title">
                            @error('name') <span class="error text-danger ">{{ $message }}</span> @enderror 
                        </div>
                        <div class="col-sm-4">
                            <label for="inputState" class="form-label">Apakah toko ini buka?</label>
                            <select wire:model="is_open" id="inputState" class="form-select">
                                <option selected>pilih salah satu</option>
                                <option value="1">Buka</option>
                                <option value="0">Tutup</option>
                            </select>
                            @error('is_open') <span class="error text-danger ">{{ $message }}</span> @enderror 
                        </div>
                        <div class="col-sm-4">
                            <label for="city">Toko ini dari kota mana?</label>
                            <select  wire:model="city" id="city" class="form-select">
                                <option selected>pilih Kota</option>
                                @foreach ($cities as $city)
                                    <option value="{{$city->id}}">{{$city->name}}</option>
                                @endforeach
                            </select>
                            @error('city') <span class="error text-danger ">{{ $message }}</span> @enderror 
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-sm-12">
                            <label>Alamat Toko </label>
                            <input wire:model="address" type="text" class="form-control" id="post-title">
                            @error('address') <span class="error text-danger ">{{ $message }}</span> @enderror 
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-sm-8">
                            <label for="exampleFormControlTextarea1">Tentang Toko ini apa?</label>
                            <textarea wire:model="about" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                            @error('about') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-sm-8">
                            <label for="service">Layanan apa saja yang ada di toko ini?</label>
                            <div id="service">
                                @foreach ($services as $service)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" wire:model="selectedServices" value="{{ $service->id }}" id="service_{{ $service->id }}">
                                        <label class="form-check-label" for="service_{{ $service->id }}">
                                            {{ $service->name }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                            @error('selectedServices') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>                    
                    <div class="row mb-4">
                        <div class="col-sm-6">
                            <label>Upload Gambar Toko</label>
                            {{-- <input wire:ignore wire:model="image"  type="file" name="image" id="imageSketsa" class="form-control @error('image') has-error @enderror" placeholder="image" onchange="previewSketsa('.imageDemo1', this.files[0])"> --}}
                            <input wire:ignore wire:model="image" type="file" class="form-control-file" @error('image') has-error @enderror" placeholder="image" onchange="previewSketsa('.imageDemo1', this.files[0])">
                            <div wire:ignore class="col-md mt-3">
                                <img src="" alt="" class="img-preview img-fluid mb-3 col-sm-5 d-block imageDemo1">
                            </div>
                            @error('image') <span class="error text-danger ">{{ $message }}</span> @enderror 
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-sm-6">
                            <label>Nama Customer Service</label>
                            <input wire:model="cs_name" type="text" class="form-control" id="post-title">
                            @error('cs_name') <span class="error text-danger ">{{ $message }}</span> @enderror 
                        </div>
                        <div class="col-sm-6">
                            <label>Nomer Handphone Customer Service</label>
                            <input wire:model="cs_phone" type="number" class="form-control" id="post-title">
                            @error('cs_phone') <span class="error text-danger ">{{ $message }}</span> @enderror 
                        </div>
                    </div>
                    <button class="btn btn-primary btn-lg mb-2 me-4 _effect--ripple waves-effect waves-light" wire:loading><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-loader spin me-2"><line x1="12" y1="2" x2="12" y2="6"></line><line x1="12" y1="18" x2="12" y2="22"></line><line x1="4.93" y1="4.93" x2="7.76" y2="7.76"></line><line x1="16.24" y1="16.24" x2="19.07" y2="19.07"></line><line x1="2" y1="12" x2="6" y2="12"></line><line x1="18" y1="12" x2="22" y2="12"></line><line x1="4.93" y1="19.07" x2="7.76" y2="16.24"></line><line x1="16.24" y1="7.76" x2="19.07" y2="4.93"></line></svg>  Loading</button>
                    <button type="submit" class="btn btn-primary _effect--ripple waves-effect waves-light " wire:loading.remove>Tambah Toko</button>
                </form>
            </div>
        </div>
    </div>
</div>

