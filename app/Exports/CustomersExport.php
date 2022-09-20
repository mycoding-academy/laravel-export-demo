<?php

namespace App\Exports;

use App\Models\Customer;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;

class CustomersExport implements FromQuery
{
    use Exportable;

    public function __construct($request)
    {
        $this->request = $request;        
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function query()
    {
        $search = $this->request->search;
        $query = Customer::query();
        if (!empty($search)) {
            $query->where('first_name', 'LIKE', '%'.$search.'%')
                ->orWhere('last_name', 'LIKE', '%'.$search.'%');
        }
        return $query;
    }
}
