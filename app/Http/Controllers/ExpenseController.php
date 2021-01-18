<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Expense;
use App\Treatment;
use App\Owner;
use App\Category;
use App\Exports\ReportExport;
use Carbon;
use Yajra\DataTables\Facades\DataTables;
use DB;
use Auth;
use Excel;
use Illuminate\Support\Collection;
class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $id= Auth::user()->id;

        $survey=Owner::withCount(['doctors','receptions','treatments','appointments'=> function($q) {
            $q->where('status',0)
            ->whereDate('A_Date','>=',Carbon::today()->toDateString());
        }])
        ->where('user_id',$id)
        ->get();
    
        return view('expenseTutorial',compact('survey'));
    }

    public function superadmindashboard(){
        $survey=Owner::with(['doctors','patients','patients.treatments','doctors.user','receptions.user','treatments'=>function($q1){
            $q1->whereNotNull('gc_level');
            
        },'appointments.doctor','doctors.treatments'=>function($q){
            $q->whereNull('gc_level')
            ->whereDate('created_at','>=',\Carbon::today()->toDateString());
        }])
        ->withCount(['doctors','receptions','treatments'=> function($q) {
            $q->whereNotNull('gc_level');
        },'appointments'=> function($q) {
            $q->where('status',0);
        }])
       
        ->get();
           // dd($survey);

        return view('adminDashboard',compact('survey'));
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

         $request->validate([
            'date' => 'required',
            'description' => 'required',
            'amount' => 'required',
            'category' => 'required',
        ]);

        $expense=array();
        $count=count($request->file());
        $filearray=$request->file();
       foreach($filearray as $f){
           $name=uniqid().time().'.'.$f->getClientOriginalExtension();
                $f->move(public_path('storages/expense/'),$name);
                $path='storages/expense/'.$name;
                $expense[]=$path;
       }
      // var_dump($expense);
      //   die();
       $id=Auth::user()->owners[0]->id;
       // dd($id);
        Expense::create([
            'date'=>request('date'),
            'description'=>request('description'),
            'amount'=>request('amount'),
            'files'=>json_encode($expense),
            'owner_id'=>$id,
            'category_id'=>request('category')
        ]);
        echo "successfully";
        
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
        //
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
         $expensefile=array();

         $expense = Expense::find($id);
                 $fielpath='';
        $count=count($request->file());
        $filearray=$request->file();
        if($count>0){

            foreach(json_decode(request('oldimage'),true) as $img){
                unlink($img);
            }
             foreach($filearray as $f){
               $name=uniqid().time().'.'.$f->getClientOriginalExtension();
                    $f->move(public_path('storages/expense/'),$name);
                    $path='storages/expense/'.$name;
                    $expensefile[]=$path;

               }
               $filepath=json_encode($expensefile);
        }else{
             $filepath=request('oldimage');
        }

         $expense->description=request('description');
         $expense->date=request('date');
         $expense->amount=request('amount');
         $expense->category_id=request('category');
         $expense->files=$filepath;
         $expense->update();
         echo "successfully";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $expense = Expense::find($id); // Can chain this line with the next one
        $expense->delete($id);
        return response()->json(['success'=>'Record is successfully updated!']);
    }

    public function getExpense(){
        $id=Auth::user()->owners[0]->id;
        $dateS = Carbon::now()->startOfMonth()->subMonth(3);
        $dateE = Carbon::now()->startOfMonth()->addMonth(1); 
        // echo $dateS.$dateE;
        // $TotalSpent = DB::table('orders')
        // ->select('total_cost','placed_at')
        // ->whereBetween('placed_at',[$dateS,$dateE])
        // ->where(['deleted' => '0', 'delivery_address_id' => $DeliveryAddress->id])
        // ->sum('total_cost');

        // $records = Treatment::whereMonth('created_at', '>=', $dateS)
        //     ->whereMonth('created_at', '<=', $dateE)
        //     ->get();
        //$records=Treatment::whereBetween('created_at',array($dateS,$dateE))->get();

       
        $data= Treatment::whereHas('doctor',function($q)use($id){
            $q->where('owner_id',$id);
        })
        ->get()
        
        ->sortByDESC(function ($item) {
        return $item->created_at->month;
        })
        ->sortByDESC(function ($item) {
        return $item->created_at->year;
        })
        ->whereBetween('created_at', [ Carbon::now()->startOfMonth()->subMonth(5), Carbon::now()->startOfMonth()])
        
        ->groupBy(function ($item) {
             return $item->created_at->format("F:Y");
        })->map
        ->sum('charges');
        $id=Auth::user()->owners[0]->id;
        $expenses=Expense::with('category')
        ->where('owner_id',$id)->orderBy('id','DESC')->get();
        // return response()->json(['expenses'=>$expenses,'report'=>$data]);;
        return Datatables::of($expenses)->addIndexColumn()->make(true);
    }

    public function searchReport(Request $request){
         $id=Auth::user()->owners[0]->id;
         $request->validate([
            'startdate' => 'required',
            'enddate' => 'required',
            
        ]);
       $startdate=request('startdate');
       $enddate=request('enddate');
        $id=Auth::user()->owners[0]->id;
       $totalexpense=Expense::where('owner_id',$id)
                        ->whereBetween('date',array($startdate,$enddate))
                        ->sum('amount');

       $date_from = Carbon::parse($startdate)->startOfDay();
        $date_to = Carbon::parse($enddate)->endOfDay();

        $totalIncome = Treatment::whereHas('doctor',function($q)use($id){
            $q->where('owner_id',$id);
        })->
        whereDate('created_at', '>=', $date_from)
            ->whereDate('created_at', '<=', $date_to)
         ->sum('charges');
            // ->get();
            //dd($totalIncome);

       return response()->json(['totalExpense'=>$totalexpense,'totalIncome'=>$totalIncome]);
    }


    public function expenseList(){
        $id=Auth::user()->owners[0]->id;
        $categories=Category::where('owner_id',$id)->get();
        return view('expense.expenseList',compact('categories'));
    }

    public function sampleReport(){
         $id=Auth::user()->owners[0]->id;
        $categories=Category::where('owner_id',$id)->get();
        
    return view('expense.transactionReport',compact('categories'));
 }
 public function report(){
         $id=Auth::user()->owners[0]->id;
        $categories=Category::where('owner_id',$id)->get();
        
    return view('expense.report',compact('categories'));
 }

    public function getexpenseReports(Request $request){
        $startdate=$request->sDate;
        $enddate=$request->eDate;
        $name=$request->name;

        $totalIncome=0;
        $totalExpense=0;



        $id=Auth::user()->owners[0]->id;

        if($startdate ==$enddate){
                $totalExpense=Expense::where('owner_id',$id)
                        ->whereDate('date',$startdate)
                        ->sum('amount');

                $totalIncome=Treatment::whereHas('doctor',function($q)use ($id){
                    $q->where('owner_id',$id);
                })->whereNotNull('gc_level')
                ->whereDate('created_at',$startdate)
                ->sum('charges');

                 $data['totalIncome']=$totalIncome;
                $data['totalExpense']=$totalExpense;
            }else{
                $totalExpense=Expense::where('owner_id',$id)
                        ->whereBetween('date',array($startdate,$enddate))
                        ->sum('amount');

                $totalIncome=Treatment::whereHas('doctor',function($q)use ($id){
                    $q->where('owner_id',$id);
                })->whereNotNull('gc_level')
                ->whereBetween('created_at',array($startdate,$enddate))
                ->sum('charges');

                 $data['totalIncome']=$totalIncome;
                $data['totalExpense']=$totalExpense;
            }

       


        if($name=="expense"){

           if($startdate ==$enddate){

                $expenseData=Expense::with('category')
                        ->where('owner_id',$id)
                        ->whereDate('date',$startdate)

                        // ->limit(5)
                        ->orderBy('created_at','DESC')
                        ->get();

           }else{
                $expenseData=Expense::with('category')
                        ->where('owner_id',$id)
                        ->whereBetween('date',array($startdate,$enddate))

                        // ->limit(5)
                        ->orderBy('created_at','DESC')
                        ->get();
           }


            
            $data['expense']=$expenseData;

        }else{

            if($startdate == $enddate){

                $incomeData=Treatment::whereHas('doctor',function($q)use ($id){
                                $q->where('owner_id',$id);
                            })
                            ->with(['patient','doctor'])
                            ->whereNotNull('gc_level')
                            ->whereDate('created_at',$startdate)

                            // ->limit(5)
                            ->orderBy('created_at','DESC')
                            ->get();

            }else{

                $incomeData=Treatment::whereHas('doctor',function($q)use ($id){
                                $q->where('owner_id',$id);
                            })
                            ->with(['patient','doctor'])
                            ->whereNotNull('gc_level')
                            ->whereBetween('created_at',array($startdate,$enddate))

                            // ->limit(5)
                            ->orderBy('created_at','DESC')
                            ->get();
            }
             
             $data=$incomeData;
        }

      

    // $expenseData =Expense::where('owner_id',$id)
    //             ->whereBetween('date',array($startdate,$enddate))
    //             ->groupBy('date')
    //            ->get();
    // $mapping=$expenseData->map(function($p){
    //     return ['date'=>$p->sum('amount')];
    // });
        // $mapping=Expense::where('owner_id',$id)
        // ->whereBetween('date', array($startdate,$enddate))
        // ->get();

      /* $expenses= Expense::where('owner_id',$id)
                ->whereBetween('date',array($startdate,$enddate))
                 ->get();

             $expenselist=collect($expenses)->groupBy(function ($proj) {
                                    return $proj->date;
                                })
                                ->map(function ($month) {
                                    return $month->sum('amount');
                                });*/
    
 // $data['expensef']=$expenselist;
               

        // $mapping=Treatment::select('created_at', DB::raw('sum(charges) as total'))
        //     ->whereHas('doctor',function($q)use ($id){
        //         $q->where('owner_id',$id);
        //     })
        //     ->whereNotNull('gc_level')
        //     ->whereBetween('created_at',array($startdate,$enddate))
        //     // ->limit(5)
        //     ->orderBy('created_at','DESC')
        //      ->groupBy('created_at')
        //      ->get();
        

             /*$incomes = Treatment::whereHas('doctor',function($q)use ($id){
                                    $q->where('owner_id',$id);
                                })
                                ->whereNotNull('gc_level')
                                ->whereBetween('created_at',array($startdate,$enddate))
                                // ->limit(5)
                                ->orderBy('created_at','DESC')
                                ->get();
                        

                  $incomelist=collect($incomes)->groupBy(function ($proj) {
                                    return $proj->created_at->format('Y-m-d');
                                })
                                ->map(function ($month) {
                                    return $month->sum('charges');
                                })->toArray();*/

                // $data['income']=$incomelist;

        // return response()->json([
        //     'status'=>200,
        //     'data'=>$data
        // ]);

                                return Datatables::of($income)->make(true);

    }
    public function getexpenseReport(Request $request){
        $id=Auth::user()->owners[0]->id;
        $startdate=$request->sDate;
        $enddate=$request->eDate;
        $name=$request->name;
        // echo $name;die();

        $data=null;
        $enddate=Carbon::create($enddate)->addDay(1);
        if($name=="income"){
            $data=Treatment::whereHas('doctor',function($q)use ($id){
                                $q->where('owner_id',$id);
                            })
                            ->with(['patient','doctor'])
                            ->whereNotNull('gc_level')
                            ->whereBetween('created_at',array($startdate,$enddate))

                            // ->limit(5)
                            ->orderBy('created_at','DESC')
                            ->get();
        }else{
            $data=Expense::with('category')
                        ->where('owner_id',$id)
                        ->whereBetween('date',array($startdate,$enddate))

                        // ->limit(5)
                        ->orderBy('created_at','DESC')
                        ->get();
        }
        


                            
                return Datatables::of($data)->make(true);            


    }
    public function filterExpensbyCategory(Request $request){
        $cid=$request->cid;
        $startdate=$request->startdate;
        $enddate=$request->enddate;
        $id=Auth::user()->owners[0]->id;
        $expenseData=null;
        if($cid>0){
         if($startdate ==$enddate){

                $expenseData=Expense::with('category')
                        ->where('owner_id',$id)
                        ->where('category_id',$cid)
                        ->whereDate('date',$startdate)

                        // ->limit(5)
                        ->orderBy('created_at','DESC')
                        ->get();

           }else{
                $expenseData=Expense::with('category')
                        ->where('owner_id',$id)
                        ->where('category_id',$cid)
                        ->whereBetween('date',array($startdate,$enddate))

                        // ->limit(5)
                        ->orderBy('created_at','DESC')
                        ->get();
           }
        }else{
            if($startdate ==$enddate){

                $expenseData=Expense::with('category')
                        ->where('owner_id',$id)
                        ->whereDate('date',$startdate)

                        // ->limit(5)
                        ->orderBy('created_at','DESC')
                        ->get();

           }else{
                $expenseData=Expense::with('category')
                        ->where('owner_id',$id)
                        ->whereBetween('date',array($startdate,$enddate))

                        // ->limit(5)
                        ->orderBy('created_at','DESC')
                        ->get();
           }
        }
             $expense=$expenseData;
             // return $expense;
        return response()->json([
            'status'=>200,
            'data'=>$expense
        ]);

        // echo $cid;
    }

    public function exportExcel(Request $request){
        $id=Auth::user()->owners[0]->id;
        $owner=Auth::user()->owners[0];
        $startdate=$request->sDate;
        $enddate=$request->eDate;
        $enddate=Carbon::create($enddate)->addDay(1);
        // dd($request);

        $data=collect(Expense::with('category')
                        ->where('owner_id',$id)
                        ->whereBetween('date',array($startdate,$enddate))

                        // ->limit(5)
                        ->orderBy('created_at','DESC')
                        ->get())->toArray();

        // Excel::create('Export data', function($excel) use($data) {
        //      $excel->sheet('Sheet 1', function($sheet) use($data) {
        //         $firstSheet=$data->toArray();
        //          $sheet->fromArray($firstSheet);
        //      });
        // })->download('xlsx');
                  return      Excel::download(new ReportExport($startdate,$enddate,$id,$owner),'expense.xlsx');
       
    }

    


}
