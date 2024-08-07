<?php

namespace App\Livewire\Admin\Service;

use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithFileUploads;
use Livewire\Attributes\Layout;
class ServiceAdd extends Component
{
    use LivewireAlert;
    use WithFileUploads;
    #[Layout('components.layouts.admin')]
    public $name, $image;
    public function render()
    {
        return view('livewire.admin.service.service-add');
    }
}
