<?php


namespace app\components;
use yii\base\Widget;
use app\models\Avtomototip;
use Yii;

class MenuWidgetavtomototip extends Widget{

    public $tpl;
    public $model;
    public $data;
    public $tree;
    public $menuavtomototipHtml;

    public function init(){
        parent::init();
        if( $this->tpl === null ){
            $this->tpl = 'menuavtomototip';
        }
        $this->tpl .= '.php';
    }

    public function run(){
        // get cache
        if($this->tpl == 'menuavtomototip.php'){
            $menu = Yii::$app->cache->get('menuavtomototip');
            if($menu) return $menu;
        }

        $this->data = avtomototip::find()->indexBy('tip')->asArray()->all();
        $this->tree = $this->getTree();
        $this->menuavtomototipHtml = $this->getmenuavtomototipHtml($this->tree);
        // set cache
        if($this->tpl == 'menuavtomototip.php'){
            Yii::$app->cache->set('menuavtomototip', $this->menuavtomototipHtml, 60);
        }
        return $this->menuavtomototipHtml;
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

    protected function getmenuavtomototipHtml($tree, $tab = ''){
        $str = '';
        foreach ($tree as $avtomototip) {
            $str .= $this->catToTemplate($avtomototip, $tab);
        }
        return $str;
    }

    protected function catToTemplate($avtomototip, $tab){
        ob_start();
        include __DIR__ . '/menu_tpl/' . $this->tpl;
        return ob_get_clean();
    }

} 

