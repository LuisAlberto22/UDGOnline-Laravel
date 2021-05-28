<?php

namespace App\Mail;

use App\Models\homework;
use App\Models\Lesson;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmailUploadHomework extends Mailable
{
    use Queueable, SerializesModels;

  
    public $homework,
           $user,
           $lesson;

    public $subject = "Se ha entregado una tarea ";
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(homework $homework , User $user, Lesson $lesson)
    {
        $this->homework = $homework;
        $this->user = $user;
        $this->subject .= $homework->name .' '.$user->name;
        $this->lesson = $lesson;
    }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.emailTareaEntregada');
    }
}
