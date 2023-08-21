<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Console\Commands\EmailSend;
use App\Models\Customer;
use App\Models\Maintenance;

class MaintenanceMailable extends Mailable
{
    use Queueable, SerializesModels;

    protected Customer $customer;
    protected Maintenance $maintenance;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Customer $customer, Maintenance $maintenance)
    {
        $this->customer = $customer;
        $this->maintenance = $maintenance;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Mantenimiento Programado',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view: 'emails.maintenance',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
    public function build()
    {
        return $this->view('emails.maintenance', ["customer" => $this->customer, "maintenance" =>  $this->maintenance]);// Vista que renderizará el contenido del correo
        // ->subject('Es Hora de tu Mantenimiento en Talleres Lebron')
        // ->from('Mariesmeraldad@gmail.com', 'Talleres Lebron');
    }
}
