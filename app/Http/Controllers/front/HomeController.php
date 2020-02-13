<?php

namespace App\Http\Controllers\front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\PostsRepository;
use App\Models\PostCategory;
use App\Models\Posts;
use View;

class HomeController extends Controller
{
    /** @var  PostsRepository */
    private $postsRepository;
    private $data;
    private $postsMod;

    public function __construct(PostsRepository $postsRepo,Posts $postsModel)
    {
        $this->postsRepository = $postsRepo;
        $this->data['module']='post';
        $this->data['status']=[0=>'Disable',1=>'Active'];
        $this->postsMod = $postsModel;
        
        $popArticles=$this->postsMod->popArticle();

        View::share('popArticles',$popArticles);
    }
    /**
     * Display a listing of the Comments.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $this->data['posts']=$this->postsRepository->all();
       
        return view('front.posts',$this->data);
    }
            /**
     * Show the form for editing the specified Posts.
     *
     * @param int $id
     *
     * @return Response
     */
    public function article($id)
    {
        $post = $this->postsRepository->find($id);

        if (empty($post)) {
            Flash::error('Post not found');
            return redirect()->back();
        }
        
        $post->load('user');
        $post->load('comments.user');

        return view('front.single-article')->with('post', $post);
    }
    public function getArticleByCategory($slug){
        $this->data['posts']=$this->postsRepository->getArticleByCategory($slug);
       
        return view('front.posts',$this->data);
    }
    public function getArticleByDate($slug){
        $this->data['posts']=$this->postsRepository->getArticleByDate($slug);
       
        return view('front.posts',$this->data);
    }
}
