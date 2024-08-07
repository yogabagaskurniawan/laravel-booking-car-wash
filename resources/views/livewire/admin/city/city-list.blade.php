<div>
    <div class="page-meta">
        <nav class="breadcrumb-style-one" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a>Kota</a></li>
            </ol>
        </nav>
    </div>

    <div class="col-lg-12 layout-spacing layout-top-spacing">

        <div class="statbox widget box box-shadow">
            <div class="widget-content widget-content-area">
                <div class="filtered-list-search mb-2 w-50">
                    <form class="form-inline my-2 my-lg-0 justify-content-center">
                        <div class="w-100">
                            <input wire:model.live="search" type="text" class="py-2 w-100 form-control product-search br-30" id="input-search" placeholder="Cari kota...">
                        </div>
                    </form>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover table-striped table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th class="text-center" scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = ($cities->currentPage() - 1) * $cities->perPage(); ?>
                            @forelse ($cities as $city)
                            <tr>
                                <td>{{ ++$no }}</td>
                                <td>{{ $city->name }}</td>
                                <td class="text-center">
                                    <div class="action-btns">
                                        <a href="{{ route('cityEdit', $city->uuid) }}" class="action-btn btn-edit bs-tooltip me-2" data-toggle="tooltip" data-placement="top" title="Edit">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>
                                        </a>
                                        <a wire:confirm="Apakah anda yakin ingin menghapus?" wire:click="deleteCity({{ $city->id }})" class="action-btn btn-delete bs-tooltip" data-toggle="tooltip" data-placement="top" title="Delete">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="10">Tidak ada list Kota</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    @if (count($cities) >= $limitData)
                        <div class="text-center">
                            <button class="mt-2 btn btn-sm btn-info _effect--ripple waves-effect waves-light" wire:loading><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-loader spin me-2"><line x1="12" y1="2" x2="12" y2="6"></line><line x1="12" y1="18" x2="12" y2="22"></line><line x1="4.93" y1="4.93" x2="7.76" y2="7.76"></line><line x1="16.24" y1="16.24" x2="19.07" y2="19.07"></line><line x1="2" y1="12" x2="6" y2="12"></line><line x1="18" y1="12" x2="22" y2="12"></line><line x1="4.93" y1="19.07" x2="7.76" y2="16.24"></line><line x1="16.24" y1="7.76" x2="19.07" y2="4.93"></line></svg>  Loading</button>
                            <button type="submit" class="mt-2 btn btn-sm btn-info _effect--ripple waves-effect waves-light" wire:click.prevent="addLimitData" wire:loading.remove>Selanjutnya..</button>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

