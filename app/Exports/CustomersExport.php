<?php

namespace App\Exports;

use App\Models\Customer;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;

class CustomersExport implements FromQuery
{
    use Exportable;

    public function __construct($search, $status)
    {
        $this->search = $search;
        $this->status = $status;        
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function query()
    {

        $query = Customer::query();
        if (!empty($this->search)) {
            $query->where('first_name', 'LIKE', '%'.$this->search.'%')
                ->orWhere('last_name', 'LIKE', '%'.$this->search.'%');
        }

        if ($this->status != '') {
            $query->whereIsActive($this->status);
        }

        return $query;
    }
}
