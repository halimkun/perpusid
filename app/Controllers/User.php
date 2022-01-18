<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Entities\User as EntitiesUser;
use Myth\Auth\Authorization\GroupModel;

class User extends BaseController
{
    protected $user;
    protected $group;
    protected $validation;
    protected $config;

    public function __construct()
    {
        helper(['form', 'url', 'file']);

        $this->user = new \App\Models\UserModel();
        $this->group = new GroupModel();
        $this->validation = \Config\Services::validation();
        $this->config = config("Auth");
    }

    public function index()
    {
        if (logged_in() && in_groups('admin')) {
            return redirect()->to('/admin');
        } elseif (logged_in() && in_groups('anggota')) {
            return redirect()->to('/u/dashboard');
        } else {
            return redirect()->to('/');
        }
    }

    public function register()
    {
        if ($this->request->getMethod() == 'post') {

            $username = explode("@", $this->request->getPost('email'));

            // tanggal lahir dan default password
            $tgl = explode('-', $this->request->getPost('tgl_lahir'));
            $tgl = $tgl[2] . "/" . $tgl[1] . "/" . $tgl[0];
            // tanggal  // bulan    // tanggal

            $data = [
                "email"     => $this->request->getPost('email'),
                "username"  => $username[0],
                "firstname" => $this->request->getPost('firstname'),
                "lastname"  => $this->request->getPost('lastname'),
                "tgl_lahir" => $this->request->getPost('tgl_lahir'),
                "phone"     => $this->request->getPost('phone'),
                "gender"    => $this->request->getPost('gender'),
                "profile"   => "avatar.png",
                "address"   => $this->request->getPost('address'),
                "password"  => str_replace('/', '', $tgl),
            ];

            // Rules regis user from admin
            $rules = [
                "email"     => 'required|valid_email|is_unique[users.email,id,{id}]',
                // "username"  => "required|alpha_numeric_punct|is_unique[users.username]",
                "firstname" => "required|alpha_numeric_space",
                "lastname"  => "required|alpha_numeric_space",
                "tgl_lahir" => "required|valid_date[Y-m-d]",
                "phone"     => 'required|is_unique[users.phone]',
                "gender"    => "required|alpha",
                // "profile"    => "required|alpha",
                "address"   => "required",
                // "password"   => "required",
            ];

            if (!$this->validate($rules, $data)) {
                return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            }

            $data = new EntitiesUser($data);
            $this->config->requireActivation === null ? $data->activate() : $data->generateActivateHash();


            if (!empty($this->config->defaultUserGroup)) {
                $this->user = $this->user->withGroup($this->config->defaultUserGroup);
            }

            if (!$this->user->save($data)) {
                return redirect()->back()->withInput()->with('errors', $this->user->errors());
            }

            if ($this->config->requireActivation !== null) {
                $activator = service('activator');
                $sent = $activator->send($data);

                if (!$sent) {
                    return redirect()->back()->withInput()->with('error', $activator->error() ?? lang('Auth.unknownError'));
                }

                // Success!
                return redirect()->to('admin/users')->with('message', lang('Auth.activationSuccess'));
            }

            // Success!
            return redirect()->to('admin/users')->with('message', lang('Auth.registerSuccess'));
        } else {
            return redirect()->to('admin/user/new');
        }
    }

    public function changeGroup()
    {
        $this->group->removeUserFromAllGroups($this->request->getPost('user_id'));
        if ($this->group->addUserToGroup($this->request->getPost('user_id'), $this->request->getPost('group_id'))) {
            session()->setFlashdata('success', "Berhasil merubah role user");
            return redirect()->to('admin/users');
        }

        return redirect()->to('admin/users');
    }

    public function detail($uname = null)
    {
        if (!$uname == null) {

            $data = [
                "title"      => "Detail, Edit User | PERPUSID",
                "segment"    => $this->request->uri->getSegments(),
                "validation" => $this->validation,
                "user"       => $this->user->getUserByUsername($uname),
                "groups"     => $this->group->findAll()
            ];

            return view('admin/user/detail', $data);
        } else {
            return redirect()->to(base_url('user'));
        }
    }

