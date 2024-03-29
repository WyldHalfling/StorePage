<?php

namespace App\Controllers\Admin;

use App\Classes\CSRFToken;
use App\Classes\Redirect;
use App\Classes\Request;
use App\Classes\Session;
use App\Classes\ValidateRequest;
use App\Controllers\BaseController;
use App\Models\Category;
use App\Models\SubCategory;

class ProductCategoryController extends BaseController
{
    public $tableName = 'categories';
    public $categories;
    public $subcategories;
    public $subcategories_links;
    public $links;

    public function __construct() {
        $total = Category::all()->count();
        $subTotal = SubCategory::all()->count();
        $object = new Category;

        list($this->categories, $this->links) = paginate(10, $total, $this->tableName, $object);
        list($this->subcategories, $this->subcategories_links) = paginate(10, $subTotal, 'sub_categories', new SubCategory);
    }

    /**
     * Display categories
     *
     * @return void
     */
    public function show() {
        return view('admin/product/categories', [
            'categories' => $this->categories, 'links' => $this->links,
            'subcategories' => $this->subcategories, 'subcategories_links' => $this->subcategories_links
        ]);
    }

    /**
     * Create new categories
     *
     * @return void
     */
    public function store() {
        if (Request::has('post')) {
            $request = Request::get('post');

            if (CSRFToken::verifyCSRFToken($request->token)) {
                $rules = [
                    'name' => ['required' => true, 'minLength' => 3, 'string' => true, 'unique' => 'categories']
                ];

                $validate = new ValidateRequest;
                $validate->abide($_POST, $rules);

                if ($validate->hasError()) {
                    $errors = $validate->getErrorMessages();
                    return view('admin/product/categories', [
                        'categories' => $this->categories, 'links' => $this->links, 'errors' => $errors,
                        'subcategories' => $this->subcategories, 'subcategories_links' => $this->subcategories_links
                    ]);
                }

                // process form data
                Category::create([
                    'name' => $request->name,
                    'slug' => slug($request->name)
                ]);

                $total = Category::all()->count();
                $subTotal = SubCategory::all()->count();
                list($this->categories, $this->links) = paginate(10, $total, $this->tableName, new Category);
                list($this->subcategories, $this->subcategories_links) = paginate(10, $subTotal, 'sub_categories', new SubCategory);

                return view('admin/product/categories', [
                    'categories' => $this->categories, 'links' => $this->links, 'success' => 'Category Created',
                    'subcategories' => $this->subcategories, 'subcategories_links' => $this->subcategories_links
                ]);
            }
            throw new \Exception('Token mismatch');
        }

        return null;
    }
    
    /**
     * Edit product categories
     *
     * @param [type] $id
     * @return void
     */
    public function edit($id) {
        if (Request::has('post')) {
            $request = Request::get('post');
            
            if (CSRFToken::verifyCSRFToken($request->token, false)) {
                $rules = [
                    'name' => ['required' => true, 'minLength' => 3, 'string' => true, 'unique' => 'categories']
                ];
                $validate = new ValidateRequest;
                $validate->abide($_POST, $rules);
                if ($validate->hasError()) {
                    $errors = $validate->getErrorMessages();
                    header('HTTP/1.1 422 Unprocessable Entity', true, 422);
                    echo json_encode($errors);
                    exit;
                }
                
                Category::where('id', $id)->update(['name' => $request->name]);
                echo json_encode(['success' => 'Record Update Successfully']);
                exit;
            }
            throw new \Exception('Token mismatch');
        }
        
        return null;
    }

    public function delete($id) {
        if (Request::has('post')) {
            $request = Request::get('post');
            
            if (CSRFToken::verifyCSRFToken($request->token)) {
                Category::destroy($id);

                $subcategories = SubCategory::where('category_id', $id)->get();
                if (count($subcategories)) {
                    foreach ($subcategories as $subcategory) {
                        $subcategory->delete();
                    }
                }

                Session::add('success', 'Category Deleted');
                Redirect::to('/admin/product/categories');
            }
            throw new \Exception('Token mismatch');
        }
        
        return null;
    }
}
