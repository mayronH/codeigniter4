<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\EventModel;

class CalendarController extends BaseController
{
    public function index()
    {
        return view('calendar');
    }

    public function loadData()
    {
        $event = new EventModel();
        $data = $event->where([
			'event_start >=' => $this->request->getVar('start'),
			'event_end <='=> $this->request->getVar('end')
		])->findAll();

		return json_encode($data);
    }

    public function addEvent()
    {
        $event = new EventModel();

        switch ($this->request->getPost('type')) {
            case 'add':
                $data = [
                    'event_title' => $this->request->getPost('title'),
                    'event_start' => $this->request->getPost('start'),
                    'event_end' => $this->request->getPost('end'),
                ];

                $event->insert($data);

                return json_encode($event);

            case 'update':
                $data = [
                    'event_title' => $this->request->getPost('title'),
                    'event_start' => $this->request->getPost('start'),
                    'event_end' => $this->request->getPost('end'),
                ];

                $event_id = $this->request->getPost('id');

                $event->update($event_id, $data);

                return json_encode($event);

            case 'delete':
                $event_id = $this->request->getPost('id');

                $event->delete($event_id);

                return json_encode($event);

            default:
                break;
        }
    }
}
