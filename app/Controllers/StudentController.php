<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\StudentModel;

class StudentController extends BaseController
{
    public function addStudent()
    {
        if ($this->request->getMethod() == 'post') {
            // Custom Validation for CPF
            $rules = [
                'name' => 'required',
                'cpf' => 'required|cpfValidation[cpf]',
                'email' => 'required|valid_email|is_unique[students.student_email]',
                'image' => 'uploaded[image]|max_size[image,1024]|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/gif,image/png]',
            ];

            $messages = [
                'name' => [
                    'required' => 'Name is Required',
                ],
                'cpf' => [
                    'required' => 'CPF is Required',
                    'cpfValidation' => 'CPF is not valid',
                ],
                'email' => [
                    'required' => 'E-mail is Required',
                    'valid_email' => 'E-mail not valid, please try again',
                    'is_unique' => 'E-mail address is already used',
                ],

            ];

            if (!$this->validate($rules, $messages)) {
                return view('student/add-student', [
                    'validation' => $this->validator,
                ]);
            }

            $file = $this->request->getFile('image');

            $session = session();

            $student_image = $file->getName();

            if ($file->move('images', $student_image)) {
                $student = new StudentModel();

                $data = [
                    'student_name' => $this->request->getVar('name'),
                    'student_cpf' => $this->request->getVar('cpf'),
                    'student_email' => $this->request->getVar('email'),
                    'student_image' => '/images/student/' . $student_image
                ];

                $student->insert($data);

                $session->setFlashdata('success', 'Student Created Successfully');
                return redirect()->to(base_url('list-students'));
            }
            $session->setFlashdata('error', 'Failed to save image');
            return redirect()->to(base_url('list-students'));
        }
        return view('student/add-student');
    }

    public function editStudent($id = null)
    {
        $student = new StudentModel();

        $selectedStudent = $student->where('student_id', $id)->first();

        if ($this->request->getMethod() == 'post') {
            $rules = [
                'name' => 'required',
                'cpf' => 'required|cpfValidation[cpf]',
                'email' => 'required|valid_email',
            ];

            $file = $this->request->getFile('image');

            if ($file->isValid()) {
                $rules['image'] = 'uploaded[image]|max_size[image,1024]|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/gif,image/png]';
            }

            $messages = [
                'name' => [
                    'required' => 'Name is Required',
                ],
                'cpf' => [
                    'required' => 'CPF is Required',
                    'cpfValidation' => 'CPF is not valid',
                ],
                'email' => [
                    'required' => 'E-mail is Required',
                    'valid_email' => 'E-mail not valid, please try again',
                    'is_unique' => 'E-mail address is already used',
                ],
            ];

            if (!$this->validate($rules, $messages)) {
                return view('student/edit-student', [
                    'validation' => $this->validator,
                    'student' => $selectedStudent,
                ]);
            }

            $data = [
                'student_name' => $this->request->getVar('name'),
                'student_cpf' => $this->request->getVar('cpf'),
                'student_email' => $this->request->getVar('email'),
            ];

            $session = session();

            if ($file->isValid()) {
                $student_image = $file->getName();
                if ($file->move('images', $student_image)) {
                    $data['student_image'] = '/images/student/' . $student_image;
                } else {
                    $session->setFlashdata('error', 'Failed to save image');
                    return redirect()->to(base_url('list-students'));
                }
            }

            $student->update($id, $data);

            $session->setFlashdata('success', 'Student Updated Successfully');
            return redirect()->to(base_url('list-students'));
        }

        return view('student/edit-student', [
            'student' => $selectedStudent,
        ]);
    }

    public function listStudent()
    {
        $student = new StudentModel();

        $students = $student->findAll();

        return view('student/list-students', [
            'students' => $students
        ]);
    }

    public function deleteStudent($id = null)
    {
        $student = new StudentModel();

        $student->delete($id);

        $session = session();
        $session->setFlashdata('success', 'Student Deleted Successfully');
        return redirect()->to(base_url('list-students'));
    }
}
