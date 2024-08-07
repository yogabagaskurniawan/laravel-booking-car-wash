<?php

namespace App\Livewire\Admin\City;

use App\Models\City;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;

class CityEdit extends Component
{    
    use LivewireAlert;
    #[Layout('components.layouts.admin')]
    public $name, $city, $uuid;
    public function mount($uuid)
    {
        $this->city = City::where('uuid',$uuid)->first();

        if ($this->city) {
            $this->name = $this->city->name;
        }
    }
    public function editCity()
    {
        $validatedData = $this->validate([
            'name' => 'required|unique:cities,name,' . $this->city->id,
        ]);

        if ($validatedData) {
            $city = City::where('uuid', $this->uuid)->first();
            if (!$city) {
                // Handle jika Kota tidak ditemukan
                $this->flash('error', 'Kota tidak ditemukan');
                return;
            }

            // Update data Kota
            $city->name = $this->name;

            // Simpan
            $city->save();

            $this->flash('success', 'Kota berhasil diperbarui');
            return redirect()->to('admin/cities/list-cities');
        }
    }
    public function render()
    {
        if ($this->city) {
            return view('livewire.admin.city.city-edit');
        }else{
            abort(404);
        }
    }
}
