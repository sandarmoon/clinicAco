<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Medicine;
use App\Medicinetype;
use App\Treatment;
use App\Monthlymedicine;
use App\Stock;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Resources\MedicineResource;
use Auth;
use Carbon\Carbon;
use DB;
class MedicineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medicines =Medicine::orderBy('id','DESC')->get();
        $medTypes=Medicinetype::all();
        //return view('medicine.index',compact('medicines','medTypes'));
        return view('medicine.index',compact('medicines','medTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         // dd($request);
        $messages = [
                
                'ctab.required' => 'at least tab unit is required',
                'expiredDate.required'=>'expiredDate is required'
            ];
        $request->validate([
            
            'name' => 'required',
            'chemical' => 'required',
            'medsize' => 'required',
            'type_id'=>'required',
            'ctab' => 'required',
            'expiredDate' => 'required',
        ],$messages);



        $medicine=new Medicine();
        $medicine->medicinetype_id=request('type_id');
        $medicine->name=request('name');
        $medicine->chemical=request('chemical');
        $medicine->size=request('medsize');
        $medicine->owner_id=Auth::user()->owners[0]->id;
        $medicine->save();

        // $medicines=Medicine::orderBy('id','DESC')->get();
        Stock::create([
            'medicine_id'=>$medicine->id,
            'qty'=>request('totaltab'),
            'unit1'=>request('cphar'),
            'unit2'=>request('cbu'),
            'unit3'=>request('ccard'),
            'unit4'=>request('ctab'),
            'expire_date'=>request('expiredDate')
        ]);
        return response()->json(['success'=>'Record is successfully added!','medicine'=>$medicine]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $medicine=Medicine::with('medicinetype')->where('id',$id)->first();
      return $medicine;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request);
         $request->validate([
            'typeid' => 'required',
            'name' => 'required',
            'chemical' => 'required',
            'medsize'=>'required'

        ]);
         $medicine=Medicine::find($id);
         $medicine->name=request('name');
         $medicine->medicinetype_id=request('typeid');
         $medicine->size=request('medsize');
         $medicine->chemical=request('chemical');
         $medicine->save();
         return response()->json(['success'=>'Record is successfully updated!','medicine'=>$medicine]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $med = Medicine::find($id); // Can chain this line with the next one
        $med->delete($id);
        return response()->json(['success'=>'Record is successfully updated!']);
        
    }

    public function getMedicine(){
        
        $user=Auth::user();
        if($user->hasRole('Admin')){

             $id=Auth::user()->owners[0]->id;
                // dd($id);

                $dateS = Carbon::now()->startOfMonth();
                $dateE = Carbon::now(); 
                // dd($dateE);
                // dd($id);

                // $medicines=Stock::where('owner_id','=',$id)
                // ->whereBetween('date',array($dateS,$dateE))
                // ->orderBy('id','DESC')->get();
                // dd($medi)

                $medicines=Stock::
                whereHas('medicine',function($q) use ($id){
                        $q->where('owner_id','=',$id);
                    })->with('medicine.medicinetype')

                ->whereBetween('created_at',array($dateS,$dateE))
                
                ->orderBy('medicine_id')
                ->get();
        }else{
              $medicines=Medicine::with('medicinetype')
                ->distinct() 
                ->orderBy('id')
                ->get();
        }

       

        // $med2=Stock::
        // whereHas('medicine',function($q) use ($id){
        //         $q->where('owner_id','=',$id);
        //     })->with('medicine.medicinetype')

        // ->whereBetween('created_at',array($dateS,$dateE))
        // ->get();
//         ->groupBy('medicine_id')
//        -> map(function ($row) {
//     return $row->sum('n');
// });

        
        
          // dd($medicines);

        // $data=collect($med2);
        //  $data=$data->groupBy(['medicine_id'])
        //            -> map(function ($row) {
        //         return $row->sum('qty');
        //     })->toArray();
        //  dd($data);

        // $all=MedicineResource::collection($medicines);
        return Datatables::of($medicines)->addIndexColumn()->toJson();
    }

    public function getmed(){
        $id=Auth::user()->owners[0]->id;
        $medicines=Medicine::with('medicinetype')->where('owner_id',$id)->get();
        return $medicines;
    }

    public function stockStore(Request $request){
          // dd($request);
        $messages = [
                'medId.required'=>'not found for medicine',
                'tab.required' => 'at least tab unit is required',
                'expiredDate.required'=>'expiredDate is required'
            ];
        $request->validate([
            'medId'=>'required',
            'tab' => 'required',
            'expiredDate' => 'required',
            
        ],$messages);

// ['medicine_id','qty','unit1','unit2','unit3','unit4','expire_date'];
        Stock::create([
            'medicine_id'=>request('medId'),
            'qty'=>request('totaltab'),
            'unit1'=>request('phar'),
            'unit2'=>request('bu'),
            'unit3'=>request('card'),
            'unit4'=>request('tab'),
            'expire_date'=>request('expiredDate')
        ]);

        return response()->json(['success'=>'Record is successfully added!']);


    }


    public function medicineCreateByOwner(){
         $medTypes=Medicinetype::all();
        return view('owner.medicineCreate',compact('medTypes'));
    }


    public function getMeds(){
        $id=Auth::user()->owners[0]->id;
        // dd($id);

        $dateS = Carbon::now()->subMonth()->startOfMonth();
        $dateE = Carbon::now()->subMonth()->endofMonth(); 
        // dd($dateS);
        // dd($id);

        // $medicines=Stock::where('owner_id','=',$id)
        // ->whereBetween('date',array($dateS,$dateE))
        // ->orderBy('id','DESC')->get();
        // dd($medi)

        $medicines=Stock::
        whereHas('medicine',function($q) use ($id){
                $q->where('owner_id','=',$id);
            })->with('medicine.medicinetype')
        
        ->whereBetween('created_at',array($dateS,$dateE))
        
        ->orderBy('id','desc')
        ->get();

         // dd($medicines);
        $unit_data=[];
         $collection=collect($medicines);

         $collection=$collection->groupBy('medicine_id')->toArray();
         foreach ($collection as $k=>$value) {
             foreach ($value as $key => $v) {
                if($key==0){
                    $unit_data[$k]=$v;
                    break;
                }
             }
         }
         ksort($unit_data);
         // dd($unit_data);
         $final_unit_data=[];
         $final_array=[];
          $lastMonthDay= date('Y-m-d', strtotime('last day of previous month')); 
        $monthlymedicines=Monthlymedicine::
        // with('medicine')
                    whereDate('emdate',$lastMonthDay)
                    ->get();

                      // dd($monthlymedicines);

                    foreach ($monthlymedicines as $key => $value) {
                        // dd($value->medicine_id);
                       foreach ($unit_data as $k => $v) {
                            if($value->medicine_id == $v['medicine_id']){
                                $final_unit_data['medicine']=$value->medicine->name;
                                $final_unit_data['medicine_id']=$value->medicine_id;
                                $final_unit_data['type']=$value->medicine->medicinetype->name;
                                $final_unit_data['chemical']=$value->medicine->chemical;
                                $final_unit_data['date']=$value->emdate;
                                $final_unit_data['qty']=$value->qty;
                                $final_unit_data['phar']=$v['unit1'];
                                $final_unit_data['bu']=$v['unit2'];
                                $final_unit_data['card']=$v['unit3'];
                                $final_unit_data['tab']=$v['unit4'];
                                // dd($final_unit_data);
                                array_push($final_array, $final_unit_data);
                                break;
                            }
                            continue;
                       }
                    }


                    
                    // dd($final_array);
         return Datatables::of($final_array)->addIndexColumn()->toJson();
    }

    public function monthlyStock($dateS,$dateE){

        // dd('yes');
        $id=Auth::user()->owners[0]->id;
        // dd($id);
        // $dateS = Carbon::now()->startOfMonth();
        // $dateE = Carbon::now()->endofMonth(); 
        // $dateS='2020-09-01';
        // $dateE='2020-09-30';

         $usemed=[];
         $data_treat=[];
         

         // $treatments=Treatment::with('medicines')->get();
         // foreach ($treatments as $t) {
         //      echo $t->->sum('pivot.quantity');
         // }


         // ======== ======== ======== ======== ======== ========
        $treatments=Treatment::with('medicines')
        ->whereHas('doctor',function($q) use ($id){
            $q->where('owner_id','=',$id);
        })
        ->whereBetween('created_at',array($dateS,$dateE))->whereNotNull('gc_level')->get();


        foreach ($treatments as $key => $value) {
               
                  $data2= $value->medicines;
                  
                  foreach ($data2 as $k=>$v2) {
                    array_push($usemed,$v2);
                     }

             }
                 
             $collection=collect($usemed);
             $grouped = $collection->mapToGroups(function ($item, $key) {
                // dd($key);
                    return [$item['id'] => $item->pivot->tab];
                })->toArray();
//              $result = $collection->map(function ($item, $key)) {
//           return [$key => $item->sum('session')];
// };
             ksort($grouped);
            


          foreach($grouped as $i=>$v){
             $total=0;
            foreach ($v as $k => $val) {


                $total+=$val;

                 $data_treat[$i]=$total;
            }
         }

        //dd($data_treat);
           // ======= ======== ======== ======== ======== ========
       
        // monthlyStock
         // dd($dateS,$dateE);
         $month_stock=[];
           $monthStock=Stock::
                    whereHas('medicine',function($q) use ($id){
                            $q->where('owner_id','=',$id);
                        })->with('medicine.medicinetype')
                    
                    ->whereBetween('created_at',array($dateS,$dateE))
                    
                    ->orderBy('medicine_id')
                    ->get();
            // dd($monthStock);

            $data=collect($monthStock);
            $data=$data->groupBy('medicine_id')->toArray();
           

            foreach($data as $i=>$v){
             $total=0;
                foreach ($v as $k => $val) {

                    // dd($val['qty']);
                    $total+=$val['qty'];

                     $month_stock[$i]=$total;
                    }
             }
                 //dd($month_stock);

            // ================================================================
             

             if($dateS->equalTo(Carbon::Today())){
                $lastMonthDay= date('Y-m-d', strtotime('last day of previous month'));

             }else{
                
                $date=$dateS->subMonths(1); 
                $lastMonthDay= $date->lastOfMonth(); 
               // echo  $data->lastOfMonth()->toDateString();die();
             }

            
         // dd($lastMonthDay);

            $remain_stock=[];

            $monthlymedicine=Monthlymedicine::whereDate('emdate',$lastMonthDay)
                    ->get();

                    $data=collect($monthlymedicine);
                    $data=$data->groupBy('medicine_id')->toArray();
                   
                    // dd($data);
                    $total=0;
                    foreach($data as $i=>$v){
                     
                        foreach ($v as $k => $val) {

                            // dd($val['qty']);
                            $total+=$val['qty'];

                             $remain_stock[$i]=$total;
                            }
                     }

                     // dd($month_stock);

            // ================================================================
                    // total remain stock 
                      $remain_total_stock=[];



                      foreach($month_stock as $k=>$m){
                // dd($m);
                        if(!empty($remain_stock)){
                            foreach($remain_stock as $i=>$v){
                                if($k==$i){

                                    $remain_total_stock[$k]=$m+$v;
                                    break;
                                }
                                else{
                                     $remain_total_stock[$k]=$m+$v;
                                }
                                    
                                     $remain_total_stock[$k]=$m;
                                   
                                
                            }
                        }else{

                         $remain_total_stock[$k]=$m;
                        }
                     }
                     // dd($remain_total_stock);
            // ================================================================
                  $final_data=[];  

                 

             foreach($remain_total_stock as $k=>$m){
                // dd($m);
                if(!empty($data_treat)){
                    foreach($data_treat as $i=>$v){

                        if($k==$i){

                            $final_data[$k]=$m-$v;
                            break;
                        }
                            
                            $final_data[$k]=$m;
                           
                        
                    }
                }else{
                    $final_data=$remain_total_stock;
                }
             }
             // dd($final_data);

             foreach ($final_data as $key => $value) {
                 Monthlymedicine::create([
                    'medicine_id'=>$key,
                    'emdate'=>$dateE,
                    'qty'=>$value
                 ]);
             }

            
            return response()->json(['success'=>'successfully added!']);




       
              


    }


    public function  checkMonthlyMedAdding(){
        // dd('yes');
        $today = Carbon::now()->toDateString();
        $currentMonth = Carbon::now();
        $currentMonth2 = Carbon::now();
         $lastdayofcurrent=Carbon::now()->endOfMonth()->toDateString();
        // echo $lastdayofcurrent;
        // $start = new Carbon('first day of last month');
        $first = Carbon::create(2020, 11, 30, 0, 0, 0);

        $lastDayoflastMonth  = new Carbon('last day of last month');
        $ldlM=$lastDayoflastMonth->toDateString();
        
        $getMonthlylastMed=collect(Monthlymedicine::get())->groupBy('emdate')->toArray();
        // dd($getMonthlylastMed['2020-09-30']);
        

        if($today==$lastdayofcurrent ){
            // dd('todat');
            $dateS = Carbon::now()->startOfMonth();
            $dateE = Carbon::now()->endofMonth(); 
            $this->monthlyStock($dateS,$dateE);
        }

        if($today > $ldlM){
            // dd('lastday');
            if(!array_key_exists($ldlM, $getMonthlylastMed)){
                $firstDayoflastMonth  = new Carbon('first day of last month');
                $lastDayoflastMonth  = new Carbon('last day of last month');
                //dd('yeah');
                $this->monthlyStock($firstDayoflastMonth,$lastDayoflastMonth);
            }
        }


    }
}


















