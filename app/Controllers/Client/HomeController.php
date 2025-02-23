<?php

namespace App\Controllers\Client;

use App\Controller;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Product;

class HomeController extends Controller
{
    protected Product $product;
    protected Category $category;
    protected Banner $banner;
    public function __construct()
    {
        $this->product = new Product();
        $this->category = new Category();
        $this->banner = new Banner();
    }
    private function getData()
    {
        return [
            'banners' => $this->banner->selectAll(),
            'categories' => $this->category->selectAll()
        ];
    }
    public function index()
    {
        $data = $this->getData();
        $data['products'] = $this->product->showHome();
        return view('client.home', $data);
    }
    public function detail($id)
    {
        $data = $this->getData();
        $data['product'] = $this->product->selectById($id);
        return view('client.detail', $data);
    }
    public function products()
    {
        $data = $this->getData();
        $data['products'] = $this->product->paginate($_GET['page'] ?? 1, $_GET['limit'] ?? 8);
        return view('client.products', $data);
    }
    public function category($id)
    {
        try {
            $data = $this->getData();
            $data['products'] = $this->product->getProductsByCategory($id);
            // echo "<pre>";
            // print_r($data);
            return view('client.category',$data);
        } catch (\Throwable $th) {
            //throw $th;
            $this->logErrors($th->__tostring());
        }
    }
}
