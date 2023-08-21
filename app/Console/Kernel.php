<?php

namespace App\Console;


use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [

        'App\Console\Commands\EmailSend',
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('email:send')->everyMinute();

            
            // $customers = Customer::pluck('email'); // Obtén todas las direcciones de correo electrónico
            // foreach ($customers as $email) {
            //     Mail::to($email)->send(new MaintenanceMailable());
            //     // \Illuminate\Support\Facades\Mail::to($email)->send(new MaintenanceMailable());
            // }
        //    Mail::to(users:'mariesmeraldad@gmail.com')->send(new MaintenanceMailable());
           
        //    Mail::to(users:'marianapretty53@gmail.com')->send(new MaintenanceMailable);

        
    }
   
    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
