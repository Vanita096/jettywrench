<?php

namespace App\Http\Controllers\Tenant\Admin;

use App\Models\Media;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MediaController extends Controller
{
    public function index()
    {
        $media = Media::where('organization_id', request()->tenant()->id)->get();

        return view('tenant.admin.media.index', compact('media'));
    }
}
