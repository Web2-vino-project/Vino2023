<?php

namespace App\Http\Livewire;

use App\Models\Country;
use Livewire\Component;
use App\Models\Bottle;

class BottleAdvancedForm extends Component
{
    public $search = '';
    public $results = [];
    public $priceMin = '';
    public $priceMax = '';
    public $description = '';
    public $country_id = '';
    public $errorMessage = '';
    public $countries;

    public function mount()
    {
       // Récupérer la liste des pays de votre base de données
        $this->countries = Country::all();
    }
    
    public function handleSearch()
    {
        $selectedCountry = Country::find($this->country_id);
        $this->description = $selectedCountry ? $selectedCountry->name : null; 

        $parameters = [
            'search' => $this->search,
            'priceMin' => $this->priceMin,
            'priceMax' => $this->priceMax,
            'description' => $this->description, 
        ];

        if (
            ((empty($parameters['search']) && empty($parameters['description'])) || (!empty($parameters['search']) && !empty($parameters['description']))) &&
            (empty($parameters['priceMin']) || empty($parameters['priceMax']))
        ) {
            $this->errorMessage = 'Veuillez remplir au moins un champ avec les champs de prix ou seulement les champs de prix.';
            return;
        }

        if (empty($parameters['search']) && empty($parameters['priceMin']) && empty($parameters['priceMax']) && empty($parameters['description'])) {
            $this->errorMessage = 'Au moins un champ doit être rempli';
            return;
        }

        // Supprime les valeurs nulles ou vides du tableau de paramètres
        $parameters = array_filter($parameters, function ($value) {
            return !empty($value) || $value === 0;
        });

        // Remplissez les paramètres manquants avec leurs valeurs par défaut correspondantes
        $parameters = array_merge([
            'search' => 'null',
            'priceMin' => 'null',
            'priceMax' => 'null',
            'description' => 'null',
        ], $parameters);

        // Emit the event with search parameters
        $this->emitTo('search-advanced-results', 'searchPerformance', $parameters['search'], $parameters['priceMin'],
         $parameters['priceMax'], $parameters['description']);

        // Redirect to the search results page with the parameters
        return redirect()->route('search-advanced-results', $parameters);
    }
    
    public function render()
    {
        return view('livewire.bottle-advanced-form');
    }
}
