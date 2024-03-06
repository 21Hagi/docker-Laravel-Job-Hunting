<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResumePhoto extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function getPhotoDataByUserId($userId)
    {
        $photoData = self::where('user_id', $userId)->first();
        
        return $photoData;
    }

    public function updateOrCreatePhotoData($photoData, $userId)
    {
        self::updateOrCreate(
            ['user_id' => $userId], 
            $photoData
        );
    }
}
