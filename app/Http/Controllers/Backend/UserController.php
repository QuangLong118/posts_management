<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Services\Interfaces\UserServiceInterface as UserService;
use App\Repositories\Interfaces\ProvinceRepositoryInterface as ProvinceRepository;
use App\Repositories\Interfaces\UserRepositoryInterface as UserRepository;
use App\Repositories\Interfaces\UserCatalogueRepositoryInterface as UserCatalogueRepository;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller
{
    protected $userService;
    protected $provinceRepository;
    protected $userRepository;
    protected $userCatalogueRepository;

    public function __construct(UserService $userService, ProvinceRepository $provinceRepository, UserRepository $userRepository,UserCatalogueRepository $userCatalogueRepository) {
        $this->userService = $userService;
        $this->provinceRepository = $provinceRepository;
        $this->userRepository = $userRepository;
        $this->userCatalogueRepository = $userCatalogueRepository;
    }

    public function config(){
        return [
            'js'=> [
                'assets/js/plugins/switchery/switchery.js',
                'assets/library/library.js',
                'assets/library/location.js',
                'assets/plugins/ckfinder_2/ckfinder.js',
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
            'model' => 'User',
        ];
    }

    public function index(Request $request){
        // $this->authorize('modules','user.user.index');
        $userCatalogues = $this->userCatalogueRepository->all();
        $users  = $this->userService->paginate($request);
        $template = 'backend.user.user.index';
        $config = $this->config();
        // $config['seo']=config('app.user');
        return view('backend.dashboard.layout',compact(
            'template',
            'config',
            'users',
            'userCatalogues',
        ));
    }

    public function create(){
        $this->authorize('modules','user.user.store');
        $userCatalogues = $this->userCatalogueRepository->all();
        $provinces = $this->provinceRepository->all();
        $template = 'backend.user.user.store';
        $config =$this->config();
        // $config['seo']=config('app.user');
        $config['method']='create';
        return view('backend.dashboard.layout',compact(
            'template',
            'config',
            'provinces',
            'userCatalogues',
        ));
    }

    public function store(StoreUserRequest $request){
        $this->authorize('modules','user.user.store');
        if($this->userService->create($request)){
            return redirect()->route('user.user.index')->with('success',__('notifications.user.user.store.success'));
        }
        return redirect()->route('user.user.index')->with('error',__('notifications.user.user.store.error'));
    }

    public function edit($id){
        $this->authorize('modules','user.user.update');
        $userCatalogues = $this->userCatalogueRepository->all();
        $user = $this->userRepository->findByID($id);
        $provinces = $this->provinceRepository->all();
        $template = 'backend.user.user.store';
        $config =$this->config();
        // $config['seo']=config('app.user');
        $config['method']='edit';
        return view('backend.dashboard.layout',compact(
            'template',
            'config',
            'provinces',
            'user',
            'userCatalogues',
        ));
    }

    public function update($id, UpdateUserRequest $request){
        $this->authorize('modules','user.user.update');
        if($this->userService->update($id,$request)){
            return redirect()->route('user.user.index')->with('success',__('notifications.user.user.update.success'));
        }
        return redirect()->route('user.user.index')->with('error',__('notifications.user.user.update.error'));
    }

    public function delete($id){
        $this->authorize('modules','user.user.destroy');
        $user = $this->userRepository->findByID($id);
        $template = 'backend.user.user.delete';
        $config =$this->config();
        // $config['seo']=config('app.user');
        return view('backend.dashboard.layout',compact(
            'template',
            'config',
            'user'
        ));
    }
    public function destroy($id){
        $this->authorize('modules','user.user.destroy');
        if($this->userService->destroy($id)){
            return redirect()->route('user.user.index')->with('success',__('notifications.user.user.destroy.success'));
        }
        return redirect()->route('user.user.index')->with('error',__('notifications.user.user.destroy.error'));
    }
}
