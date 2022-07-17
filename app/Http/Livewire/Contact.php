<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Contact extends Component
{

    public $family_name;
    public $first_name;
    public $email;
    public $postcode;
    public $address;
    public $opinion;
    public Contact $contact;

    protected $rules = [
        'family_name' => 'required',
        'first_name' => 'required',
        'gender' => 'required',
        'email' => 'required|email',
        'postcode' => 'required|size:8',
        'address' => 'required',
        'opinion' => 'required|max:120',
    ];

    public function mount()
    {
        $this->contact = $contact ?? new Contact();
    }

    public function storePost()
    {
        $this->validate();

        $this->post->save();

        $this->reset();
    }

    public function updated($name)
    {
        $this->validateOnly($name, [
            'family_name' => 'required',
            'first_name' => 'required',
            'gender' => 'required',
            'email' => 'required|email',
            'postcode' => 'required|size:8',
            'address' => 'required',
            'opinion' => 'required|max:120',
        ]);
    }

    public function render()
    {
        return view('livewire.contact');
    }
    
}
