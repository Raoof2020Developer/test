<?php

  

namespace App\Imports;
use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Traitments\ImageUploadTrait;
class ProductsImport implements ToModel, WithHeadingRow
{
    use ImageUploadTrait;

    /**

    * @param array $row

    *

    * @return \Illuminate\Database\Eloquent\Model|null

    */

    public function model(array $row)

    {

        return new Product([
            'id' => $row['id'],
            'name' => $row['name'],
            'ref' => $row['ref'],
            'designation' => $row['designation'],
            'material_id' => $row['material_id'],
            'category_id' => $row['category_id'],
            'gram_buying_price' => $row['price_of_buying_1g'],
            'gram_selling_price' => $row['price_of_selling_1g'],
            'gram_weight' => $row['weight_g'],
            'max_discount' => $row['max_discount'],
            'quantity' => $row['quantity'],
            'created_at' => $row['created_at'],
            'updated_at' => $row['updated_at']
        ]);
        
    }

}