    public function edit($uname = null)
    {
        if ($this->request->getMethod() == 'patch') {
            $old_data = $this->user->find($this->request->getPost('id'));
            $pict = $this->request->getFile('profile');

            $rules = [
                "id"        => "required",
                "phone"     => "required" . (($this->request->getPost('phone') == $old_data->phone) ? "" : "|is_unique[users.phone]"),
                "email"     => "required|valid_email" . (($this->request->getPost('email') == $old_data->email) ? "" : "|is_unique[users.email]"),
                "username"  => "required|alpha_numeric_punct" . (($this->request->getPost('username') == $old_data->username) ? "" : "|is_unique[users.username]"),
                "firstname" => "required|alpha_numeric_space",
                "lastname"  => "required|alpha_numeric_space",
                "tgl_lahir" => "required|valid_date[Y-m-d]",
                "gender"    => "required|alpha",
                "address"   => "required",
            ];

            if (!empty($this->request->getPost('password'))) {
                $rules['password'] =  'required|min_length[8]';
            }

            if ($pict->getError() == 0) {
                $rules["profile"] = "max_size[profile,2024]|is_image[profile]|mime_in[profile,image/jpg,image/png,image/jpeg,image/gif]";
            }

            if (!$this->validate($rules)) {
                return redirect()->to(base_url('user/edit/' . $old_data->username))->withInput();
            }

            $fn = $pict->getRandomName();

            //  persiapan input dan input.
            $data = [
                'id'        => $old_data->id,
                'email'     => $this->request->getPost('email'),
                'username'  => $this->request->getPost('username'),
                'firstname' => $this->request->getPost('firstname'),
                'lastname'  => $this->request->getPost('lastname'),
                'tgl_lahir' => $this->request->getPost('tgl_lahir'),
                'phone'     => $this->request->getPost('phone'),
                'gender'    => $this->request->getPost('gender'),
                'profile'   => ($pict->getError() == 4) ? $old_data->profile : $fn,
                'address'   => $this->request->getPost('address'),
                // 'password'  => (empty($this->request->getPost('password')) ? $old_data->password_hash : $this->request->getPost('password')),
            ];

            if (!empty($this->request->getPost('password'))) {
                $data['password'] = $this->request->getPost('password');
            }

            $data = new EntitiesUser($data);

            if ($pict->getError() != 4) {
                if ($old_data->profile != 'avatar.png') {
                    unlink('assets/imgs/avatar/' . $old_data->profile);
                }
                $pict->move('assets/imgs/avatar/', $fn);
            }

            $this->user->save($data);

            session()->setFlashdata('success', 'User Berhasil Diubah!');

            if ($this->request->getPost('from') == 'user') {
                return redirect()->to(base_url('u/profile'));
            }

            return redirect()->to(base_url('admin/users'));
        } else {
            if (!$uname == null) {

                $data = [
                    "title"         => "Detail, Edit User | PERPUSID",
                    "segment"       => $this->request->uri->getSegments(),
                    "validation"    => $this->validation,
                    "user"          => $this->user->getUserByUsername($uname),
                    "groups"     => $this->group->findAll()
                ];

                return view('admin/user/detail', $data);
            } else {
                return redirect()->to(base_url('user'));
            }
        }
    }

    public function delete($id = null)
    {
        if ($id !== null) {
            if ($this->group->removeUserFromAllGroups($id) && $this->user->delete($id)) {
                return redirect()->to('/admin/users');
            }
            return redirect()->to('/admin/users');
        }
        return redirect()->to('/admin/users');
    }

    public function action($uname = null)
    {
        if ($this->request->getMethod() == 'delete') {
            $this->user->delUser($uname);

            session()->setFlashdata('success', 'User Berhasil Dihapus!');
            return redirect()->to(base_url('user'));
        } else {
            return redirect()->to(base_url('user'));
        }
    }
}
