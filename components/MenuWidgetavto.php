<?php


namespace app\components;
use yii\base\Widget;
use app\models\Avtocategory;
use Yii;

class MenuWidgetavto extends Widget{

    public $tpl;
    public $model;
    public $data;
    public $tree;
    public $menuavtoHtml;

    public function init(){
        parent::init();
        if( $this->tpl === null ){
            $this->tpl = 'menuavto';
        }
        $this->tpl .= '.php';
    }

    public function run(){
        // get cache
        if($this->tpl == 'menuavto.php'){
            $menu = Yii::$app->cache->get('menuavto');
            if($menu) return $menu;
        }

        $this->data = avtocategory::find()->indexBy('id')->asArray()->all();
        $this->tree = $this->getTree();
        $this->menuavtoHtml = $this->getMenuavtoHtml($this->tree);
        // set cache
        if($this->tpl == 'menuavto.php'){
            Yii::$app->cache->set('menuavto', $this->menuavtoHtml, 60);
        }
        return $this->menuavtoHtml;
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

    protected function getMenuavtoHtml($tree, $tab = ''){
        $str = '';
        foreach ($tree as $avtocategory) {
            $str .= $this->catToTemplate($avtocategory, $tab);
        }
        return $str;
    }

    protected function catToTemplate($avtocategory, $tab){
        ob_start();
        include __DIR__ . '/menu_tpl/' . $this->tpl;
        return ob_get_clean();
    }

} 

