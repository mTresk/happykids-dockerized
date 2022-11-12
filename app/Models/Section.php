<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Image\Exceptions\InvalidManipulation;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Section extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $fillable = [
        'title',
        'description',
        'sections_list',
        'image'
    ];

//    protected $casts = [
//        'sections_list' => 'array',
//    ];

    /**
     * @throws InvalidManipulation
     */
    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('big')
            ->crop('crop-center', 685, 448)
            ->nonQueued()
            ->nonOptimized();
        $this->addMediaConversion('big_webp')
            ->format('webp')
            ->crop('crop-center', 685, 448)
            ->nonQueued()
            ->nonOptimized();
    }

    public function getImageAttribute()
    {
        $file = $this->getMedia()->last();
        if ($file) {
            $file->url = $file->getUrl();
            $file->big = $file->getUrl('big');
            $file->big_webp = $file->getUrl('big_webp');
        }

        return $file;
    }
}
