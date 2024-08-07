<?php

namespace App\Livewire\Admin\City;

use App\Models\City;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Ramsey\Uuid\Uuid;
class CityAdd extends Component
{
    use LivewireAlert;
    #[Layout('components.layouts.admin')]
    public $name;
    public function render()
    {
        return view('livewire.admin.city.city-add');
    }
    public function addCity()
    {
        $validatedData = $this->validate([
            'name' => 'required|unique:cities'
        ]);

        if ($validatedData) {
            City::create([
                'name' => $this->name,
                'uuid' => Uuid::uuid4()->toString(),
            ]);
        }

        $this->flash('success', 'Kota berhasil ditambahkan');
        return redirect()->to('/admin/cities/list-cities');
    }
}
