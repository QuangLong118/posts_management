<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Services\Interfaces\PermissionServiceInterface as PermissionService;
use App\Repositories\Interfaces\PermissionRepositoryInterface as PermissionRepository;
use App\Http\Requests\StorePermissionRequest;
use App\Http\Requests\UpdatePermissionRequest;

class PermissionController extends Controller
{
    protected $permissionService;
    protected $permissionRepository;

    public function __construct(PermissionService $permissionService, PermissionRepository $permissionRepository) {
        $this->permissionService = $permissionService;
        $this->permissionRepository = $permissionRepository;
    }

    public function config(){
        return [
            'js'=> [
                'assets/js/plugins/switchery/switchery.js',
                'assets/library/library.js',
                'assets/library/location.js',
                'assets/plugins/ckfinder/ckfinder.js',
                'assets/library/finder.js',
            ],
            'css' => [
                'assets/css/plugins/switchery/switchery.css',
            ],
            'cdn_css'=>[
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css',
            ],
            'cdn_js' => [
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js',
            ],
            'model'=>'Permission',
        ];
    }

    public function index(Request $request){
        $this->authorize('modules','user.permission.index');
        $permissions  = $this->permissionService->paginate($request);
        $template = 'backend.user.permission.index';
        $config = $this->config();
        // $config['seo']=config('app.permission');
        return view('backend.dashboard.layout',compact(
            'template',
            'config',
            'permissions'
        ));
    }

    public function create(){
        $this->authorize('modules','user.permission.store');
        $template = 'backend.user.permission.store';
        $config =$this->config();
        // $config['seo']=config('app.permission');
        $config['method']='create';
        return view('backend.dashboard.layout',compact(
            'template',
            'config',
        ));
    }

    public function store(StorepermissionRequest $request){
        $this->authorize('modules','user.permission.store');
        if($this->permissionService->create($request)){
            return redirect()->route('user.permission.index')->with('success',__('notifications.user.permission.store.success'));
        }
        return redirect()->route('user.permission.index')->with('error',__('notifications.user.permission.store.error'));
    }

    public function edit($id){
        $this->authorize('modules','user.permission.update');
        $permission = $this->permissionRepository->findByID($id);
        $template = 'backend.user.permission.store';
        $config =$this->config();
        // $config['seo']=config('app.permission');
        $config['method']='edit';
        return view('backend.dashboard.layout',compact(
            'template',
            'config',
            'permission'
        ));
    }

    public function update($id, UpdatePermissionRequest $request){
        $this->authorize('modules','user.permission.update');
        if($this->permissionService->update($id,$request)){
            return redirect()->route('user.permission.index')->with('success',__('notifications.user.permission.update.success'));
        }
        return redirect()->route('user.permission.index')->with('error',__('notifications.user.permission.update.error'));
    }

    public function delete($id){
        $this->authorize('modules','user.permission.destroy');
        $permission = $this->permissionRepository->findByID($id);
        $template = 'backend.user.permission.delete';
        $config =$this->config();
        // $config['seo']=config('app.permission');
        return view('backend.dashboard.layout',compact(
            'template',
            'config',
            'permission'
        ));
    }
    public function destroy($id){
        $this->authorize('modules','user.permission.destroy');
        if($this->permissionService->destroy($id)){
            return redirect()->route('user.permission.index')->with('success',__('notifications.user.permission.destroy.success'));
        }
        return redirect()->route('user.permission.index')->with('error',__('notifications.user.permission.destroy.error'));
    }
}
