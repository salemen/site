<?php


namespace app\components;
use yii\base\Widget;
use app\models\Category;
use Yii;

class MenuWidget1 extends Widget{

    public $tpl;
    public $model;
    public $data;
    public $tree;
    public $menuHtml;

    public function init(){
        parent::init();
        if( $this->tpl === null ){
            $this->tpl = 'menu1';
        }
        $this->tpl .= '.php';
    }

    public function run(){
        // get cache
        
          $this->data = Category::find()->indexBy('id')->where(['not in', 'id', [1]])->andWhere(['not in', 'parent_id', [0]])->asArray()->all();
        $this->tree = $this->getTree();
        $this->menuHtml = $this->getMenuHtml($this->tree);
        // set cache
        if($this->tpl == 'menu1.php'){
            Yii::$app->cache->set('menu1', $this->menuHtml, 3600);
        }
        return $this->menuHtml;
    }

    protected function getTree(){
        $tree = [];
        foreach ($this->data as $id=>&$node) {
            if (!$node['parent_id'])
                $tree[$id] = &$node;
            else
                $this->data[$node['parent_id']]['childs'][$node['id']] = &$node;
        }
        return $tree;
    }

    protected function getMenuHtml($tree, $tab = ''){
		
        $str = '';
        foreach ($tree as $category) {
            $str .= $this->catToTemplate($category, $tab);
        }
		
		 /* if($category['id'] == 1) echo ' style= "color red" ';
         if($category['id'] == 2) echo ' disabled';
         if($category['id'] == 3) echo ' disabled';
         if($category['id'] == 4) echo ' disabled';
         if($category['id'] == 5) echo ' disabled';
         if($category['id'] == 6) echo ' disabled';
         if($category['id'] == 7) echo ' disabled';
         if($category['id'] == 8) echo ' disabled';
		 if($category['id'] == 63) echo ' disabled';
		 if($category['id'] == 11) echo ' disabled'; */
        return $str;
    }

    protected function catToTemplate($category, $tab){
        ob_start();
        include __DIR__ . '/menu_tpl/' . $this->tpl;
        return ob_get_clean();
    }

} 