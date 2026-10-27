<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    use HasFactory;
    protected $fillable =['user_id', 'name', 'description', 'stock', 'image', 'price'];

    public static function updateProductData($productId, array $inputData,  $imageFile = null)
    {
        $targetProduct = self::findOrFail($productId);
        if ($imageFile) {
            if ($targetProduct->image) {
                Storage::disk('public')->delete($targetProduct->image);
            }
            $inputData['image'] = $imageFile->store('products', 'public');
        }

        $targetProduct->update($inputData);

        return $targetProduct;
    }

    public static function getProductById($productId)
    {
        $targetProduct = self::findOrFail($productId);

        return $targetProduct;
    }
}