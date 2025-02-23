<?php

namespace App\Controllers\Admin;

use App\Controller;
use App\Models\User;
// use Dotenv\Validator;
use Rakit\Validation\Validator;

class UserController extends Controller
{
    private User $user;
    public function __construct()
    {
        $this->user = new User();
    }
    public function index()
    {
        // return view('admin.users.index');
        $title = "Danh sách người dùng";
        $users = $this->user->paginate($_GET['page'] ?? 1, $_GET['limit'] ?? 10);
        return view('admin.users.index', compact(['users', 'title']));
    }
    // public function index()
    // {
    //     // return view('admin.users.index');
    //     $title = "Danh sách người dùng";
    //     $users = $this->user->selectAll();
    //     return view('admin.users.index', compact(['users', 'title']));
    // }

    public function delete($id)
    {
        $user = $this->user->selectById($id);
        if (empty($user)) {
            echo "404";
        }

        $this->user->delete($id);
        if ($user['avatar'] && file_exists($user['avatar'])) {
            unlink($user['avatar']);
        }
        $_SESSION['status'] = true;
        $_SESSION['msg'] = "Xoá thành công";
        redirect('/admin/users');
    }

    public function create()
    {
        $title = "Thêm mới";
        return view('admin.users.create', compact('title'));
    }
    public function insert()
    {
        try {
            $userData = $_POST + $_FILES;
            // echo "<pre>";
            // print_r($userData);
            // echo 'hehe';

            $validator = new Validator;

            $errors = $this->validate(
                $validator,
                $userData,
                [
                    'username'                  => 'required|max:50',
                    'email'                 => [
                        'required',
                        'email',
                        function ($value) {
                            $flag = (new User)->checkEmailForInsert($value);

                            if ($flag) {
                                return "Email :đã tồn tại";
                            }
                        }
                    ],
                    'password'              => 'required|min:6|max:30',
                    'avatar' => 'nullable|uploaded_file:0,2048K,png,jpeg,jpg,webp',
                    'type'                  => [$validator('in', ['admin', 'user'])]
                ]
            );

            if (!empty($errors)) {
                $_SESSION['status']     = false;
                $_SESSION['msg']        = 'Thao tác KHÔNG thành công!';
                $_SESSION['data']       = $userData;
                $_SESSION['errors']     = $errors;

                redirect('/admin/users/create');
            } else {
                $_SESSION['data'] = null;
            }

            if(is_upload_file('avatar')){
                $userData['avatar'] = $this->uploadFile($userData['avatar'], 'users');
            }else{
                $userData['avatar'] = 'assets/default_account.png';
            }        

            $userData['password'] = password_hash($userData['password'], PASSWORD_DEFAULT);
            $this->user->create($userData);
            $_SESSION['status'] = true;
            $_SESSION['msg'] = "Thêm mới thành công";
            redirect('/admin/users/create');
        } catch (\Throwable $th) {
            $this->logErrors($th->__tostring());
            $_SESSION['status'] = false;
            $_SESSION['msg'] = "lỗi hệ thống" . $th->getMessage();
            // redirect('/admin/users');

        }
    }

    public function detail($id)
    {
        $user = $this->user->selectById($id);
        $title = "Chi tiết người dùng";
        return view('admin.users.detail', compact('user', 'title'));
    }

    public function edit($id)
    {
        $user = $this->user->selectById($id);
        $title = "Cập nhật người dùng";
        return view('admin.users.update', compact('user', 'title'));
    }

    public function update($id)
    {
        $user = $this->user->selectById($id);

        if (empty($user)) {
            redirect404();
        }
        try {
            $userData = $_POST + $_FILES;
            $validator = new Validator();
            $errors = $this->validate(
                $validator,
                $userData,
                [
                    'username' => 'required|max:50',
                    'email' => [
                        'required',
                        'email',
                        function ($value) use ($id) {
                            $flag = (new User)->checkEmailForUpdate($id, $value);
                            // print_r($id);
                            // print_r($value);
                            if ($flag) {
                                return "thuộc tính đã tồn tại";
                            }
                        }
                    ],
                    'avatar' => 'nullable|uploaded_file:0,2048K,png,jpeg,jpg,webp',
                    'type' => [$validator('in', ['admin', 'user'])],
                ]
            );
            if (!empty($errors)) {
                $_SESSION['status'] = false;
                $_SESSION['msg'] = "Thao tác không thành công";
                $_SESSION['errors'] = $errors;
                // $_SESSION['data']=$userData;
                redirect('/admin/users/edit/' . $id);
            }
            // print($user['avatar']);
            // $userData['avatar'] = $this->uploadFile($userData['avatar'],'users');
            if (is_upload_file('avatar')) {
                $userData['avatar'] = $this->uploadFile($userData['avatar'], 'users');
            } else {
                $userData['avatar'] = $user['avatar'];
            }
            // if(isset($userData['avatar'])){

            //     $userData['avatar'] = $this->uploadFile($userData['avatar'],'users');
            // }else{
            //     $userData['avatar'] = $user['avatar'];
            // }

            // echo "<pre>";
            // print_r($userData);
            $userData['updated_at'] = date('Y-m-d H:i:s');
            $this->user->update($userData, $id);

            if (
                $userData['avatar'] != $user['avatar']
                && $user['avatar']
                && file_exists($user['avatar'])
            ) {
                unlink($user['avatar']);
            }
            $_SESSION['status'] = true;
            $_SESSION['msg'] = "Cập nhật thành công";
            // print_r($userData);
            redirect('/admin/users/edit/'.$id);
        } catch (\Throwable $th) {
            $this->logErrors($th->__tostring());
            $_SESSION['status'] = false;
            $_SESSION['msg'] = "lỗi hệ thống" . $th->getMessage();
        }
    }
    // public function test(){
    //     try {

    //         $this->uploadFile($_FILES['avatar'],'users');
    //     } catch (\Throwable $th) {
    //         // throw $th;
    //         $this->logErrors($th->getMessage());
    //     }
    // }
}
