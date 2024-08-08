<?php

namespace App\Livewire\Admin\Service;

use App\Models\Service;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithFileUploads;
use Livewire\Attributes\Layout;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Str;
use Ramsey\Uuid\Uuid;

class ServiceAdd extends Component
{
    use LivewireAlert;
    use WithFileUploads;
    #[Layout('components.layouts.admin')]
    public $name, $image, $price, $hourse, $information;
    public function addService()
    {
        $validatedData = $this->validate([
            'name' => 'required|unique:services',
            'price' => 'required|numeric',
            'hourse' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'information' => 'required',
        ]);

        if ($validatedData) {
            // add image
            $random = Str::random(20);
            $image = $this->image;
            $imgService = $random.'.'.$image->getClientOriginalExtension();
            $location = 'assets/service/';
            $path = ($location . $imgService);
            $upload = Image::make($image->path())->resize(316, 220);
            $upload->save($path);

            Service::create([
                'name' => $this->name,
                'uuid' => Uuid::uuid4()->toString(),
                'price' => $this->price,
                'hourse' => $this->hourse,
                'image' => $imgService,
                'information' => $this->information
            ]);
        }
        $this->flash('success', 'Layanan berhasil ditambahkan');
        return redirect()->to('/admin/services/list-services');
    }
    public function render()
    {
        return view('livewire.admin.service.service-add');
    }
}
