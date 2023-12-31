<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Footer extends Component
{
    public function render()
    {
        return view('livewire.footer');
    }

    public function redirectToAddBottle()
    {
        $url = route('add-bottle');
        return redirect($url);
    }

    public function redirectToCellars()
    {
        $url = route('cellars');
        return redirect($url);
    }

    public function redirectToWishlist()
    {
        $url = route('add-to-wishlist');
        return redirect($url);
    }

    public function redirectToAccueil()
    {
        return redirect()->route('bottles');
    }
}

