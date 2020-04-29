<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use DateTime;
use Carbon\CarbonInterval;
use DatePeriod;

class EmployeeOccupied extends Model
{
	protected $table = 'employee_occupied';

    protected $casts = [
	    'start_time' => 'time:H:i:s',
	    'end_time' => 'time:H:i:s',
	];

	protected $default = [
        'start' => '09:00:00',
        'end' => '18:00:00',
    ];

	public function checkEmployeeAvailability($request)
	{
		$start = Carbon::instance(new DateTime($this->default['start']));
    	$end = Carbon::instance(new DateTime($this->default['end']));
        $interval = CarbonInterval::hour($request->get('slot'));

        $occupied = EmployeeOccupied::where(['employee_id' => $request->get('emp_id'), 'day' => $request->get('day')])
        		->get(['start_time', 'end_time'])
    			->map(function($item) {
					$arr['start_time'] = $item['start_time'];
		        	$arr['end_time'] = $item['end_time'];
				    return $arr;
				});

		foreach(new DatePeriod($start, $interval, $end) as $slot){
            $to = $slot->copy()->add($interval);

            if($to > $this->default['end'] && $this->slotAvailable($slot, $to, $occupied)){
                $availableSlots[] = $slot->toTimeString() .", ". $to->toTimeString();
            }
        }

        return $availableSlots;
	}  

    private function slotAvailable($from, $to, $occupied)
    {
        foreach($occupied as $ocpd){
            $ocpdStart = Carbon::instance(new DateTime($ocpd['start_time']));
            $ocpdEnd = Carbon::instance(new DateTime($ocpd['end_time']));

            if(($ocpdStart < $from && $from < $ocpdEnd) || ($ocpdStart < $to && $to < $ocpdEnd)){
                return false;
            }
        }
        return true;
    }
}
