<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Model extends Eloquent
{
    protected $fillable = ['events_dept_id',
				'events_title',
				'events_desc',
				'events_banner_term',
				'events_term',
				'events_start_datetime',
				'events_end_datetime',
				'events_admit_students',
				'events_admit_employees',
				'events_admit_guests',
				'events_creation_user_name',
				'events_updated_user_name',
				'updated_at',
				'created_at',
				'admissions_event_id',
				'admissions_ptype',
				'admissions_first_name',
				'admissions_last_name',
				'admissions_student',
				'admissions_employee',
				'admissions_guest',
				'admissions_lid',
				'events_admit_out',
				'admissions_admit_out_at',
				'dept_id',
				'dept_acc_id',
                'dept_desc',
                'dept_acronym',
                'dept_role',
                'CODE',
                'TERM',
                'START',
                'END',
               



				 ]; //fillable sql columns
}

