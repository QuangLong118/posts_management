<?php

namespace App\Services;

use App\Services\Interfaces\PostServiceInterface;
use App\Repositories\Interfaces\PostRepositoryInterface as PostRepository;
use App\Repositories\Interfaces\RouterRepositoryInterface as RouterRepository;
use App\Services\BaseService;
use App\Models\Post;
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
class PostService extends BaseService implements PostServiceInterface{

    protected $postRepository ;
    protected $controllerName;
    protected $routerRepository;

    public function __construct(PostRepository $postRepository, RouterRepository $routerRepository){
        $this->postRepository= $postRepository;
        $this->controllerName = 'PostController';
        $this->routerRepository = $routerRepository;
    }

    public function paginate($request,$languageID){
        $condition['keyword'] = addslashes($request->input('keyword'));
        $condition['publish'] = ($request->has('publish')) ? $request->integer('publish') : -1 ;
        $condition['post_catalogue_id'] = $request->input('post_catalogue_id');
        $condition['where'] = [
            ['tb2.language_id','=',$languageID],
        ];
        $perPage =($request->has('perpage')) ? $request->integer(('perpage')) : 20;
        
        $posts=$this->postRepository->pagination(
            $this->paginateSelect(),
            $condition,
            $perPage,
            [
                'path'=>'post/post/index',
                'groupBy' => $this->paginateSelect(),
            ],
            ['posts.id','DESC'],
            [
                ['post_language as tb2','tb2.post_id','=','posts.id'],
                ['post_catalogue_post as tb3','posts.id','=','tb3.post_id'],
            ],
            ['post_catalogues'],
            $this->whereRaw($request,$languageID),
        );
        return $posts;
    }

    public function create($request,$languageID){
        DB::beginTransaction();
        try{
            $post = $this->createPost($request);
            if($post->id>0){
                $this->updateLanguageForPost($post,$request,$languageID);
                $this->updateCatalogueForPost($post,$request);
                $this->createRouter($request,$post,$this->controllerName,$languageID);
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
            $post = $this->postRepository->findById($id);
            if($this->updatePost($post,$request)){
                $this->updateLanguageForPost($post,$request,$languageID);
                $this->updateCatalogueForPost($post,$request);
                // dd(1);
                $this->updateRouter($request,$post,$this->controllerName,$languageID);
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

    public function destroy($id){
        DB::beginTransaction();
        try{
            $post = $this->postRepository->delete($id);
            DB::commit();
            return true;
        }catch(\Exception $e ){
            DB::rollBack();
            // Log::error($e->getMessage());
            // echo $e->getMessage();die();
            return false;
        }
    }

    public function updateStatus($post = []){
        DB::beginTransaction();
        try{
            $id = $post['modelID'];
            $payload[$post['field']] = (($post['value']==1)?0:1);
            $post = $this->postRepository->update($id,$payload);
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
            $post = $this->postRepository->updateByWhereIn('id',$post['id'],$payload);
            DB::commit();
            return true;
        }catch(\Exception $e ){
            DB::rollBack();
            // Log::error($e->getMessage());
            echo $e->getMessage();die();
            return false;
        }
    }

    private function createPost($request){
        $payload = $request->only($this->payload());
        $payload['album'] = $this->formatAlbum($request);
        $payload['user_id'] = Auth::id();
        $post = $this->postRepository->create($payload);
        return $post;
    }

    private function updatePost($post, $request){
        $payload = $request->only($this->payload());
        $payload['album'] = $this->formatAlbum($request);
        return $this->postRepository->update($post->id,$payload);
    }

    private function updateLanguageForPost($post, $request,$languageID){
        $payload = $request->only($this->payloadLanguage());
        $payload = $this->formatLanguage($payload,$post->id,$languageID);
        $post->languages()->detach([$languageID,$post->id]);
        return $this->postRepository->createPivot($post,$payload,'languages');  
    }

    private function formatLanguage($payload, $postId,$languageID){
        $payload['canonical'] = $this->custom_slug($payload['canonical']);
        $payload['language_id'] = $languageID;
        $payload['post_id'] = $postId;
        return $payload;
    }

    private function updateCatalogueForPost($post,$request){
        $post->post_catalogues()->sync($this->catalogue($request));
    }

    private function catalogue($request){
        if($request->input('catalogue')!=null){
            return array_unique(array_merge($request->input('catalogue'),[$request->input('post_catalogue_id')]));
        }
        return [$request->input('post_catalogue_id')];
    }

    private function whereRaw($request,$languageID){
        $rawCondition = [];
        if($request->integer('post_catalogue_id') > 0){
            $rawCondition['whereRaw'] =  [
                [
                    'tb3.post_catalogue_id IN (
                        SELECT id
                        FROM post_catalogues
                        JOIN post_catalogue_language ON post_catalogues.id = post_catalogue_language.post_catalogue_id
                        WHERE lft >= (SELECT lft FROM post_catalogues as pc WHERE pc.id = ?)
                        AND rgt <= (SELECT rgt FROM post_catalogues as pc WHERE pc.id = ?)
                        AND post_catalogue_language.language_id = '.$languageID.'
                    )',
                    [$request->integer('post_catalogue_id'), $request->integer('post_catalogue_id')]
                ]
            ];
            
        }
        return $rawCondition;
    }

    private function paginateSelect(){
        return [
            'posts.id', 
            'posts.publish',
            'posts.image',
            'posts.order',
            'tb2.name', 
            'tb2.canonical',
        ];
    }

    private function payload(){
        return [
            'follow',
            'publish',
            'image',
            'album',
            'post_catalogue_id',
        ];
    }

    private function payloadLanguage(){
        return [
            'name',
            'description',
            'content',
            'meta_title',
            'meta_keyword',
            'meta_description',
            'canonical'
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
