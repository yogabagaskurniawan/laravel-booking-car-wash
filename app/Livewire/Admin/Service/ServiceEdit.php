<?php

namespace App\Livewire\Admin\Service;

use App\Models\Service;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\WithFileUploads;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Str;
class ServiceEdit extends Component
{
    use LivewireAlert;
    use WithFileUploads;
    #[Layout('components.layouts.admin')]
    public $name, $image, $price, $hourse, $information, $service, $uuid;
    public function mount($uuid)
    {
        $this->service = Service::where('uuid',$uuid)->first();

        if ($this->service) {
            $this->name = $this->service->name;
            $this->price = $this->service->price;
            $this->hourse = $this->service->hourse;
            $this->information = $this->service->information;
        }
    }
    public function editService()
    {
        $validatedData = $this->validate([
            'name' => 'required|unique:services,name,' . $this->service->id,
            'price' => 'required|numeric',
            'hourse' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // gambar tidak lagi required, karena mungkin tidak diubah
            'information' => 'required',
        ]);

        if ($validatedData) {
            $service = Service::where('uuid',$this->uuid)->first();
            if (!$service) {
                // Handle jika layanan tidak ditemukan
                $this->flash('error', 'Layanan tidak ditemukan');
                return;
            }
            // Cek apakah ada gambar baru yang diunggah
            if ($this->image) {
                // Hapus gambar lama jika ada
                if (file_exists(public_path('assets/service/' . $service->image))) {
                    unlink(public_path('assets/service/' . $service->image));
                }

                // Tambah gambar baru
                $random = Str::random(20);
                $image = $this->image;
                $imgService = $random . '.' . $image->getClientOriginalExtension();
                $location = 'assets/service/';
                $path = ($location . $imgService);
                $upload = Image::make($image->path())->resize(316, 220);
                $upload->save($path);

                // Update field image di database
                $service->image = $imgService;
            }

            // Update data service
            $service->name = $this->name;
            $service->price = $this->price;
            $service->hourse = $this->hourse;
            $service->information = $this->information;
            $service->save();
        }

        $this->flash('success', 'Layanan berhasil diperbarui');
        return redirect()->to('/admin/services/list-services');
    }
    public function render()
    {
        if ($this->service) {
            return view('livewire.admin.service.service-edit');
        }else{
            abort(404);
        }
    }
}
