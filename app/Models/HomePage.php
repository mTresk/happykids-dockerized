<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Image\Exceptions\InvalidManipulation;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class HomePage extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;
    
    protected $casts = [
        'education' => 'array',
        'advantages' => 'array',
        'we_choose' => 'array',
        'we_abandoned' => 'array',
        'admission' => 'array',
        'faq' => 'array',
    ];

    protected $fillable = [
        'recruiting',
        'recruiting_full',
        'about_title',
        'about_text',
        'education',
        'advantages',
        'advantages_image',
        'we_choose',
        'we_abandoned',
        'admission',
        'faq',
        'slider'
    ];

    /**
     * @throws InvalidManipulation
     */
    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('cropped')
            ->format('jpg')
            ->crop('crop-center', 407, 305)
            ->nonQueued()
            ->nonOptimized();
        $this->addMediaConversion('webp')
            ->format('webp')
            ->crop('crop-center', 407, 305)
            ->nonQueued()
            ->nonOptimized();
    }
}
