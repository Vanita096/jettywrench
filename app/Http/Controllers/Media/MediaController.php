<?php

namespace App\Http\Controllers\Media;

use App\Models\Media;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MediaController extends Controller
{
    public function show(Request $request)
    {
        $media = Media::where('id', $request->media)->where('file_name', $request->file_name)->firstOrFail();

        $conversion = '';

        if(isset($request->conversion)) {
          $conversion = $request->conversion;
        }

        if (!$media->getCustomProperty('isPublic', false) && !auth()->check()) {
            return abort(403);
        }

        return response()->download($media->getPath($conversion), null, [], null);
    }
}
