<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Tonysm\RichTextLaravel\Models\Traits\HasRichText;

class Profile extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;
    use HasRichText;

    protected $guarded = [];

    protected $richTextFields = [
        'bio',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getImageUrl(String $format)
    {
        $media = $this->media->first();
        if ($media === null) {
            return URL::to('/') . "/media/profiel.png";
        }

        try {
            return $media->getUrl($format);
        } catch (Exception $e) {
            return $media->getUrl();
        }
    }

    public function registerMediaConversions(Media $media = null): void
    {
        if ($media && $media->extension === Manipulations::FORMAT_GIF) {
            return;
        }

        $this
            ->addMediaConversion('thumbnail')
            ->fit(Manipulations::FIT_CROP, 64, 64)
            ->nonQueued();
        $this
            ->addMediaConversion('big')
            ->fit(Manipulations::FIT_CROP, 256, 256)
            ->nonQueued();
    }
}
