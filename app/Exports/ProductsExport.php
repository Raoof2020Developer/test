<?php

  

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;

use Maatwebsite\Excel\Concerns\WithHeadings;

  

class ProductsExport implements FromCollection, WithHeadings {

    /**

    * @return \Illuminate\Support\Collection

    */

    public function collection()

    {

        return Product::all();

    }

  

    /**

     * Write code on Method

     *

     * @return response()

     */

    public function headings(): array

    {

        return ["ID", "Name", "Ref", "Designation", "Image path", "Material ID", "Category ID", "Price of buying 1G", "Price of selling 1G", "Weight (G)", "Max discount", "Quantity", "Created_at", "Updated_at", ];

    }

}