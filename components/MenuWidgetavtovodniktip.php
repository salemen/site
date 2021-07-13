<?php


namespace app\components;
use yii\base\Widget;
use app\models\Avtovodniktip;
use Yii;

class MenuWidgetavtovodniktip extends Widget{

    public $tpl;
    public $model;
    public $data;
    public $tree;
    public $menuavtovodniktipHtml;

    public function init(){
        parent::init();
        if( $this->tpl === null ){
            $this->tpl = 'menuavtovodniktip';
        }
        $this->tpl .= '.php';
    }

    public function run(){
        // get cache
        if($this->tpl == 'menuavtovodniktip.php'){
            $menu = Yii::$app->cache->get('menuavtovodniktip');
            if($menu) return $menu;
        }

        $this->data = avtovodniktip::find()->indexBy('tip')->asArray()->all();
        $this->tree = $this->getTree();
        $this->menuavtovodniktipHtml = $this->getmenuavtovodniktipHtml($this->tree);
        // set cache
        if($this->tpl == 'menuavtovodniktip.php'){
            Yii::$app->cache->set('menuavtovodniktip', $this->menuavtovodniktipHtml, 60);
        }
        return $this->menuavtovodniktipHtml;
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

    protected function getmenuavtovodniktipHtml($tree, $tab = ''){
        $str = '';
        foreach ($tree as $avtovodniktip) {
            $str .= $this->catToTemplate($avtovodniktip, $tab);
        }
        return $str;
    }

    protected function catToTemplate($avtovodniktip, $tab){
        ob_start();
        include __DIR__ . '/menu_tpl/' . $this->tpl;
        return ob_get_clean();
    }

} 

