<?php

namespace App\Http\Controllers\front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\PostsRepository;
use App\Http\Requests\CreateContactMeRequest;
use App\Models\PostCategory;
use App\Models\Comments;
use App\Models\Posts;
use App\Models\Users;
use App\Models\ContactMe;
use App\Models\NewsLetter;
use Validator;
use View;
use Auth;
use Hash;

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
    public function article($slug)
    {
        $post = $this->postsRepository->getArticleBySlug($slug);
        
        if (empty($post)) {
            Flash::error('Post not found');
            return redirect()->back();
        }
        
        $post->load('tags.tag');
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
    public function getPostsByTags($slug){
        
        $this->data['posts']=$this->postsRepository->getPostsByTags($slug);
        return view('front.posts',$this->data);
    }
    public function postComment(Request $request){
        
        if(Auth::check()){

            $userId=auth()->user()->id;
            $postId=$request->post;
            $comment=$request->comment;
            $data=['post_id'=>$postId,'user_id'=>$userId,'message'=>$comment];
          
            $saveComments=Comments::create($data);
            if($saveComments){
                return redirect()->back()->with('success','Comment posted successfully.');
            }
            return redirect()->back()->with('error','Some thing went wrong.');
        }
        return redirect()->back()->with('error','Please Login first.');
    }
    
    public function search(Request $request){
        
        if($request->has('search')){
          
          $posts = Posts::search($request->input('search'))->get();
        }
        return view('front.search', compact('posts'));
    }
    
    public function subscribe(Request $request){

        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:newsletter_subscriptions'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
            
        }

        if($request->has('email')){
     
          $email = NewsLetter::create(['email'=>$request->email]);

          if($email){
             return redirect()->route('.articles')->with('success','Email Save Successfully');
          }
           return redirect()->back()->with('error','Email already Saved.');
        }
        
        return redirect()->route('.articles')->with('success','Email Save Successfully');
    }
    public function signin(){
         return view('front.login');
    }
    public function signup(){
         return view('front.signup');
    }
    public function register(Request $request){
        
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            're_password' => 'required_with:password|same:password'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
            
        }

        $inputs=$request->all();
        unset($inputs['_token']);
        unset($inputs['re_password']);
        $inputs['password']=Hash::make($inputs['password']);
        $saveUser=Users::create($inputs);

        if($saveUser){
            $credentials = $request->only('email', 'password');
            if (Auth::attempt($credentials)) {
                return redirect()->route('.articles')->with('success','Register successfully.');
            }
        }
        return redirect()->back()->with('errors',['some thing went wrong!']);
    }
    public function login(Request $request){
        
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
            
        }
        
        $credentials = $request->only('email', 'password');
        
        if(Auth::attempt($credentials)) {
            return redirect()->route('.articles')->with('success','Login successfully.');
        }
        return redirect()->back()->with('error','Invalid Credentials.');

    }
    public function logout(){
        Auth::logout();
        return redirect()->back()->with('success','Logout Successfully.');
    }
    public function about(){
        $author=Users::where('id',1)->first();
        return view('front.about')->with('author', $author);
    }
    public function contact(){
        return view('front.contact');
    }
    
    public function contactMe(CreateContactMeRequest $request){
        
        $inputs=$request->all();
        unset($inputs['_token']);
        $saveContact=ContactMe::create($inputs);
        
        if($saveContact){
            return redirect()->back()->with('success','Form submitted');
        }
        return redirect()->back()->with('errors',['some thing went wrong please try again!']);

    }
    
}
