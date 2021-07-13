<?php


namespace app\components;
use yii\base\Widget;
use app\models\Avtokomplekttip;
use Yii;

class MenuWidgetavtokomplekttip extends Widget{

    public $tpl;
    public $model;
    public $data;
    public $tree;
    public $menuavtokomplekttipHtml;

    public function init(){
        parent::init();
        if( $this->tpl === null ){
            $this->tpl = 'menuavtokomplekttip';
        }
        $this->tpl .= '.php';
    }

    public function run(){
        // get cache
        if($this->tpl == 'menuavtokomplekttip.php'){
            $menu = Yii::$app->cache->get('menuavtokomplekttip');
            if($menu) return $menu;
        }

        $this->data = avtokomplekttip::find()->indexBy('tip')->asArray()->all();
        $this->tree = $this->getTree();
        $this->menuavtokomplekttipHtml = $this->getmenuavtokomplekttipHtml($this->tree);
        // set cache
        if($this->tpl == 'menuavtokomplekttip.php'){
            Yii::$app->cache->set('menuavtokomplekttip', $this->menuavtokomplekttipHtml, 60);
        }
        return $this->menuavtokomplekttipHtml;
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

    protected function getmenuavtokomplekttipHtml($tree, $tab = ''){
        $str = '';
        foreach ($tree as $avtokomplekttip) {
            $str .= $this->catToTemplate($avtokomplekttip, $tab);
        }
        return $str;
    }

    protected function catToTemplate($avtokomplekttip, $tab){
        ob_start();
        include __DIR__ . '/menu_tpl/' . $this->tpl;
        return ob_get_clean();
    }

} 

