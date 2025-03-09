<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PostCatalogue;
use App\Services\Interfaces\PostCatalogueServiceInterface as PostCatalogueService;
use App\Repositories\Interfaces\PostCatalogueRepositoryInterface as PostCatalogueRepository;
use App\Http\Requests\StorePostCatalogueRequest;
use App\Http\Requests\UpdatePostCatalogueRequest;
use App\Http\Requests\DeletePostCatalogueRequest;
use App\Models\Language;

use App\Classes\Nestedsetbie;

class PostCatalogueController extends Controller
{
    protected $postCatalogueService;
    protected $postCatalogueRepository;
    protected $nestedset;

    public function __construct(PostCatalogueService $postCatalogueService, PostCatalogueRepository $postCatalogueRepository) {
        $this->middleware(function($request,$next){
            $locale = app()->getLocale();
            $language = Language::where('canonical',$locale)->first();
            $this->language = $language->id;
            $this->initialize();
            return $next($request);
        });
        $this->postCatalogueService = $postCatalogueService;
        $this->postCatalogueRepository = $postCatalogueRepository;
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
            'model'=>'PostCatalogue',
        ];
    }

    public function index(Request $request){
        $this->authorize('modules','post.catalogue.index');
        $postCatalogues  = $this->postCatalogueService->paginate($request,$this->language);
        $template = 'backend.post.catalogue.index';
        $config = $this->config();
        // $config['seo']=config('app.postCatalogue');
        return view('backend.dashboard.layout',compact(
            'template',
            'config',
            'postCatalogues'
        ));
    }

    public function create(){
        $this->authorize('modules','post.catalogue.store');
        $template = 'backend.post.catalogue.store';
        $config =$this->config();
        // $config['seo']=config('app.postCatalogue');
        $config['method']='create';
        $dropdown = $this->nestedset->Dropdown();
        return view('backend.dashboard.layout',compact(
            'template',
            'config',
            'dropdown',
        ));
    }

    public function store(StorepostCatalogueRequest $request){
        $this->authorize('modules','post.catalogue.store');
        if($this->postCatalogueService->create($request,$this->language)){
            return redirect()->route('post.catalogue.index')->with('success',__('notifications.post.catalogue.create.success'));
        }
        return redirect()->route('post.catalogue.index')->with('error',__('notifications.post.catalogue.create.error'));
    }

    public function edit($id){
        $this->authorize('modules','post.catalogue.update');
        $postCatalogue = $this->postCatalogueRepository->getPostCatalogueById($id,$this->language);
        $template = 'backend.post.catalogue.store';
        $config =$this->config();
        // $config['seo']=config('app.postCatalogue');
        $config['method']='edit';
        $album = json_decode($postCatalogue->album);
        $dropdown = $this->nestedset->Dropdown($postCatalogue->lft,$postCatalogue->rgt);
        $model = $postCatalogue;
        return view('backend.dashboard.layout',compact(
            'template',
            'config',
            'postCatalogue',
            'dropdown',
            'album',
            'model',
        ));
    }

    public function update($id, UpdatepostCatalogueRequest $request){
        $this->authorize('modules','post.catalogue.update');
        if($this->postCatalogueService->update($id,$request,$this->language)){
            return redirect()->route('post.catalogue.index')->with('success',__('notifications.post.catalogue.update.success'));
        }
        return redirect()->route('post.catalogue.index')->with('error',__('notifications.post.catalogue.update.error'));
    }

    public function delete($id){
        $this->authorize('modules','post.catalogue.destroy');
        $postCatalogue = $this->postCatalogueRepository->getPostCatalogueById($id,$this->language);
        $template = 'backend.post.catalogue.delete';
        $config =$this->config();
        // $config['seo']=config('app.postCatalogue');
        return view('backend.dashboard.layout',compact(
            'template',
            'config',
            'postCatalogue'
        ));
    }

    public function destroy($id, DeletePostCatalogueRequest $request){
        $this->authorize('modules','post.catalogue.destroy');
        if($this->postCatalogueService->destroy($id,$this->language)){
            return redirect()->route('post.catalogue.index')->with('success',__('notifications.post.catalogue.destroy.success'));
        }
        return redirect()->route('post.catalogue.index')->with('error',__('notifications.post.catalogue.destroy.error'));
    }
}
