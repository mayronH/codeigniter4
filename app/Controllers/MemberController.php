<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MemberModel;

class MemberController extends BaseController
{
    public function addMember()
    {
        if ($this->request->getMethod() == 'post') {
            // Unique email field
            // Differente rules for validation
            $rules = [
                'name' => 'required|min_length[3]',
                'email' => 'required|valid_email|is_unique[members.member_email]|min_length[6]',
                'mobile' => 'required|min_length[9]|max_length[15]'
            ];

            // Custom messages for validation
            $messages = [
                'name' => [
                    'required' => 'Name is Required',
                    'min_length' => 'Name need to be more than 3 characters',
                ],
                'email' => [
                    'required' => 'E-mail is Required',
                    'valid_email' => 'E-mail not valid, please try again',
                    'is_unique' => 'E-mail address is already used',
                    'min_length' => 'E-mail need to be more than 6 characters',
                ],
                'mobile' => [
                    'required' => 'Mobile Phone is Required',
                    'min_length' => 'Phone need to be more than 9 characters',
                    'max_length' => 'Phone too long',
                ]
            ];

            if (!$this->validate($rules, $messages)) {
                return view('member/add-member', [
                    'validation' => $this->validator,
                ]);
            }
            $member = new MemberModel();

            $data = [
                'member_name' => $this->request->getVar('name'),
                'member_email' => $this->request->getVar('email'),
                'member_mobile' => $this->request->getVar('mobile'),
            ];

            $member->insert($data);

            $session = session();
            $session->setFlashdata('success', 'Member Created Successfully');
            return redirect()->to(base_url('list-members'));
        }
        return view('member/add-member');
    }

    public function editMember($id = null)
    {
        $member = new MemberModel();

        $selectedMember = $member->where('member_id', $id)->first();

        if ($this->request->getMethod() == 'post') {
            $rules = [
                'name' => 'required|min_length[3]',
                'email' => 'required|valid_email|is_unique[members.member_email]|min_length[6]',
                'mobile' => 'required|min_length[9]|max_length[15]'
            ];

            $messages = [
                'name' => [
                    'required' => 'Name is Required',
                    'min_length' => 'Name need to be more than 3 characters',
                ],
                'email' => [
                    'required' => 'E-mail is Required',
                    'valid_email' => 'E-mail not valid, please try again',
                    'is_unique' => 'E-mail address is already used',
                    'min_length' => 'E-mail need to be more than 6 characters',
                ],
                'mobile' => [
                    'required' => 'Mobile Phone is Required',
                    'min_length' => 'Phone need to be more than 9 characters',
                    'max_length' => 'Phone too long',
                ]
            ];

            if (!$this->validate($rules, $messages)) {
                return view('member/edit-member', [
                    'validation' => $this->validator,
                    'member' => $selectedMember,
                ]);
            }

            $data = [
                'member_name' => $this->request->getVar('name'),
                'member_email' => $this->request->getVar('email'),
                'member_mobile' => $this->request->getVar('mobile'),
            ];

            $member->update($id, $data);

            $session = session();
            $session->setFlashdata('success', 'Member Updated Successfully');
            return redirect()->to(base_url('list-members'));
        }

        return view('member/edit-member', [
            "member" => $selectedMember,
        ]);
    }

    public function listMember()
    {
        $member = new MemberModel();

        $members = $member->findAll();

        return view('member/list-members', [
            'members' => $members
        ]);
    }

    public function deleteMember($id = null)
    {
        $member = new MemberModel();

        $member->delete($id);

        $session = session();
        $session->setFlashdata('success', 'Member Deleted Successfully');
        return redirect()->to(base_url('list-members'));
    }
}
