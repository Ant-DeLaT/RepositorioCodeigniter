<?php
use App\Models\CalendarModel;
use CodeIgniter\RESTful\ResourceController;
class CalendarController extends ResourceController 
{
    public $event;
    public function __construct(){

        $this->event=new CalendarModel();
    }
    public function calendar()
    {
        if($this->request->isAJAX()){
            $data=$this->event->getEvents(
                $this->request->getGet('start'),
                $this->request->getGet('end')
            );
        }
        return [$this->respond($data),view("calendarView")];
    }
    
    public function create() {
        $this->event->insert($this->request->getPost());
        return $this->respond($this->event->find($this->event->getInsertID()));
    }
    public function update($id=null) {
        $this->event->update($id, $this->request->getPost());
        return $this->respond($this->event->find($this->request->getPost('id')));
    }
    function delete($id=null) {
      $this->event->delete($id);
      return $this->respond($this->request->getPost('id'));
    }

}

  