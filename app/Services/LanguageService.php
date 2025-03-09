<?php

namespace App\Services;

use App\Services\Interfaces\LanguageServiceInterface;
use App\Repositories\Interfaces\LanguageRepositoryInterface as LanguageRepository;
use App\Repositories\Interfaces\RouterRepositoryInterface as RouterRepository;
use App\Models\Language;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Overtrue\Pinyin\Pinyin;



/**
 * Class languageService
 * @package App\Services
 */
class LanguageService implements LanguageServiceInterface{

    protected $languageRepository;
    protected $routerRepository;
    public function __construct(LanguageRepository $languageRepository,RouterRepository $routerRepository){
        $this->languageRepository= $languageRepository;
        $this->routerRepository= $routerRepository;
    }

    public function paginate($request){
        $condition['keyword'] = addslashes($request->input('keyword'));
        $condition['publish'] = ($request->has('publish')) ? $request->integer('publish') : -1  ;
        $perPage =($request->has('perpage')) ? $request->integer(('perpage')) : 20;
        $languages=$this->languageRepository->pagination($this->paginateSelect(),$condition,$perPage,['path'=>'language/index']);
        return $languages;
    }

    private function paginateSelect(){
        return ['id','name','canonical','publish','image','description'];
    }

    public function create($request){
        DB::beginTransaction();
        try{
            $payload = $request->except(['_token','send']);
            $payload['user_id'] = Auth::id();
            $language = $this->languageRepository->create($payload);
            DB::commit();
            return true;
        }catch(\Exception $e ){
            DB::rollBack();
            // Log::error($e->getMessage());
            echo $e->getMessage();die();
            return false;
        }
    }

    public function update($id,$request){
        DB::beginTransaction();
        try{
            $payload = $request->except(['_token','send']);
            $language = $this->languageRepository->update($id,$payload);
            DB::commit();
            return true;
        }catch(\Exception $e ){
            DB::rollBack();
            // Log::error($e->getMessage());
            echo $e->getMessage();die();
            return false;
        }
    }

    public function destroy($id){
        DB::beginTransaction();
        try{
            $language = $this->languageRepository->delete($id);

            DB::commit();
            return true;
        }catch(\Exception $e ){
            DB::rollBack();
            // Log::error($e->getMessage());
            echo $e->getMessage();die();
            return false;
        }
    }

    public function switch($id){
        DB::beginTransaction();
        try{
            $language = $this->languageRepository->update($id, ['current' => 1]);
            $payload = ['current' => 0];
            $where = [
                ['id', '!=', $id],
            ];
            $this->languageRepository->updateByWhere($where, $payload);

            DB::commit();
            return true;
        }catch(\Exception $e ){
            DB::rollBack();
            // Log::error($e->getMessage());
            echo $e->getMessage();die();
            return false;
        }
      
    }

    public function updateStatus($post = []){
        DB::beginTransaction();
        try{
            $id = $post['modelID'];
            $payload[$post['field']] = (($post['value']==1)?0:1);
            $language = $this->languageRepository->update($id,$payload);
            DB::commit();
            return true;
        }catch(\Exception $e ){
            DB::rollBack();
            // Log::error($e->getMessage());
            echo $e->getMessage();die();
            return false;
        }
    }

    public function updateStatusAll($post = []){
        DB::beginTransaction();
        try{
            $payload[$post['field']] = $post['value'];
            $language = $this->languageRepository->updateByWhereIn('id',$post['id'],$payload);
            DB::commit();
            return true;
        }catch(\Exception $e ){
            DB::rollBack();
            // Log::error($e->getMessage());
            echo $e->getMessage();die();
            return false;
        }
    }

    public function saveTranslate($option, $request){
        DB::beginTransaction();
        try{
            $payload = [
                'name' => $request->input('translate_name'),
                'description' => $request->input('translate_description'),
                'content' => $request->input('translate_content'),
                'meta_title' => $request->input('translate_meta_title'),
                'meta_keyword' => $request->input('translate_meta_keyword'),
                'meta_description' => $request->input('translate_meta_description'),
                'canonical' => $request->input('translate_canonical'),
                $this->converModelToField($option['model']) => $option['id'],
                'language_id' => $option['languageID']
            ];

            // dd($payload);

            $repositoryNamespace = '\App\Repositories\\' . ucfirst($option['model']) . 'Repository';
            if (class_exists($repositoryNamespace)) {
                $repositoryInstance = app($repositoryNamespace);
            }
            $model = $repositoryInstance->findById($option['id']);

            $model->languages()->detach([$option['languageID'], $model->id]);   
            $repositoryInstance->createPivot($model, $payload,'languages');

            // dd($repositoryInstance);

            $controllerName = $option['model'].'Controller';
            $this->routerRepository->forceDeleteByCondition(
                [
                    ['module_id', '=', $option['id']],
                    ['controller', '=', 'App\Http\Controllers\Frontend\\'.$controllerName],
                    ['language_id', '=', $option['languageID']]
                ]
            );
            $router = [
                'canonical' => $this->custom_slug($request->input('translate_canonical')),
                'module_id' => $model->id,
                'language_id' => $option['languageID'],
                'controller' => 'App\Http\Controllers\Frontend\\'.$controllerName.'',
            ];

            $this->routerRepository->create($router);
            DB::commit();
            return true;
        }catch(\Exception $e ){
            DB::rollBack();
            // Log::error($e->getMessage());
            echo $e->getMessage();die();
            return false;
        }
    }

    private function converModelToField($model){
        $temp = strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $model));
        return $temp.'_id';
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
