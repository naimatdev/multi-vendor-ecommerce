<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticable;

class Admin extends Authenticable
{
    use HasFactory;
    protected $guard = 'admin';
    protected $fillable = [
        'name',
        'type',
        'vendor_id',
        'mobile',
        'email',
        'password',
        'image',
        'status',
    ];
    public function vendorPersonal()
    {
        return $this->belongsTo('App\Models\Vendor','vendor_id');
    }
    public function vendorBusiness()
    {
        return $this->belongsTo('App\Models\VendorsBusinessDetail','vendor_id');
    }
    public function vendorBank()
    {
        return $this->belongsTo('App\Models\VendorsBankDetail','vendor_id');
    }
}
