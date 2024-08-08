<?php

namespace App\Livewire\Admin\Service;

use App\Models\Service;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Illuminate\Support\Facades\File;
class ServiceList extends Component
{
    use LivewireAlert;
    #[Layout('components.layouts.admin')]
    public $limitData;
    public $search = '';
    public function mount()
    {
        $this->limitData = 10;
    }
    public function render()
    {
        $services = Service::latest()->search($this->search)->limit($this->limitData)->get();
        return view('livewire.admin.service.service-list', compact('services'));
    }
    public function deleteService($id)
    {
        $service = Service::where('id', $id)->first();

        // Hapus gambar 
        $image = public_path('/assets/service/' . $service->image);
        if (File::exists($image)) {
            File::delete($image);
        }

        // Hapus entri dari tabel service
        $service->delete();

        $this->alert('success', 'Berhasil menghapus layanan ini');
        return back();
    }
}
