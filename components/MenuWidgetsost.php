<?php


namespace app\components;
use yii\base\Widget;
use app\modules\admin\models\Avtosostoyanie;
use Yii;

class MenuWidgetsost extends Widget{

    public $tpl;
    public $model;
    public $data;
    public $tree;
    public $menusostHtml;

    public function init(){
        parent::init();
        if( $this->tpl === null ){
            $this->tpl = 'menusost';
        }
        $this->tpl .= '.php';
    }

    public function run(){
        // get cache
        if($this->tpl == 'menusost.php'){
            $menu = Yii::$app->cache->get('menusost');
            if($menu) return $menu;
        }

        $this->data = avtosostoyanie::find()->indexBy('tip')->asArray()->all();
        $this->tree = $this->getTree();
        $this->menusostHtml = $this->getMenusostHtml($this->tree);
        // set cache
        if($this->tpl == 'menusost.php'){
            Yii::$app->cache->set('menusost', $this->menusostHtml, 60);
        }
        return $this->menusostHtml;
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

    protected function getMenusostHtml($tree, $tab = ''){
        $str = '';
        foreach ($tree as $sost) {
            $str .= $this->catToTemplate($sost, $tab);
        }
        return $str;
    }

    protected function catToTemplate($sost, $tab){
        ob_start();
        include __DIR__ . '/menu_tpl/' . $this->tpl;
        return ob_get_clean();
    }

} 
