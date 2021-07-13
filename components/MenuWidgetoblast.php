<?php


namespace app\components;
use yii\base\Widget;
use app\models\Oblast;
use Yii;

class MenuWidgetoblast extends Widget{

    public $tpl;
    public $model;
    public $data;
    public $tree;
    public $menuoblastHtml;

    public function init(){
        parent::init();
        if( $this->tpl === null ){
            $this->tpl = 'menuoblast';
        }
        $this->tpl .= '.php';
    }

    public function run(){
        // get cache
        if($this->tpl == 'menuoblast.php'){
            $menu = Yii::$app->cache->get('menuoblast');
            if ($menu) 
                 return $menu;
         }

        $this->data = oblast::find()->indexBy('id')->asArray()->all();
        $this->tree = $this->getTree();
        $this->menuoblastHtml = $this->getMenuoblastHtml($this->tree);
        // set cache
        if($this->tpl == 'menuoblast.php'){
            Yii::$app->cache->set('menuoblast', $this->menuoblastHtml, 60);
        }
        return $this->menuoblastHtml;
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

    protected function getMenuoblastHtml($tree, $tab = ''){
        $str = '';
        foreach ($tree as $oblast) {
            $str .= $this->catToTemplate($oblast, $tab);
        }
        return $str;
    }

    protected function catToTemplate($oblast, $tab){
        ob_start();
        include __DIR__ . '/menu_tpl/' . $this->tpl;
        return ob_get_clean();
    }

} 

