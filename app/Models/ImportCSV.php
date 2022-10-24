<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Support\Collection;
use Spatie\MediaLibrary\Conversions\Conversion;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\FileAdder;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * App\Models\ImportCSV
 *
 * @property int $id
 * @property string $name
 * @property string $path
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection|Media[] $media
 * @property-read int|null $media_count
 * @method static \Illuminate\Database\Eloquent\Builder|ImportCSV newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ImportCSV newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ImportCSV query()
 * @method static \Illuminate\Database\Eloquent\Builder|ImportCSV whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ImportCSV whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ImportCSV whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ImportCSV wherePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ImportCSV whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ImportCSV extends Model implements HasMedia
{
    use InteractsWithMedia;
}
