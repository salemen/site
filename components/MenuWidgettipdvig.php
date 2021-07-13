<?php


namespace app\components;
use yii\base\Widget;
use app\modules\admin\models\Avtodvigatel;
use Yii;

class MenuWidgettipdvig extends Widget{

    public $tpl;
    public $model;
    public $data;
    public $tree;
    public $menutipdvigHtml;

    public function init(){
        parent::init();
        if( $this->tpl === null ){
            $this->tpl = 'menutipdvig';
        }
        $this->tpl .= '.php';
    }

    public function run(){
        // get cache
        if($this->tpl == 'menutipdvig.php'){
            $menu = Yii::$app->cache->get('menutipdvig');
            if($menu) return $menu;
        }

        $this->data = avtodvigatel::find()->indexBy('tip')->asArray()->all();
        $this->tree = $this->getTree();
        $this->menutipdvigHtml = $this->getMenutipdvigHtml($this->tree);
        // set cache
        if($this->tpl == 'menutipdvig.php'){
            Yii::$app->cache->set('menutipdvig', $this->menutipdvigHtml, 60);
        }
        return $this->menutipdvigHtml;
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

    protected function getMenutipdvigHtml($tree, $tab = ''){
        $str = '';
        foreach ($tree as $tipdvig) {
            $str .= $this->catToTemplate($tipdvig, $tab);
        }
        return $str;
    }

    protected function catToTemplate($tipdvig, $tab){
        ob_start();
        include __DIR__ . '/menu_tpl/' . $this->tpl;
        return ob_get_clean();
    }

} 





