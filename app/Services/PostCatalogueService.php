<?php

namespace App\Services;

use App\Services\Interfaces\PostCatalogueServiceInterface;
use App\Repositories\Interfaces\PostCatalogueRepositoryInterface as PostCatalogueRepository;
use App\Repositories\Interfaces\RouterRepositoryInterface as RouterRepository;
use App\Services\BaseService;
use App\Models\PostCatalogue    ;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use App\Classes\Nestedsetbie;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Overtrue\Pinyin\Pinyin;

/**
 * Class postService
 * @package App\Services
 */
class PostCatalogueService extends BaseService implements PostCatalogueServiceInterface{

    protected $postCatalogueRepository ;
    protected $routerRepository;
    protected $nestedset;
    protected $language;
    protected $controllerName;

    public function __construct(PostCatalogueRepository $postCatalogueRepository, RouterRepository $routerRepository){
        $this->routerRepository = $routerRepository;
        $this->postCatalogueRepository= $postCatalogueRepository;
        $this->controllerName='PostCatalogueController';
    }

    public function paginate($request,$languageID){
        $condition = [
            'keyword' => addslashes($request->input('keyword')),
            'publish' => ($request->has('publish')) ? $request->integer('publish') : -1 ,
            'where' => [
                ['tb2.language_id','=',$languageID],
            ]
        ];
        $perPage =($request->has('perpage')) ? $request->integer(('perpage')) : 20;
        $join = [
            ['post_catalogue_language as tb2','tb2.post_catalogue_id','=','post_catalogues.id']
        ];
        $postCatalogues=$this->postCatalogueRepository->pagination($this->paginateSelect(),$condition,$perPage,['path'=>'post/catalogue/index'],['post_catalogues.lft','ASC'],$join);
        return $postCatalogues;
    }

    public function create($request,$languageID){
        DB::beginTransaction();
        try{
            $postCatalogue = $this->createCatalogue($request);
            
            if($postCatalogue->id>0){
                $res = $this->updateLanguageForCatalogue($request,$postCatalogue,$languageID);
                // dd($languageID);
                $this->createRouter($request, $postCatalogue, $this->controllerName, $languageID);
                $this->nestedset = new Nestedsetbie([
                    'table' => 'post_catalogues',
                    'foreignkey' => 'post_catalogue_id',
                    'language_id' =>  $languageID,
                ]);
                $this->nestedset();
            }
            DB::commit();
            return true;
        }catch(\Exception $e ){
            DB::rollBack();
            // Log::error($e->getMessage());
            echo $e->getMessage();die();
            return false;
        }
    }

    public function update($id,$request,$languageID){
        DB::beginTransaction();
        try{
            $postCatalogue = $this->postCatalogueRepository->findById($id);
            
            $flag = $this->updateCatalogue($request,$postCatalogue);
            
            if($flag == TRUE){
                $this->updateLanguageForCatalogue($request,$postCatalogue,$languageID); 
                
                $this->updateRouter($request,$postCatalogue,$this->controllerName,$languageID);
                // dd(1);
                $this->nestedset = new Nestedsetbie([
                    'table' => 'post_catalogues',
                    'foreignkey' => 'post_catalogue_id',
                    'language_id' =>  $languageID,
                ]);
                $this->nestedset();
            }
            DB::commit();
            return true;
        }catch(\Exception $e ){
            DB::rollBack();
            // Log::error($e->getMessage());
            echo $e->getMessage();die();
            return false;
        }
    }

    public function destroy($id,$languageID){
        DB::beginTransaction();
        try{
            $post = $this->postCatalogueRepository->delete($id);
            $this->nestedset = new Nestedsetbie([
                'table' => 'post_catalogues',
                'foreignkey' => 'post_catalogue_id',
                'language_id' =>  $languageID,
            ]);
            $this->nestedset();
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
            $post = $this->postCatalogueRepository->update($id,$payload);
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
            $post = $this->postCatalogueRepository->updateByWhereIn('id',$post['id'],$payload);
            DB::commit();
            return true;
        }catch(\Exception $e ){
            DB::rollBack();
            // Log::error($e->getMessage());
            echo $e->getMessage();die();
            return false;
        }
    }

    private function createCatalogue($request){
        $payload = $request->only($this->payload());
        $payload['user_id'] = Auth::id();
        $payload['album'] = $payload['album'] = $this->formatAlbum($request);
        return $this->postCatalogueRepository->create($payload);
    }

    private function updateCatalogue($request,$postCatalogue){
        $payload = $request->only($this->payload());
        $payload['album'] = $this->formatAlbum($request);
        return $this->postCatalogueRepository->update($postCatalogue->id,$payload);
    }

    private function updateLanguageForCatalogue($request, $postCatalogue,$languageID){
        $payload = $request->only($this->payloadLanguage());
        $payload = $this->formatLanguage($payload,$postCatalogue,$languageID);
        $postCatalogue->languages()->detach([$languageID,$postCatalogue->id]);
        return $this->postCatalogueRepository->createPivot($postCatalogue,$payload,'languages');
    }



    private function formatLanguage($payload, $postCatalogue,$languageID){
        $payload['language_id'] = $languageID;
        $payload['post_catalogue_id'] = $postCatalogue->id;
        $payload['canonical'] = $this->custom_slug($payload['canonical']);
        return $payload;
    }

    private function payload(){
        return ['parent_id','follow','publish','image','album'];
    }

    private function payloadLanguage(){
        return ['name','description','content','meta_title','meta_keyword','meta_description','canonical'];
    }

    private function paginateSelect(){
        return [
            'post_catalogues.id', 
            'post_catalogues.publish',
            'post_catalogues.image',
            'post_catalogues.level',
            'post_catalogues.order',
            'tb2.name', 
            'tb2.canonical',
        ];
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
