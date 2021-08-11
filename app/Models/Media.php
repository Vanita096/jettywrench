<?php

namespace App\Models;

use App\Tenant\Traits\ForSystem;
use Spatie\MediaLibrary\Models\Media as BaseMedia;

class Media extends BaseMedia
{
    use ForSystem;
}
