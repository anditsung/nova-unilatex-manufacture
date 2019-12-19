<?php

namespace Anditsung\Manufacture\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Plant extends Model
{
    protected $table = "manufacture_plants";

    protected $fillable = [
        'name',
        'lines',
        'user_id',
        'active',
    ];

    protected static function boot()
    {
        parent::boot(); // TODO: Change the autogenerated stub

        static::creating(function($plant) {
            if(! $plant->user_id) {
                $plant->user_id = auth()->user()->id;
            }
        });
    }

    public function delete()
    {
        $this->setKeysForSaveQuery($this->newModelQuery())->update(['active' => false]);

        return true;
    }

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
