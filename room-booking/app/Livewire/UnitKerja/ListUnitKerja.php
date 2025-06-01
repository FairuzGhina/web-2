<?php

namespace App\Livewire\UnitKerja;

use Livewire\Component;
use App\Models\UnitKerja;

class ListUnitKerja extends Component
{
    public function render()
    {
        return view('livewire.unit-kerja.list-unit-kerja', [
            'unitKerjas' => UnitKerja::all()
        ]);
    }
    public function delete($id)
    {
        $ruang = UnitKerja::find($id);
        if ($ruang) {
            $ruang->delete();
            session()->flash('message', 'Unit kerja berhasil dihapus.');
        }
    }
}
