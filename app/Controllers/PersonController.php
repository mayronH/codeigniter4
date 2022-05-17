<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Entities\Person;
use App\Models\PersonModel;

class PersonController extends BaseController
{
    public function index()
    {
        $personModel = new PersonModel();

        $people = $personModel->findAll();

        // var_dump($people);

        return view('people/list-people', [
            'people' => $people
        ]);
    }

    public function addPerson()
    {
        // Model Person
        $personModel = new PersonModel();

        // Entity Person
        $person = new Person();

        // $person->person_firstname = "Luke";
        // $person->person_lastname = "Skywalker";
        // $person->person_email = "luke@mail.com";

        // Data Mapping
        $person->firstName = 'Ahsoka';
        $person->lastName = 'Tano';
        $person->email = 'ahsoka@mail.com';

        // Do the same thing
        // $person->setPersonPassword('12345');
        $person->password = '12345';

        $personModel->save($person);

        return redirect()->to(base_url('people'));
    }

    public function deletePerson($id = null)
    {
        $personModel = new PersonModel();

        $personModel->delete($id);

        $session = session();
        $session->setFlashdata('success', 'Person Deleted Successfully');
        return redirect()->to(base_url('people'));
    }

    public function getPerson($id = null) {
        $personModel = new PersonModel();

        $person = $personModel->find($id);

        return view('people/view-person', [
            'person' => $person
        ]);
    }
}
