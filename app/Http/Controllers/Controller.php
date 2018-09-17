<?php
namespace App\Http\Controllers;
//require('TCPDF/TCPDF.php');
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Pagination\LengthAwarePaginator;
use Carbon\Carbon;
use App\Event;
use App\Term;
use Mail;
use App\Mail\EmployeeContract;
use App\Mail\DynamicMessage;
use App\TCPDF\tcpdf;



class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    //generic get event with no department filter
    public function getEvent($id)
    {
        $event = Event::where('events.id', $id)->first();

        return $event;
    } 


    //message page
    public function message()
    {
      return view('posts.message');
    }



    //translates banner term to readable term
    public function semC($sem)
    {

          $semester = ""; //init semester

          //case sem and choose which readable semester 201910 = Fall
          switch($sem)
          {
                case '05':
                $semester = "Extended";
                break;
                case '10':
                $semester = "Fall";
                break;
                case '15': 
                $semester = "Winter";
                break;
                case '20':
                $semester = "Spring";
                break;
                case '25':
                $semester = "Intersession";
                break;
                case '30':
                $semester = "Summer";
                break;
                case '35': 
                $semester = "Intersession";
                break;
                default:
                $semester = "Unknown";
                break;
          }

            return $semester; //return semester
    }

    //returns generic banner data
    public function bannerData($banner)
    {
        if($banner == "Terms")
        {
          //query
          
          $terms = Term::get();

          return $terms; //return terms
        }
        else
        {
            throw new Exception("No Banner Info Chosen.", 1); //throw error if no parameter was chosen      
        }
    }

  }

