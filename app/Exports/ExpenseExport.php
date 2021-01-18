<?php

namespace App\Exports;

use App\Expense;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;

use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\WithColumnWidths;

use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
// use Maatwebsite\Excel\Concerns\WithProperties;


class ExpenseExport implements FromQuery,WithMapping,WithColumnFormatting,ShouldAutoSize,WithHeadings,WithTitle
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
        $data= Expense::query()->with('category')
                        ->where('owner_id',$this->id)
                        ->whereBetween('date',array($this->sdate,$this->edate))

                        // ->limit(5)
                        ->orderBy('created_at','DESC');
                        // dd($data);
                        return $data;
                       
    }


     public function map($expense): array
    {
        return [
             Date::stringToExcel($expense->date),
            $expense->description,
            $expense->amount,
            
        ];
    }

     public function columnFormats(): array
    {
        return [
            'A' => NumberFormat::FORMAT_DATE_DDMMYYYY,
          
        ];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 55,
            'B' => 45,            
        ];
    }
    public function headings(): array
    {

        return [
            'Date',
            'Description',
            'Amount',
        ];
    }
     public function title(): string
    {
        return 'Expense';
    }
}
