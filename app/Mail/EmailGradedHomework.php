<?php

namespace App\Mail;

use App\Models\homework;
use App\Models\Lesson;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmailGradedHomework extends Mailable
{
    use Queueable, SerializesModels;

    public $homework,
           $lesson;

    public $subject = "Tarea Revisada ";
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(homework $homework  , Lesson $lesson)
    {
        $this->homework = $homework;
        $this->lesson = $lesson;
        $this->subject .= $homework->name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.emailTareaRevisada');
    }
}
