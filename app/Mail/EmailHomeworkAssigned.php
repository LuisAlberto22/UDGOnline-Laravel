<?php

namespace App\Mail;

use App\Http\Requests\user;
use App\Models\homework;
use App\Models\Lesson;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmailHomeworkAssigned extends Mailable
{
    use Queueable, SerializesModels;

    public $homework,$lesson;

    public $subject = "Tarea Asignada ";

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(homework $homework,Lesson $lesson)
    {
        $this->homework = $homework;
        $this->lesson = $lesson;
        $this->subject .=$homework->name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.emailTareaAsignada');
    }
}
