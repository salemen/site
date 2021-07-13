<?php


namespace app\components;
use yii\base\Widget;
use app\modules\admin\models\Vidnedvig;
use Yii;

class MenuWidgetvidnedvig extends Widget{

    public $tpl;
    public $model;
    public $data;
    public $tree;
    public $menuvidnedvigHtml;

    public function init(){
        parent::init();
        if( $this->tpl === null ){
            $this->tpl = 'menuvidnedvig';
        }
        $this->tpl .= '.php';
    }

    public function run(){
        // get cache
        if($this->tpl == 'menuvidnedvig.php'){
            $menu = Yii::$app->cache->get('menuvidnedvig');
            if($menu) return $menu;
        }

        $this->data = vidnedvig::find()->indexBy('vid')->asArray()->all();
        $this->tree = $this->getTree();
        $this->menuvidnedvigHtml = $this->getMenuvidnedvigHtml($this->tree);
        // set cache
        if($this->tpl == 'menuvidnedvig.php'){
            Yii::$app->cache->set('menuvidnedvig', $this->menuvidnedvigHtml, 60);
        }
        return $this->menuvidnedvigHtml;
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

    protected function getMenuvidnedvigHtml($tree, $tab = ''){
        $str = '';
        foreach ($tree as $vidnedvig) {
            $str .= $this->catToTemplate($vidnedvig, $tab);
        }
        return $str;
    }

    protected function catToTemplate($vidnedvig, $tab){
        ob_start();
        include __DIR__ . '/menu_tpl/' . $this->tpl;
        return ob_get_clean();
    }

} 





