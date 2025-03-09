<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Services\Interfaces\UserCatalogueServiceInterface as UserCatalogueService;
use App\Repositories\Interfaces\UserCatalogueRepositoryInterface as UserCatalogueRepository;
use App\Repositories\Interfaces\PermissionRepositoryInterface as PermissionRepository;
use App\Http\Requests\StoreUserCatalogueRequest;

class UserCatalogueController extends Controller
{
    protected $userCatalogueService;
    protected $userCatalogueRepository;

    public function __construct(UserCatalogueService $userCatalogueService, UserCatalogueRepository $userCatalogueRepository, PermissionRepository $permissionRepository,) {
        $this->userCatalogueService = $userCatalogueService;
        $this->userCatalogueRepository = $userCatalogueRepository;
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
            'model'=>'UserCatalogue',
        ];
    }

    public function index(Request $request){
        $this->authorize('modules','user.catalogue.index');
        $userCatalogues  = $this->userCatalogueService->paginate($request);
        $template = 'backend.user.catalogue.index';
        $config = $this->config();
        // $config['seo']=config('app.userCatalogue');
        return view('backend.dashboard.layout',compact(
            'template',
            'config',
            'userCatalogues'
        ));
    }

    public function create(){
        $this->authorize('modules','user.catalogue.store');
        $template = 'backend.user.catalogue.store';
        $config =$this->config();
        // $config['seo']=config('app.userCatalogue');
        $config['method']='create';
        return view('backend.dashboard.layout',compact(
            'template',
            'config',
        ));
    }

    public function store(StoreUserCatalogueRequest $request){
        $this->authorize('modules','user.catalogue.store');
        if($this->userCatalogueService->create($request)){
            return redirect()->route('user.catalogue.index')->with('success',__('notifications.user.catalogue.create.success'));
        }
        return redirect()->route('user.catalogue.index')->with('error',__('notifications.user.catalogue.create.error'));
    }

    public function edit($id){
        $this->authorize('modules','user.catalogue.update');
        $userCatalogue = $this->userCatalogueRepository->findByID($id);
        $template = 'backend.user.catalogue.store';
        $config =$this->config();
        // $config['seo']=config('app.userCatalogue');
        $config['method']='edit';
        return view('backend.dashboard.layout',compact(
            'template',
            'config',
            'userCatalogue'
        ));
    }

    public function update($id, StoreUserCatalogueRequest $request){
        $this->authorize('modules','user.catalogue.update');
        if($this->userCatalogueService->update($id,$request)){
            return redirect()->route('user.catalogue.index')->with('success',__('notifications.user.catalogue.update.success'));
        }
        return redirect()->route('user.catalogue.index')->with('error',__('notifications.user.catalogue.update.error'));
    }

    public function delete($id){
        $this->authorize('modules','user.catalogue.destroy');
        $userCatalogue = $this->userCatalogueRepository->findByID($id);
        $template = 'backend.user.catalogue.delete';
        $config =$this->config();
        // $config['seo']=config('app.userCatalogue');
        return view('backend.dashboard.layout',compact(
            'template',
            'config',
            'userCatalogue'
        ));
    }
    public function destroy($id){
        $this->authorize('modules','user.catalogue.destroy');
        if($this->userCatalogueService->destroy($id)){
            return redirect()->route('user.catalogue.index')->with('success',__('notifications.user.catalogue.destroy.success'));
        }
        return redirect()->route('user.catalogue.index')->with('error',__('notifications.user.catalogue.destroy.error'));
    }

    public function permission(){
        $this->authorize('modules','user.catalogue.updatePermission');
        $userCatalogues = $this->userCatalogueRepository->all(['permissions']);
        $permissions = $this->permissionRepository->all();
        $config =$this->config();
        $template = 'backend.user.catalogue.permission';
        return view('backend.dashboard.layout',compact(
            'template',
            'config',
            'userCatalogues',
            'permissions',
        ));
    }

    public function updatePermission(Request $request){
        $this->authorize('modules','user.catalogue.updatePermission');
        if($this->userCatalogueService->setPermission($request)){
            return redirect()->route('user.catalogue.index')->with(__('notifications.user.catalogue.updatePermission.success'));
        }
        return redirect()->route('user.catalogue.index')->with('error',__('notifications.user.catalogue.updatePermission.error'));
    }
}
