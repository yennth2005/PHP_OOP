<?php

namespace App\Controllers\Admin;

use App\Controller;
use App\Models\Category;
use Rakit\Validation\Validator;

class CategoryController extends Controller
{
    private Category $category;
    public function __construct()
    {
        $this->category = new Category();
    }

    public function index()
    {
        $cates = $this->category->selectAll();

        return view('admin.categories.index', compact('cates'));
    }
    public function delete($id)
    {
        $cate = $this->category->selectById($id);
        if (empty($cate)) {
            redirect404();
        }

        $this->category->delete($id);

        redirect('/admin/categories');
    }
    public function create()
    {
        $title = "Thêm mới danh mục";

        return view('admin.categories.create', compact('title'));
    }

    public function insert()
    {
        try {
            $data = $_POST + $_FILES;

            $validator = new Validator();

            $errors = $this->validate(
                $validator,
                $data,
                [
                    'name' =>[
                        'required','max:100',function($value){
                        $flag = (new Category())->checkNameForInsert($value);
                        if($flag){
                            return "Tên danh mục đã tồn tại";
                        }
                    }
                ],
                'img' =>['required','uploaded_file:0,500K,png,jpg,jpeg,webp'],
                'is_active' =>['required','in:0,1']
                ]
                );
                if(!empty($errors)){
                    $_SESSION['status'] = false;
                    $_SESSION['msg'] = "Thao tác không thành công";
                    $_SESSION['errors'] = $errors;
                    $_SESSION['data']=$data;
                    redirect('/admin/categories/create');
                }else{
                    $_SESSION['data']=null;
                }
                if(is_upload_file('img')){
                    $data['img'] = $this->uploadFile($data['img'], 'categories');
                }  
            $data['is_active'] = $data['is_active'] ?? 0;
            $this->category->create($data);
            $_SESSION['status'] = true;
            $_SESSION['msg'] = "Thêm mới thành công";
            redirect('/admin/categories');
        } catch (\Throwable $th) {
            $this->logErrors($th->__tostring());
        }
    }
    public function detail($id)
    {
        $cate = $this->category->selectById($id);

        return view('admin.categories.detail', compact('cate'));
    }
    public function edit($id)
    {
        $cate = $this->category->selectById($id);
        if (empty($cate)) {
            redirect404();
        }
        $title = "Cập nhật dnha mục";
        return view('admin.categories.update', compact('cate', 'title'));
    }

    public function update($id)
    {
        $cate = $this->category->selectById($id);
        if (empty($cate)) {
            redirect404();
        }

        try {
            $data = $_POST + $_FILES;

            $validator = new Validator();

            $errors = $this->validate(
                $validator,
                $data,
                [
                    'name' => [
                        'required',
                        'max:100',
                        function ($value) use ($id) {
                            $flag = (new Category())->checkNameForUpdate($id, $value);
                            if ($flag) {
                                return "Tên danh mục đã tồn tại";
                            }
                        }
                    ],
                    'img' => 'nullable|uploaded_file:0,2048K,png,jpg,jpeg,webp',
                    'is_active' => [$validator('in', [0, 1])]
                ]
            );
            if (!empty($errors)) {
                $_SESSION['status'] = false;
                $_SESSION['msg'] = "Thao tác không thành công";
                $_SESSION['errors'] = $errors;
                redirect('/admin/categories/edit/' . $id);
            } 
            if (is_upload_file('img')) {
                $data['img'] = $this->uploadFile($data['img'], 'categories');
            } else {
                $data['img'] = $cate['img'];
            }

            // $data['img'] = $this->uploadFile($data['img'],'categories');
            // echo "<pre>";
            // print_r($_FILES['img']);
            // var_dump($data['img']);
            $data['is_active'] = $data['is_active'] ?? 0;
            $data['updated_at'] = date('Y-m-d H:i:s');
            print_r($data);
            $this->category->update($data, $id);

            if ($data['img'] != $cate['img'] && $cate['img'] && file_exists($cate['img'])) {
                unlink($cate['img']);
            }
            $_SESSION['status'] = true;
            $_SESSION['msg'] = "Thêm mới thành công";
            redirect('/admin/categories');
        } catch (\Throwable $th) {
            // throw $th;
            $this->logErrors($th->__tostring());
        }
    }
}
