<?php


namespace app\components;
use yii\base\Widget;
use app\modules\admin\models\Avtogod;
use Yii;

class MenuWidgetgod extends Widget{

    public $tpl;
    public $model;
    public $data;
    public $tree;
    public $menugodHtml;

    public function init(){
        parent::init();
        if( $this->tpl === null ){
            $this->tpl = 'menugod';
        }
        $this->tpl .= '.php';
    }

    public function run(){
        // get cache
        if($this->tpl == 'menugod.php'){
            $menu = Yii::$app->cache->get('menugod');
            if($menu) return $menu;
        }

        $this->data = avtogod::find()->indexBy('tip')->asArray()->all();
        $this->tree = $this->getTree();
        $this->menugodHtml = $this->getMenugodHtml($this->tree);
        // set cache
        if($this->tpl == 'menugod.php'){
            Yii::$app->cache->set('menugod', $this->menugodHtml, 60);
        }
        return $this->menugodHtml;
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

    protected function getMenugodHtml($tree, $tab = ''){
        $str = '';
        foreach ($tree as $god) {
            $str .= $this->catToTemplate($god, $tab);
        }
        return $str;
    }

    protected function catToTemplate($god, $tab){
        ob_start();
        include __DIR__ . '/menu_tpl/' . $this->tpl;
        return ob_get_clean();
    }

} 
