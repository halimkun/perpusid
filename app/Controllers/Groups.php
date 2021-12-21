<?php 
namespace App\Controllers;

use App\Controllers\BaseController;
use Myth\Auth\Authorization\GroupModel;

class Groups extends BaseController
{
    protected $g;
    protected $val;

    public function __construct()
    {
        $this->g = new GroupModel();
        $this->val = \Config\Services::validation();
    }

    public function index()
    {
        return redirect()->to('admin/user/group');
    }
    
    // public function show($id = null)
    // {
    //     \show code
    // }
    
    // public function new()
    // {
    //     \new code
    // }
    
    public function create()
    {
        $data = [
            'name'        => strtolower($this->request->getPost('name')),
            'description' => $this->request->getPost('description'),
        ];

        if ($this->validate($this->g->getValidationRules(), $data)) {
            $this->g->save($data);
            return redirect()->to(base_url('admin/user/group'));
        } else {
            return redirect()->to(base_url('admin/user/group'))->withInput()->with('validation', \Config\Services::validation());
        }

    }
    
    // public function edit($id = null)
    // {
    //     \edit code
    // }
    
    public function update($id = null)
    {
        $data = [
            'id' => $this->request->getPost('id'),
            'name' => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
        ];
        
        if ($this->validate($this->g->getValidationRules(), $data)) {
            $this->g->save($data);
            return redirect()->to(base_url('admin/user/group'));
        } else {
            return redirect()->to(base_url('admin/user/group'))->withInput()->with('validation', \Config\Services::validation());
        }
    }
    
    // public function remove($id = null)
    // {
    //     \remove code
    // }
    
    public function delete()
    {
        if ($this->request->getMethod() == "delete") {
            if ($this->g->delete($this->request->getPost('id'))) {
                return redirect()->to(base_url('admin/user/group'));
            };
        }
        
        return redirect()->to(base_url('admin/user/group'));

    }
}