<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Carbon\Carbon;

class Cron extends Model
{
    protected $primaryKey = 'command';
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = ['command', 'next_run', 'last_run'];
    /*
    Function to check the crons table and decide if the command is ready to run again or not
     */
    public static function shouldIRun($command, $weeks) {
        $cron = Cron::find($command);
        $now  = Carbon::now();
        if ($cron && $cron->next_run > $now->timestamp) {
            return false;
        }
        Cron::updateOrCreate(
            ['command'  => $command],
            ['next_run' => Carbon::now()->addWeeks($weeks)->timestamp,
             'last_run' => Carbon::now()->timestamp]
        );
        return true;
	}
}
