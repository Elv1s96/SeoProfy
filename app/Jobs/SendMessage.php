<?php

namespace App\Jobs;

use App\Mail\SendMail;
use App\Models\User;
use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendMessage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $tries = 3;
    protected $email;
    protected $text;
    protected $name;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($email, $text, $name = null)
    {
        $this->email = $email;
        $this->text = $text;
        $this->name = $name;
    }

    /**
     * Execute the job.
     *
     * @return bool
     * @throws \Exception
     */
    public function handle()
    {
        if ($this->email == 'all') {
            $users = User::get();
            foreach ($users as $user) {
                Mail::to($user->email)->send(new SendMail($user->name, $this->text));
            }
            return true;
        }
        Mail::to($this->email)->send(new SendMail($this->name, $this->text));
        info($this->text);
    }

    public function failed(Exception $exception)
    {
        info('Job is failed' . $exception);
    }
}
