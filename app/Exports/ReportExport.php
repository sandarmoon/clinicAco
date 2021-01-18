<?php

namespace App\Exports;

// use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\FromQuery;

class ReportExport implements WithMultipleSheets
{
	

    public function __construct(string $sdate,string $edate,int $id,object $owner){
    	$this->sdate=$sdate;
    	$this->edate=$edate;
    	$this->id=$id;
    	$this->owner=$owner;

    }

     public function sheets(): array
    {
    	$sheets=[
    		new ExpenseExport($this->sdate,$this->edate,$this->id,$this->owner),
    		new IncomeExport($this->sdate,$this->edate,$this->id,$this->owner)
    	];
    	return $sheets;

    }
}
