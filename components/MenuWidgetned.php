<?php


namespace app\components;
use yii\base\Widget;
use app\models\Nedvigcategory;
use Yii;

class MenuWidgetned extends Widget{

    public $tpl;
    public $model;
    public $data;
    public $tree;
    public $menunedHtml;

    public function init(){
        parent::init();
        if( $this->tpl === null ){
            $this->tpl = 'menuned';
        }
        $this->tpl .= '.php';
    }

    public function run(){
        // get cache
        if($this->tpl == 'menuned.php'){
            $menu = Yii::$app->cache->get('menuned');
            if ($menu) 
                 return $menu;
         }

        $this->data = nedvigcategory::find()->indexBy('id')->asArray()->all();
        $this->tree = $this->getTree();
        $this->menunedHtml = $this->getMenunedHtml($this->tree);
        // set cache
        if($this->tpl == 'menuned.php'){
            Yii::$app->cache->set('menuned', $this->menunedHtml, 60);
        }
        return $this->menunedHtml;
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

    protected function getMenunedHtml($tree, $tab = ''){
        $str = '';
        foreach ($tree as $nedvigcategory) {
            $str .= $this->catToTemplate($nedvigcategory, $tab);
        }
        return $str;
    }

    protected function catToTemplate($nedvigcategory, $tab){
        ob_start();
        include __DIR__ . '/menu_tpl/' . $this->tpl;
        return ob_get_clean();
    }

} 
