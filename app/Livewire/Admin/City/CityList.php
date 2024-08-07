<?php

namespace App\Livewire\Admin\City;

use App\Models\City;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Jantinnerezo\LivewireAlert\LivewireAlert;
class CityList extends Component
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
        $cities = City::latest()->search($this->search)->paginate(10);
        return view('livewire.admin.city.city-list', compact('cities'));
    }
    public function addLimitData()
    {
        $this->limitData += 10;
    }
    public function deleteCity($id)
    {
        // Cari Kota berdasarkan id
        $city = City::where('id', $id)->first();

        if ($city) {
            // Hapus entri dari tabel city
            $city->delete();

            $this->alert('success', 'Berhasil menghapus kota ini');
        } else {
            $this->alert('error', 'Kota tidak ditemukan');
        }

        return back();
    }
}
