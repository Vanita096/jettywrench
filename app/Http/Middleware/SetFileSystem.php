<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Filesystem\Factory;

class SetFileSystem
{
    protected $filesystem;

    public function __construct(Factory $filesystem)
    {
        $this->filesystem = $filesystem;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if(!auth()->check()){
            return $next($request);
        }


        $this->filesystem->set('user', $this->createDriver($this->getFileSystemConfig()));

        return $next($request);
    }

    protected function getFileSystemConfig()
    {
        $config = config('filesystems.disks.' . config('filesystems.default'));

        $config['root'] = storage_path('app/users'). '/' . auth()->id();

        return $config;

    }

    protected function createDriver($config)
    {
        $method = $this->getCreationMethod();

        return $this->filesystem->{$method}($config);

    }

    protected function getCreationMethod()
    {
        return "create" . ucfirst(config('filesystems.default')) . "Driver";
    }
}
