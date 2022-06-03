<?php

namespace App\Traits;
use Illuminate\Database\Eloquent\Builder;

Trait Multitenantable {
    public static function bootMultitenantable(){

        if (auth()->check()) {
            static::creating(function($model){
                $model->created_by_user_id = auth()->id();
            });
            static::addGlobalScope('created_by_user_id', function(Builder $builder){
                if (auth()->check()) {
                   return $builder->where('created_by_user_id', auth()->id());
                }
            });
        }
        
    }
}