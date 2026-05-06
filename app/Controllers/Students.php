<?php

namespace App\Controllers;

use App\Models\StudentModel;

class Students extends BaseController
{
    public function index()
    {
        $model = new StudentModel();

        $keyword = $this->request->getVar('keyword');

        if ($keyword) {
            $students = $model
                ->like('name', $keyword)
                ->orLike('email', $keyword)
                ->paginate(5);
        } else {
            $students = $model->paginate(5);
        }

        return view('students/list', [
            'students' => $students,
            'pager'    => $model->pager
        ]);
    }

    public function create()
    {
        return view('students/create');
    }

    public function store()
    {
        $model = new StudentModel();

        $model->save([
            'name'  => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
        ]);

        return redirect()->to('/students');
    }

    public function edit($id)
    {
        $model = new StudentModel();

        return view('students/edit', [
            'student' => $model->find($id)
        ]);
    }

    public function update($id)
    {
        $model = new StudentModel();

        $model->update($id, [
            'name'  => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
        ]);

        return redirect()->to('/students');
    }

    public function delete($id)
    {
        $model = new StudentModel();

        // 🔥 THIS NOW SETS deleted_at INSTEAD OF HARD DELETE
        $model->delete($id);

        return redirect()->to('/students');
    }
}