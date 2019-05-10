<?php

class QuestionsController extends AppController
{
    // public $autoLayout = false;

    public $helpers = array('Html', 'Form');
    public $uses = array('Question', 'NumberQuestionsAnswer', 'QuestionsChoicesReason', 'Name', 'DifficultQuestion');

    public function index()
    {
        $this->set('questions', $this->Question->find('all'));
        $this->set('questionschoicesreasons', $this->QuestionsChoicesReason->find('all'));
        $this->set('title_for_layout', 'CRM関連用語問題集');
    }

    public function index2()
    {
        // debug($this->request->query());
        $this->set('questions', $this->Question->find('all'));
        $this->set('names', $this->Name->find('all'));
        $this->set('questionschoicesreasons', $this->QuestionsChoicesReason->find('all'));
        $this->set('numberquestionsanswers', $this->NumberQuestionsAnswer->find('all'));
        // $this->set('title_for_layout', 'CRM関連用語問題集');

        // チェックされた情報を配列として渡す
        $result = $this->request->query();
        unset($result['rand_keys']);
        $this->set('result', $result);

        // ランダムな問題番号インデックス
        $rand_keys = explode(" ", $this->request->query['rand_keys']);
        $this->set('rand_keys', $rand_keys);

        // フォームによる入力
        $inputted_data = $this->request->data();
        $form_name = current(array_keys($inputted_data['Question']));

        if (isset($inputted_data) && $form_name == 'name') {
            $this->Name->save(array('name' => $inputted_data['Question']['name']));
        } elseif (isset($inputted_data) && $form_name == 'question') {
            $this->DifficultQuestion->save(array('question' => $inputted_data['Question']['question']));
        }
    }
}
