<?php

namespace App\Controllers\Auth;

use App\Controller;
use App\Models\User;
use Rakit\Validation\Validator;

class AuthController extends Controller
{
    private User $user;

    public function __construct()
    {
        $this->user = new User();
    }
    public function index()
    {
        return view('auth.form');
    }
    public function login()
    {
        try {
            $data = $_POST;
            $validator = new Validator;
            $errors = $this->validate(
                $validator,
                $data,
                [
                    'email' => ['required', 'email'],
                    'password' => 'required|min:6|max:30',
                ]
            );
            $userData = $this->user->getUserByEmail($data['email']);
            $checkPassword = password_verify($data['password'], $userData['password'] ?? null);
            if (!empty($errors) || empty($userData) || !$checkPassword) {
                $_SESSION['status'] = false;
                $_SESSION['msg'] = "Có lỗi xảy ra";
                $_SESSION['data'] = $_POST;
                $_SESSION['errors'] = $errors;


                if (empty($userData) && !isset($_SESSION['errors']['email'])) {
                    $_SESSION['errors']['email']="Email không tồn tại";
                }
                if (isset($userData['password']) && !$checkPassword && !isset($_SESSION['errors']['password'])) {
                    $_SESSION['errors']['password'] = "Mật khẩu không đúng";
                }
                redirect('/auth');
            } else {
                $_SESSION['data'] = null;
            }

            $_SESSION['user'] = $userData;
            // print_r($_SESSION['user']); 
            $redirectTo = ($_SESSION['user']['type'] == 'admin') ? '/admin' : '/';
            redirect($redirectTo);
        } catch (\Throwable $th) {
            //throw $th;
            $this->logErrors($th->__tostring());
            $_SESSION['status'] = false;
            $_SESSION['msg'] = "Có lỗi xảy ra";
            $_SESSION['data'] = $_POST;
            redirect('/auth');
        }
    }

    public function register(){
        try {
            $data = $_POST;

            $validator = new Validator;
            $errors = $this->validate(
                $validator,
                $data,
                [
                    'username' =>['required', 'min:6', 'max:50'],
                    'password' =>['required','min:6','max:30'],
                    'confirm_password' => ['required','min:6','max:30','same:password'],
                    'email' =>[
                        'required',
                        'email',
                        function($value){
                            $flag = (new User)->checkEmailForInsert($value);
                            if($flag){
                                return "Email đã tồn tại";
                            }
                        }
                    ]
                ]
            );
            if(!empty($errors)){
                $_SESSION['status']= false;
                $_SESSION['msg'] = "Có lỗi xảy ra";
                $_SESSION['data'] = $data;
                $_SESSION['errors'] = $errors;
                redirect('/register');
            }
            unset($data['confirm_password']);
            $data['type'] = 'user';
            $data['password']= password_hash($data['password'],PASSWORD_DEFAULT);
            $data['avatar'] = 'assets/default_account.png';
            $this->user->create($data);
            $_SESSION['status'] = true;
            $_SESSION['msg'] = "Đăng ký thành công";
            redirect('/auth');

        } catch (\Throwable $th) {
            // throw $th;
            $this->logErrors($th->__tostring());
            $_SESSION['status']= false;
            $_SESSION['msg'] = "Có lỗi xảy ra";
            redirect('/auth');
        }
    }
    public function logout(){
        unset($_SESSION['user']);
        redirect('/');
    }
}
