<?php

class QuestionsController extends AppController
{
    // public $autoLayout = false;

    public $helpers = array('Html', 'Form');
    public $uses = array('Question', 'NumberQuestionsAnswer', 'QuestionsChoicesReason', 'Names');

    public function index()
    {
        $this->set('questions', $this->Question->find('all'));
        $this->set('questionschoicesreasons', $this->QuestionsChoicesReason->find('all'));
        $this->set('title_for_layout', 'CRM関連用語問題集');

        $name = $this->request->data('name');
        $this->Names->save(array('name' => $name));
    }

    public function index2()
    {
        // debug($this->request->data());
        $this->set('questions', $this->Question->find('all'));
        $this->set('questionschoicesreasons', $this->QuestionsChoicesReason->find('all'));
        $this->set('numberquestionsanswers', $this->NumberQuestionsAnswer->find('all'));
        $this->set('title_for_layout', 'CRM関連用語問題集');

        // チェックされた情報を配列として渡す
        $result = $this->request->query();
        $this->set('result', $result);
    }

    public function view($id = null)
    {
        $this->Qestion->id = $id;
        $this->set('question', $this->Qestion->read());
    }
}
