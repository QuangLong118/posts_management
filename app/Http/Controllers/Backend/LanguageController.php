<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Language;
use App\Services\Interfaces\LanguageServiceInterface as LanguageService;
use App\Repositories\Interfaces\LanguageRepositoryInterface as LanguageRepository;
use App\Http\Requests\StoreLanguageRequest;
use App\Http\Requests\UpdateLanguageRequest;
use App\Http\Requests\TranslateRequest;

class LanguageController extends Controller
{
    protected $languageService;
    protected $languageRepository;

    public function __construct(LanguageService $languageService, LanguageRepository $languageRepository) {
        $this->languageService = $languageService;
        $this->languageRepository = $languageRepository;
    }

    public function config(){
        return [
            'js'=> [
                'assets/js/plugins/switchery/switchery.js',
                'assets/library/library.js',
                'assets/library/location.js',
                'assets/library/finder.js',
                'assets/library/seo.js',
                'assets/plugins/ckfinder_2/ckfinder.js',
                'assets/plugins/ckeditor/ckeditor.js',
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
            'model'=>'Language',
        ];
    }

    public function index(Request $request){
        $this->authorize('modules','language.index');
        $languages  = $this->languageService->paginate($request);
        $template = 'backend.language.index';
        $config = $this->config();
        // $config['seo']=config('app.language');
        return view('backend.dashboard.layout',compact(
            'template',
            'config',
            'languages'
        ));
    }

    public function create(){
        $this->authorize('modules','language.store');
        $template = 'backend.language.store';
        $config =$this->config();
        // $config['seo']=config('app.language');
        $config['method']='create';
        return view('backend.dashboard.layout',compact(
            'template',
            'config',
        ));
    }

    public function store(StorelanguageRequest $request){
        $this->authorize('modules','language.store');
        if($this->languageService->create($request)){
            return redirect()->route('language.index')->with('success',__('notifications.language.store.success'));
        }
        return redirect()->route('language.index')->with('error',__('notifications.language.store.error'));
    }

    public function edit($id){
        $this->authorize('modules','language.update');
        $language = $this->languageRepository->findByID($id);
        $template = 'backend.language.store';
        $config =$this->config();
        // $config['seo']=config('app.language');
        $config['method']='edit';
        return view('backend.dashboard.layout',compact(
            'template',
            'config',
            'language'
        ));
    }

    public function update($id, UpdateLanguageRequest $request){
        $this->authorize('modules','language.update');
        if($this->languageService->update($id,$request)){
            return redirect()->route('language.index')->with('success',__('notifications.language.update.success'));
        }
        return redirect()->route('language.index')->with('error',__('notifications.language.update.error'));
    }

    public function swicthBackendLanguage($id){
        $language = $this->languageRepository->findById($id);
        if($this->languageService->switch($id)){
            session(['app_locale' => $language->canonical]);
            \App::setLocale($language->canonical);
        }
        return redirect()->back();
    }

    public function delete($id){
        $this->authorize('modules','language.destroy');
        $language = $this->languageRepository->findByID($id);
        $template = 'backend.language.delete';
        $config =$this->config();
        // $config['seo']=config('app.language');
        return view('backend.dashboard.layout',compact(
            'template',
            'config',
            'language'
        ));
    }

    public function destroy($id){
        $this->authorize('modules','language.destroy');
        if($this->languageService->destroy($id)){
            return redirect()->route('language.index')->with('success',__('notifications.language.destroy.success'));
        }
        return redirect()->route('language.index')->with('error',__('notifications.language.destroy.error'));
    }

    public function translate($id=0, $languageID = 0, $model=''){
        $this->authorize('modules','language.translate');
        $repositoryInstance = $this->respositoryInstance($model);
        $languageInstance = $this->respositoryInstance('Language');
        $currentLanguage = $languageInstance->findByCondition([
            ['canonical' , '=', session('app_locale')]
        ]);

        $method = 'get'.$model.'ById';

        $object = $repositoryInstance->{$method}($id, $currentLanguage->id);
        $objectTransate = $repositoryInstance->{$method}($id, $languageID);

        $option = [
            'id' => $id,
            'languageID' => $languageID,
            'model' => $model,
        ];

        $template = 'backend.language.translate';
        $config =$this->config();
        // $language = $this->languageRepository->findByID($id);
        return view('backend.dashboard.layout',compact(
            'template',
            'config',
            'object',
            'objectTransate',
            'option',
        ));
    }

    public function storeTranslate(TranslateRequest $request){
        $option = $request->input('option');
        if($this->languageService->saveTranslate($option, $request)){
            return redirect()->back()->with('success', 'Cập nhật bản ghi thành công');
        }
        return redirect()->back()->with('error','Có vấn đề xảy ra, Hãy Thử lại');
    }

    private function respositoryInstance($model){
        $repositoryNamespace = '\App\Repositories\\' . ucfirst($model) . 'Repository';
        if (class_exists($repositoryNamespace)) {
            $repositoryInstance = app($repositoryNamespace);
        }
        return $repositoryInstance ?? null;
    }
}
