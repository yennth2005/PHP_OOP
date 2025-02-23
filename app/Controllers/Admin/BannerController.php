<?php


namespace App\Controllers\Admin;

use App\Controller;
use App\Models\Banner;
use Rakit\Validation\Validator;

class BannerController extends Controller
{
    private Banner $banner;
    public function __construct()
    {
        $this->banner = new Banner();
    }

    public function index()
    {
        $banners = $this->banner->selectAll();

        return view('admin.banners.index', compact('banners'));
    }

    public function create()
    {
        $title = "Thêm mới banner";
        return view('admin.banners.create', compact('title'));
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
                    'name' => ['required', 'max:100'],
                    'img' => 'required|uploaded_file:0,500K,png,jpg,jpeg,webp',
                    'is_active' => [$validator('in',[0,1])]
                ],
            );
            if (!empty($errors)) {
                $_SESSION['status'] = false;
                $_SESSION['msg'] = "Thao tác không thành công";
                $_SESSION['errors'] = $errors;
                $_SESSION['data'] = $data;
                redirect('/admin/banners/create');
            } else {
                $_SESSION['data'] = null;
            }
            if(is_upload_file('img')){

                $data['img'] = $this->uploadFile($data['img'], 'banners');
            }
            $data['is_active'] = $data['is_active'] ?? 0;
            $this->banner->create($data);
            $_SESSION['status'] = true;
            $_SESSION['msg'] = "Thêm mới thành công";
            redirect('/admin/banners');
        } catch (\Throwable $th) {
            //throw $th;
            $this->logErrors($th->__tostring());
        }
    }

    public function delete($id)
    {
        $banner = $this->banner->selectById($id);

        $this->banner->delete($id);

        if ($banner['img'] && file_exists($banner['img'])) {
            unlink($banner['img']);
        }
        $_SESSION['status'] = true;
        $_SESSION['msg'] = "Xoá thành công";
        redirect('/admin/banners');
    }

    public function detail($id)
    {
        $banner = $this->banner->selectById($id);
        $title = "Chi tiết banner";
        return view('admin.banners.detail', compact('banner', 'title'));
    }
    public function edit($id){
        $banner = $this->banner->selectById($id);
        $title="Cập nhật banner";

        return view('admin.banners.update',compact('banner','title'));
    }

    public function update($id){
        $banner  = $this->banner->selectById($id);

        try {
            $data= $_POST + $_FILES;
            $validator = new Validator();
            $errors = $this->validate(
                $validator,
                $data,
                [
                    'name' => ['required', 'max:100'],
                    'img' => 'nullable|uploaded_file:0,500K,png,jpg,jpeg,webp',
                    'is_active' => [$validator('in',[0,1])]
                ],
            );
            if (!empty($errors)) {
                $_SESSION['status'] = false;
                $_SESSION['msg'] = "Thao tác không thành công";
                $_SESSION['errors'] = $errors;
                $_SESSION['data'] = $data;
                redirect('/admin/banners/edit/'.$id);
            } else {
                $_SESSION['data'] = null;
            }

            if(is_upload_file('img')){
                $data['img'] = $this->uploadFile($data['img'],'banners');
            }else{
                $data['img'] = $banner['img'];
            }

            $data['is_active'] = $data['is_active']??0;
            $data['updated_at'] = date('Y-m-d H:i:s');
            $this->banner->update($data,$id);

            if($data['img'] != $banner['img'] && $banner['img']
                && file_exists($banner['img'])){
                    unlink($banner['img']);
                }
            $_SESSION['status']= true;
            $_SESSION['msg'] = "Cập nhật thành công";
            redirect('/admin/banners');
        } catch (\Throwable $th) {
            //throw $th;
            $this->logErrors($th->__tostring());
        }
    }
}
