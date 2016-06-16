<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\SearchIndex\Searchable;

class Asset extends Model implements Searchable
{
    // $assets = Asset::all();
    protected $fillable = [
        'enabled',
        'is_container',
        'container_id',
        'type_id',
        'time_checked',
        'barcode'
    ];

    public function container(){
        return $this->hasOne('App\Asset','id','container_id');
    }

    public function user(){
        return $this->hasOne('App\User','id','last_checked_by');
    }

    public function loan(){
        return $this->hasMany('App\Loan','asset_id','id');
    }

    public function containedAssets(){
    	if($this->is_container){
    		$items = Asset::where('container_id' == $this->id);
    		return $items;
    	}
    }

    public function type(){
        return $this->hasOne('App\Type','id','type_id');
    }

    public function scopeloanable($query){
        return $query->where('loanable',1);
    }

    public function scoperoom($query){
        return $query->where('is_container',1);
    }

    public function scopeEnabled($query){
        return $query->where('enabled',1);
    }

    public function attributes(){
        return $this->hasManyThrough('App\Attribute','App\AttributeAsset','asset_id','attribute_id');
    }

    public function items(){
        // if($this->is_container)
            return $this->hasMany('App\Asset','container_id','id');
    }

    public function issues(){
        return $this->hasMany('App\Issue','asset_id','id');
    }

    public function getSearchableBody()
    {
        $searchableProperties = [
            'barcode' => $this->barcode,
            'type' => $this->type()->name,
        ];

        return $searchableProperties;
    }

    public function getSearchableType()
    {
        return 'asset';
    }

    public function getSearchableId()
    {
        return $this->id;
    }

}
