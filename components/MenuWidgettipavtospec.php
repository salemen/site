<?php


namespace app\components;
use yii\base\Widget;
use app\models\Avtospectip;
use Yii;

class MenuWidgettipavtospec extends Widget{

    public $tpl;
    public $model;
    public $data;
    public $tree;
    public $menuavtospectipHtml;

    public function init(){
        parent::init();
        if( $this->tpl === null ){
            $this->tpl = 'menuavtospectip';
        }
        $this->tpl .= '.php';
    }

    public function run(){
        // get cache
        if($this->tpl == 'menuavtospectip.php'){
            $menu = Yii::$app->cache->get('menuavtospectip');
            if($menu) return $menu;
        }

        $this->data = avtospectip::find()->indexBy('type')->asArray()->all();
        $this->tree = $this->getTree();
        $this->menuavtospectipHtml = $this->getMenuavtospectipHtml($this->tree);
        // set cache
        if($this->tpl == 'menuavtospectip.php'){
            Yii::$app->cache->set('menuavtospectip', $this->menuavtospectipHtml, 60);
        }
        return $this->menuavtospectipHtml;
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

    protected function getMenuavtospectipHtml($tree, $tab = ''){
        $str = '';
        foreach ($tree as $avtospectip) {
            $str .= $this->catToTemplate($avtospectip, $tab);
        }
        return $str;
    }

    protected function catToTemplate($avtospectip, $tab){
        ob_start();
        include __DIR__ . '/menu_tpl/' . $this->tpl;
        return ob_get_clean();
    }

} 

