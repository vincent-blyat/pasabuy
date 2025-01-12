<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PasabuyUser;
use App\Models\OfferPost;
use Webpatser\Uuid\Uuid;

class Post extends Model
{
    use HasFactory;

    protected $table = 'tbl_post';
    protected $fillable = ['email', 'postIdentity', 'postStatus'];

    public $timestamps = false;
    public $primaryKey = 'indexPost';

    public static function boot()
	{
    parent::boot();
    self::creating(function ($model) {
        $model->postNumber = (string) Uuid::generate(4);
    });
	}

    public function pasabuy_user() {
    	$this->belongsTo(PasabuyUser::class, 'email', 'email');
    }

    public function offer_post() {
    	return $this->hasOne(OfferPost::class, 'postNumber', 'postNumber');
    }
}
