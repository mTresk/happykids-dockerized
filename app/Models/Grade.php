<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Image\Exceptions\InvalidManipulation;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Grade extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $fillable = [
        'slug',
        'title',
        'price',
        'extra',
        'badge',
        'schedule',
        'price_extra',
        'section',
        'lesson',
        'image'
    ];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    /**
     * @throws InvalidManipulation
     */
    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('cropped')
            ->crop('crop-center', 440, 290)
            ->nonQueued()
            ->nonOptimized();
        $this->addMediaConversion('big')
            ->crop('crop-center', 700, 448)
            ->nonQueued()
            ->nonOptimized();
        $this->addMediaConversion('cropped_webp')
            ->format('webp')
            ->crop('crop-center', 440, 290)
            ->nonQueued()
            ->nonOptimized();
        $this->addMediaConversion('big_webp')
            ->format('webp')
            ->crop('crop-center', 700, 448)
            ->nonQueued()
            ->nonOptimized();
    }

    public function getImageAttribute()
    {
        $image = $this->getMedia()->last();
        if ($image) {
            $image->url = $image->getUrl();
            $image->cropped = $image->getUrl('cropped');
            $image->big = $image->getUrl('big');
            $image->cropped_webp = $image->getUrl('cropped_webp');
            $image->big_webp = $image->getUrl('big_webp');
        }

        return $image;
    }

}
