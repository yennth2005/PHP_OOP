<?php


namespace App\Controllers\Admin;

use App\Controller;
use App\Models\Category;
use App\Models\Product;
use Rakit\Validation\Validator;

class ProductController extends Controller
{
    private Product $product;
    private Category $category;

    public function __construct()
    {
        $this->product = new Product();
        $this->category = new Category();
    }

    public function index()
    {
        $products = $this->product->paginate($_GET['page'] ?? 1, $_GET['limit'] ?? 10);
        $title = 'Danh sách sản phẩm';
        // echo "<pre>";
        // foreach($products as $product){
        //     print_r($product);
        // }
        // print_r($products);
        return view('admin.products.index', compact('products', 'title'));
    }


    public function delete($product_id)
    {
        $product = $this->product->selectById($product_id);
        // echo "<pre>";
        // print_r($product);
        if (!$product) {
            redirect404();
        }
        $this->product->delete($product_id);
        redirect('admin/products');
    }
    public function create()
    {
        $categories  = $this->category->selectAll();
        return view('admin.products.create', compact('categories'));
    }

    public function insert()
    {

        try {
            $data = $_POST + $_FILES;
            $validator = new Validator;
            $errors  = $this->validate(

                $validator,
                $data,
                [
                    'name' => 'required',
                    'price' => 'required|numeric',
                    'price_sale' => 'numeric',
                    'overview' => 'required|min:30',
                    'content' => 'required|min:20',
                    'img_thumbnail' => 'required|uploaded_file:0,2048K,png,jpg,jpeg,webp',
                    'is_active' => [$validator('in', [0,1])],
                    'is_sale' => [$validator('in', [0, 1])],
                    'is_show_home' => [$validator('in', [0, 1])],
                    // 'category_id'=>['required']
                ]
            );

            if (!empty($errors)) {
                $_SESSION['status'] = false;
                $_SESSION['msg'] = "có lỗi xảy ra";
                $_SESSION['data'] = $data;
                $_SESSION['errors'] = $errors;
                redirect('/admin/products/create');
            }

            if (is_upload_file('img_thumbnail')) {
                $data['img_thumbnail'] = $this->uploadFile($data['img_thumbnail'], 'products');
            } else {
                $data['img_thumbnail'] = null;
            }
            $data['created_at'] = date('Y-m-d H:i:s');
            $data['updated_at'] = date('Y-m-d H:i:s');
            if ($data['price_sale'] >= $data['price']) {
                $_SESSION['errors']['price_sale'] = 'Giá khuyến mãi phải nhỏ hơn giá gốc';
                redirect('/admin/products/create');
            }
            $data['slug'] = slug($data['name']);
            $data['is_active'] = $data['is_active'] ?? 0;
            $data['is_sale'] = $data['is_sale'] ?? 0;
            $data['is_show_home'] = $data['is_show_home'] ?? 0;
            $this->product->create($data);
            $_SESSION['status'] = true;
            $_SESSION['msg'] = "Thêm sản phẩm thành công";
            redirect('/admin/products');
            // var_dump($data);
            // echo "<pre>";
            // print_r($data);
        } catch (\Throwable $th) {
            $this->logErrors($th->__tostring());
            return view('admin.products.create');
        }
    }

    public function edit($product_id){
        $product = $this->product->selectById($product_id);
        $title = "Cập nhật sản phẩm";

        if(!$product){
            redirect404();
        }

        $categories = $this->category->selectAll();
        return view('admin.products.update',compact('product','categories','title'));
        // echo "<pre>";
        // print_r($product);
    }

    public function update($id){
        $product = $this->product->selectById($id);
        try {
            $data = $_POST + $_FILES;
            $validator = new Validator;
            $errors  = $this->validate(

                $validator,
                $data,
                [
                    'name' => 'required',
                    'price' => 'required|numeric',
                    'price_sale' => 'numeric',
                    'overview' => 'required|min:30',
                    'content' => 'required|min:20',
                    'img_thumbnail' => 'nullable|uploaded_file:0,2048K,png,jpg,jpeg,webp',
                    'is_active' => [$validator('in', [0,1])],
                    'is_sale' => [$validator('in', [0, 1])],
                    'is_show_home' => [$validator('in', [0, 1])],
                    // 'category_id'=>['required']
                ]
            );

            if (!empty($errors)) {
                $_SESSION['status'] = false;
                $_SESSION['msg'] = "có lỗi xảy ra";
                $_SESSION['data'] = $data;
                $_SESSION['errors'] = $errors;
                redirect('/admin/products/create');
            }
            if(is_upload_file('img_thumbnail')){
                $data['img_thumbnail'] = $this->uploadFile($data['img_thumbnail'],'products');
            }
            else{
                $data['img_thumbnail'] = $product['p_img_thumbnail'];
            }
            if($data['price_sale'] >= $data['price']){
                $_SESSION['errors']['price_sale'] = 'Giá khuyến mãi phải nhỏ hơn giá gốc';
                redirect('/admin/products/create');
            }

            $data['is_active'] = $data['is_active'] ?? 0;
            $data['is_sale'] = $data['is_sale'] ?? 0;
            $data['is_show_home'] = $data['is_show_home'] ?? 0;
            $data['slug'] = $product['p_slug'];
            
            $this->product->update($data,$id);
            if($data['img_thumbnail'] !=$product['p_img_thumbnail'] && $product['p_img_thumbnail'] && file_exists($product['img_thumbnail'])){
                unlink($product['p_img_thumbnail']);
            }
            $_SESSION['status'] =true;
            $_SESSION['msg'] = "Cập nhật thành công";
            redirect('/admin/products/edit/'.$product['p_id']);
        } catch (\Throwable $th) {
            //throw $th;
            $this->logErrors($th->__tostring());

        }
    }
    public function detail($id){
        $product = $this->product->selectById($id);
        $title="Chi tiết sản phẩm";
        return view('admin.products.detail',compact('product','title'));
    }
}
