<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;
	protected $table = 'vendors';
	protected $primaryKey = 'id';
	
	protected $fillable = [
        'user_id', 'name', 'brand_name', 'categories', 'gstin', 'city', 'state', 'country', 'pincode', 'landmark', 'payment_id', 'brand_logo',
    ];
	protected $casts = [
        'categories' => 'json',
    ];
	
	 /**
     * Get the user that owns the vendor.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
