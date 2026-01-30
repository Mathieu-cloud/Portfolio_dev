<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Livewire\Attributes\Validate;

class ContactForm extends Component
{
   #[Validate('required')]
    public $name = '';

    #[Validate('required|email')]
    public $email = '';

    #[Validate('required')]
    public $message = '';

    public function sendToGmail()
    {
        $data = $this->validate();

            Mail::send([], [], function ($message) use ($data) {
                $message->to('mathieu.moreau.webdev@gmail.com')
                        ->subject('Contact Site : ' . $data['name'])
                        ->html("
                            <h3>Nouveau message de contact</h3>
                            <p><strong>De :</strong> {$data['name']} ({$data['email']})</p>
                            <p><strong>Message :</strong></p>
                            <p>{$data['message']}</p>
                ");
            });
            $this->reset();
            session()->flash('success', 'Votre message a été envoyé avec succès !');
        }

    public function render()
    {
        return view('livewire.contact-form');
    }
}
