<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Services\Interfaces\PostServiceInterface as PostService;
use App\Repositories\Interfaces\PostRepositoryInterface as PostRepository;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Requests\DeletePostRequest;
use App\Models\Language;

use App\Classes\Nestedsetbie;

class PostController extends Controller
{
    protected $postService;
    protected $postRepository;
    protected $nestedset;

    public function __construct(PostService $postService, PostRepository $postRepository) {
        $this->postService = $postService;
        $this->postRepository = $postRepository;
        $this->middleware(function($request,$next){
            $locale = app()->getLocale();
            $language = Language::where('canonical',$locale)->first();
            $this->language = $language->id;
            $this->initialize();
            return $next($request);
        });
    }

    private function initialize(){
        $this->nestedset = new Nestedsetbie([
            'table' => 'post_catalogues',
            'foreignkey' => 'post_catalogue_id',
            'language_id' =>  $this->language,
        ]);
    }

    public function config(){
        return [
            'js'=> [
                'assets/js/plugins/switchery/switchery.js',
                'assets/library/library.js',
                'assets/library/location.js',
                'assets/library/seo.js',
                'assets/plugins/ckfinder_2/ckfinder.js',
                'assets/plugins/ckeditor/ckeditor.js',
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
            'model'=>'Post',
        ];
    }

    public function index(Request $request){
        $this->authorize('modules','post.post.index');
        $posts  = $this->postService->paginate($request,$this->language);
        $template = 'backend.post.post.index';
        $config = $this->config();
        // $config['seo']=config('app.post');
        $dropdown = $this->nestedset->Dropdown();
        $currentLanguage = $this->language;
        return view('backend.dashboard.layout',compact(
            'template',
            'config',
            'posts',
            'dropdown',
            'currentLanguage',
        ));
    }

    public function create(){
        $this->authorize('modules','post.post.store');
        $template = 'backend.post.post.store';
        $config =$this->config();
        // $config['seo']=config('app.post');
        $config['method']='create';
        $dropdown = $this->nestedset->Dropdown();
        return view('backend.dashboard.layout',compact(
            'template',
            'config',
            'dropdown',
        ));
    }

    public function store(StorePostRequest $request){
        $this->authorize('modules','post.post.store');
        if($this->postService->create($request,$this->language)){
            return redirect()->route('post.post.index')->with('success',__('notifications.post.post.store.success'));
        }
        return redirect()->route('post.post.index')->with('error',__('notifications.post.post.storer.error'));
    }

    public function edit($id){
        $this->authorize('modules','post.post.update');
        $post = $this->postRepository->getPostById($id,$this->language);
        $template = 'backend.post.post.store';
        $config =$this->config();
        // $config['seo']=config('app.post');
        $config['method']='edit';
        $album = json_decode($post->album);
        $dropdown = $this->nestedset->Dropdown();
        $model = $post;
        return view('backend.dashboard.layout',compact( 
            'template',
            'config',
            'post',
            'dropdown',
            'album',
            'model',
        ));
    }

    public function update($id, UpdatePostRequest $request){
        $this->authorize('modules','post.post.update');
        if($this->postService->update($id,$request,$this->language)){
            return redirect()->route('post.post.index')->with('success',__('notifications.post.post.update.success'));
        }
        return redirect()->route('post.post.index')->with('error',__('notifications.post.post.update.error'));
    }

    public function delete($id){
        $this->authorize('modules','post.post.destroy');
        $post = $this->postRepository->getPostById($id,$this->language);
        $template = 'backend.post.post.delete';
        $config =$this->config();
        // $config['seo']=config('app.post');
        return view('backend.dashboard.layout',compact(
            'template',
            'config',
            'post'
        ));
    }
    public function destroy($id){
        $this->authorize('modules','post.post.destroy');
        if($this->postService->destroy($id)){
            return redirect()->route('post.post.index')->with('success',__('notifications.post.post.destroy.success'));
        }
        return redirect()->route('post.post.index')->with('error',__('notifications.post.post.destroy.error'));
    }
}
