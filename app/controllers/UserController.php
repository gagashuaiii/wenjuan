<?php


class UserController extends BaseController
{
    public function __construct()
    {
        $this->beforeFilter('auth',array('except'=>array('Login','DoLogin')));
    }
    /**
     * 用户列表页
     */
    public function getIndex(){
        $users=User::orderby('created_at','desc')->paginate(10);
        return View::make('user.list')->with('users',$users);
    }
    /**
     * 用户详情页
     * @param $id:传一个整数代表id
     * @return string
     */
    public function getInfo($id){
        $user = User::find($id);
        return View::make('user.content')->with('user',$user);
    }
    /**
     * 添加新用户
     * @return mixed
     */
    public function getAddUser(){
        return View::make('user.add');
    }

    public function postAddUser(){
        //表单验证
        $data=Input::all();
        $rules=array(
            'username'=>'required|min:5|unique:users|alpha_num',
            'password'=>'required|min:6|confirmed',
            'email'=>'required|email|unique:users'
        );
        $validator=Validator::make($data,$rules);
        if($validator->fails())
        {
            $errors=$validator->messages();
            return Redirect::to('/adm/user/add-user')->withErrors($errors);
        }
        $username=Input::get('username');
        $email=Input::get('email');
        $password=Input::get('password');
        $user=new User();
        $user->username=$username;
        $user->email=$email;
        $user->password=Hash::make($password);
        $user->save();
        return Redirect::to('/adm/user');
    }

    /**
     * 编辑用户
     * @param $id
     * @return mixed
     */
    public function getEditUser($id){
        $user = User::find($id);
        return View::make('user.edit')->with('user',$user);
    }

    public function postEditUser(){
        $data=Input::all();
        $rules=array(
            'password'=>'required|min:6',
        );
        $validator=Validator::make($data,$rules);
        if($validator->fails())
        {
            $errors=$validator->messages();
            return Redirect::to('/adm/user/edit-user')->withErrors($errors);
        }
        $id=Input::get('id');
        $username=Input::get('username');
        $email=Input::get('email');
        $password=Input::get('password');
        $user=User::find($id);
        $user->username=$username;
        $user->email=$email;
        $user->password=Hash::make($password);
        $user->save();
        return Redirect::to('/adm/user');
    }

    /**
     * 删除用户
     * @param $id
     * @return mixed
     */
    public function getDeleteUser($id){
        $user = User::find($id);
        return View::make('user.delete')->with('user',$user);
    }

    public function postDeleteUser(){
        $id=Input::get('id');
        $user=User::find($id);
        $user->delete();
        return Redirect::to('/adm/user');
    }

    public function Login(){
        return View::make('user.login');
    }

    public function DoLogin(){
        $username=$_POST['username'];
        $password=$_POST['password'];
        if(Auth::attempt(array('username'=>$username,'password'=>$password))) {
            $data = array("status" => true);
        }else{
            $data = array("status"=>false);
        }
        return json_encode($data);
    }

    public function Logout(){
        Auth::logout();
        return Redirect::to('/login');
    }
}