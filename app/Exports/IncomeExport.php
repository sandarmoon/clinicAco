<?php

namespace App\Exports;

// use Maatwebsite\Excel\Concerns\FromCollection;
// use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithMapping;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithProperties;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use App\Treatment;

class IncomeExport implements FromQuery,WithMapping,WithColumnFormatting,ShouldAutoSize,WithHeadings,WithTitle
{
	use Exportable;

    public function __construct(string $sdate,string $edate,$id,$owner){
		$this->sdate=$sdate;
		$this->edate=$edate;
		$this->id=$id;
		$this->owner=$owner;
	} 
    /**
    * @return \Illuminate\Support\Collection
    */

    public function query()
    {
        // return Invoice::query()->whereYear('created_at', $this->year);
        $id=$this->id;
       $data=Treatment::query()->whereHas('doctor',function($q)use ($id){
                                $q->where('owner_id',$id);
                            })
                            ->with(['patient','doctor'])
                            ->whereNotNull('gc_level')
                            ->whereBetween('created_at',array($this->sdate,$this->edate))

                            // ->limit(5)
                            ->orderBy('created_at','DESC');
                           

                        return $data;
                       
    }

     public function map($income): array
    {
        return [
             Date::dateTimeToExcel($income->created_at),
            $income->patient->name,
            $income->charges,
            
        ];
    }
     public function columnFormats(): array
    {
        return [
            'A' => NumberFormat::FORMAT_DATE_DDMMYYYY,
          
        ];
    }
    // public function columnWidths(): array
    // {
    //     return [
    //         'A' => 30,
    //         'B' => 30,            
    //     ];
    // }

    public function headings(): array
    {

        return [
            'Date',
            'Pt Name',
            'Income',
        ];
    }

    //   public function properties(): array
    // {
    // 	$owner=$this->owner->user->name;
    // 	$clinic=$this->owner->clinic_name;


    // 	$description=$this->sdate.' - '.$this->edate;
    //     return [
            
    //         'title'          => 'Income',
    //         'description'    => $description,
    //         'subject'        => 'Income',
    //         'keywords'       => 'Income,export,spreadsheet',
    //         'category'       => 'Income',
    //         'admin'        => $owner,
    //         'clinic'        => $clinic,
    //     ];
    // }

    public function title(): string
    {
        return 'Income';
    }
}
