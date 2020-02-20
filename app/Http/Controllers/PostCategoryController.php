<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostCategoryRequest;
use App\Http\Requests\UpdatePostCategoryRequest;
use App\Repositories\PostCategoryRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Auth;
use Response;

class PostCategoryController extends AppBaseController
{
    /** @var  PostCategoryRepository */
    private $postCategoryRepository;
    private $data;
    private $role;

    public function __construct(PostCategoryRepository $postCategoryRepo)
    {
        $this->postCategoryRepository = $postCategoryRepo;
        $this->data['module']='Post Catgory';
        $this->role = ['super-admin'];
    }

    /**
     * Display a listing of the PostCategory.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        if(Auth::user()->hasAnyRole($this->role)){
            $postCategories = $this->postCategoryRepository->all();
        }
        else{
            $postCategories = $this->postCategoryRepository->getDataByUserId(Auth::user()->id);
        }
        return view('post_categories.index')
        ->with('postCategories', $postCategories);
    }

    /**
     * Show the form for creating a new PostCategory.
     *
     * @return Response
     */
    public function create()
    {   
        return view('post_categories.create');
    }

    /**
     * Store a newly created PostCategory in storage.
     *
     * @param CreatePostCategoryRequest $request
     *
     * @return Response
     */
    public function store(CreatePostCategoryRequest $request)
    {
        $input = $request->all();
        
        if($request->hasfile('image_url')) 
        { 
          $file = $request->file('image_url');
          $extension = $file->getClientOriginalExtension(); // getting image extension
          $filename ='slumcoder-'.$request->category.'-'.time().'.'.$extension;
          $file->move('uploads/catgory/', $filename);
        }
        $input['image_url']=$filename;
        $input['user_id']=auth()->user()->id;

        $postCategory = $this->postCategoryRepository->create($input);

        Flash::success('Post Category saved successfully.');

        return redirect(route('postCategories.index'));
    }

    /**
     * Display the specified PostCategory.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $postCategory = $this->postCategoryRepository->find($id);

        if (empty($postCategory)) {
            Flash::error('Post Category not found');

            return redirect(route('postCategories.index'));
        }

        return view('post_categories.show')->with('postCategory', $postCategory);
    }

    /**
     * Show the form for editing the specified PostCategory.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $postCategory = $this->postCategoryRepository->find($id);

        if (empty($postCategory)) {
            Flash::error('Post Category not found');

            return redirect(route('postCategories.index'));
        }

        return view('post_categories.edit')->with('postCategory', $postCategory);
    }

    /**
     * Update the specified PostCategory in storage.
     *
     * @param int $id
     * @param UpdatePostCategoryRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePostCategoryRequest $request)
    {
        $postCategory = $this->postCategoryRepository->find($id);

        if (empty($postCategory)) {
            Flash::error('Post Category not found');

            return redirect(route('postCategories.index'));
        }
        $input=$request->all();
        
        if($request->hasfile('image_url')) 
        { 
          $file = $request->file('image_url');
          $extension = $file->getClientOriginalExtension(); // getting image extension
          $filename ='slumcoder-'.$request->category.'-'.time().'.'.$extension;
          $file->move('uploads/catgory/', $filename);
          $input['image_url']=$filename;
        }
        $input['user_id']=auth()->user()->id;
        $postCategory = $this->postCategoryRepository->update($input, $id);

        Flash::success('Post Category updated successfully.');

        return redirect(route('postCategories.index'));
    }

    /**
     * Remove the specified PostCategory from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $postCategory = $this->postCategoryRepository->find($id);

        if (empty($postCategory)) {
            Flash::error('Post Category not found');

            return redirect(route('postCategories.index'));
        }

        $this->postCategoryRepository->delete($id);

        Flash::success('Post Category deleted successfully.');

        return redirect(route('postCategories.index'));
    }
}
