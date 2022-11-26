<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Wizard extends Component
{
    protected $queryString = ['location'];

    public $location, $timeframe, $moods = [], $people_count, $group, $budget, $budget_amount;

    public $results = [];

    public function render()
    {
        return view('livewire.wizard')->layout('layouts.guest');
    }

    public function mount()
    {
        $this->getResults();
    }

    public function getResults()
    {
        $this->results[] = [
            'thumbnail' => '',
            'title' => 'Top places in Iligan City',
            'author' => 'Vahn Marty C.',
            'accuracy' => 95,
            'rating' => 4.5,
            'summary' => 'Tinago Falls, Robinsons, Paseo De Santiago'
        ];

        $this->results[] = [
            'thumbnail' => '',
            'title' => 'Falls Hopping and Outdoor activities',
            'author' => 'Kulas.',
            'accuracy' => 92,
            'rating' => 3.3,
            'summary' => 'Ma. Christina Falls, Tinago Falls, Mt. Agad-Agad'
        ];

        $this->results[] = [
            'thumbnail' => '',
            'title' => 'Chill and Party with the locals',
            'author' => 'Jizni V.',
            'accuracy' => 33,
            'rating' => 4.9,
            'summary' => 'Tio Lanos, Serbesa'
        ];

        $this->results[] = [
            'thumbnail' => '',
            'title' => 'Bes kanang layu ug mingaw',
            'author' => 'Baby M.',
            'accuracy' => 12,
            'rating' => 4.9,
            'summary' => 'Memory Lane, Monch, Chelina'
        ];
    }
}
