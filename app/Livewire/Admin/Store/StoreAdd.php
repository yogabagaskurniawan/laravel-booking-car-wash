<?php

namespace App\Livewire\Admin\Store;

use App\Models\City;
use App\Models\Service;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithFileUploads;
use Livewire\Attributes\Layout;
class StoreAdd extends Component
{
    use LivewireAlert;
    use WithFileUploads;
    #[Layout('components.layouts.admin')]
    public function render()
    {
        $cities = City::latest()->get();
        $services = Service::latest()->get();
        return view('livewire.admin.store.store-add', compact('cities','services'));
    }
}
