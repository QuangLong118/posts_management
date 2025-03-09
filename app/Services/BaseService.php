<?php

namespace App\Services;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Services\Interfaces\BaseServiceInterface;
use App\Repositories\Interfaces\RouterRepositoryInterface as RouterRepository;
use Illuminate\Support\Str;
use Overtrue\Pinyin\Pinyin;

/**
 * Class BaseService
 * @package App\Services
 */
class BaseService implements BaseServiceInterface{
    protected $routerRepository;

    public function __construct(RouterRepository $routerRepository){
        $this->routerRepository = $routerRepository;
    }


    public function formatAlbum($request){
        return ($request->input('album') && !empty($request->input('album'))) ? json_encode($request->input('album')) : '';
    }

    public function nestedset(){
        $this->nestedset->Get('level ASC, order ASC');
        $this->nestedset->Recursive(0, $this->nestedset->Set());
        $this->nestedset->Action();
    }
    
    public function createRouter($request, $model, $controllerName,$languageID){
        $payload = $this->formatRouterPayload( $request,$model, $controllerName, $languageID);
        $this->routerRepository->create($payload);
    }

    public function updateRouter($request, $model, $controllerName,$languageID){
        $payload = $this->formatRouterPayload($request, $model, $controllerName,$languageID);
        $condition = [
            ['module_id','=', $model->id],
            ['controller','=', 'App\Http\Controllers\Frontend\\'.$controllerName],
            ['language_id','=',$languageID],
        ];
        $router = $this->routerRepository->findByCondition($condition);
        
        $res = $this->routerRepository->update($router->id, $payload);
        // dd($res);
        return $res;
    }

    private function formatRouterPayload($request, $model, $controllerName,$languageID){
        $payload = [
            'canonical' => $this->custom_slug($request->input('canonical')),
            'module_id' => $model->id,
            'language_id' => $languageID,
            'controller' => 'App\Http\Controllers\Frontend\\'.$controllerName.'',
        ];
        return $payload;
    }

    private function custom_slug($string) {
        $pinyin = new Pinyin();
    
        // Kiểm tra xem chuỗi có chứa ký tự Trung hay không
        if (preg_match('/\p{Han}/u', $string)) {
            $string = $pinyin->permalink($string); // Chuyển tiếng Trung sang Pinyin
        }
    
        return Str::slug($string);
    }
}   
