<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Error extends Model
{
    use HasFactory;
    public $office,$window,$pos,$system,$other;

    public function __construct() {
        $this->office = DB::table('errors')->where('type' , 'office')->get();
        $this->window = DB::table('errors')->where('type' , 'window')->get();
        $this->pos = DB::table('errors')->where('type' , 'pos')->get();
        $this->system = DB::table('errors')->where('type' , 'system')->get();
        $this->other = DB::table('errors')->where('type' , 'other')->get();
    }

    public function addData($req) {
        $this->type = $req->type;
        $this->date = $req->date;
        $this->count = $req->count;
        $this->messages = $req->messages;
        $this->save();
        return 'Data is added';
    }

    public function pieChart() {
        $office = $this->office;
        $office_c = 0;
        foreach($office as $res) {
            $office_c += $res->count;
        }
        $window = $this->window;
        $window_c = 0;
        foreach($window as $res) {
            $window_c += $res->count;
        }
        $pos = $this->pos;
        $pos_c = 0;
        foreach($pos as $res) {
            $pos_c += $res->count;
        }
        $system = $this->system;
        $system_c = 0;
        foreach($system as $res) {
            $system_c += $res->count;
        }
        $other = $this->other;
        $other_c = 0;
        foreach($other as $res) {
            $other_c += $res->count;
        }
        $array = [
            'office' => $office_c,
            'window' => $window_c,
            'pos' => $pos_c,
            'system' => $system_c,
            'other' => $other_c,
        ];
        return $array;
    }

    public function barChart() {
        $date = array();
        $count = array();
        for($i = 1; $i <= 5; $i++){
            $t = Carbon::now();
            $d = $t->sub($i.' day')->toDateString();
            array_push($date , $d);
            $g = DB::table('errors')->where('date' , $d)->get();
            $c = 0;
            foreach($g as $gs) {
                $c += $gs->count;
            }
            array_push($count,$c);
            unset($d);
        }
        $result = [
            'date' => $date,
            'count' => $count,
        ];
        return $result;
    }

    public function overallData() {
        $type = array('office','pos','window','system','other');
        $overallData = array();
        $z = array();
        foreach($type as $types) {
            // array_push($z,$types);
            for($i = 1; $i <= 5; $i++){
                $t = Carbon::now();
                $d = $t->sub($i.' day')->toDateString();
                $c = 0;
                $g = DB::table('errors')->where([
                    ['date' , $d],
                    ['type' , $types]
                    ])->get();
                foreach($g as $gs) {
                    $c += $gs->count;
                }
                array_push($z,$c);
                unset($d);
            }
            array_push($overallData,$z);
            $z = array();
        }
        return $overallData;
    }

    public function detail($type) {
        $detailByType = $this->detailByType($type);
        $detail = DB::table('errors')->where('type' , $type)->get();
        return $result = array($detailByType , $detail);
    }

    public function detailByType($type) {
        $overallData = array($type);
        $z = array();
        // array_push($z,$types);
        for($i = 1; $i <= 5; $i++){
            $t = Carbon::now();
            $d = $t->sub($i.' day')->toDateString();
            $c = 0;
            $g = DB::table('errors')->where([
                ['date' , $d],
                ['type' , $type]
                ])->get();
            foreach($g as $gs) {
                $c += $gs->count;
            }
            array_push($z,$c);
            unset($d);
        }
        array_push($overallData,$z);
        $z = array();
        return $overallData;
    }
}
