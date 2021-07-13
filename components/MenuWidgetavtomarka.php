<?php


namespace app\components;
use yii\base\Widget;
use app\modules\admin\models\Marka;
use Yii;

class MenuWidgetavtomarka extends Widget{

    public $tpl;
    public $model;
    public $data;
    public $tree;
    public $menuavtomarkaHtml;

    public function init(){
        parent::init();
        if( $this->tpl === null ){
            $this->tpl = 'menuavtomarka';
        }
        $this->tpl .= '.php';
    }

    public function run(){
        // get cache
        if($this->tpl == 'menuavtomarka.php'){
            $menu = Yii::$app->cache->get('menuavtomarka');
            if($menu) return $menu;
        }

        $this->data = marka::find()->indexBy('mark')->asArray()->all();
        $this->tree = $this->getTree();
        $this->menuavtomarkaHtml = $this->getMenuavtomarkaHtml($this->tree);
        // set cache
        if($this->tpl == 'menuavtomarka.php'){
            Yii::$app->cache->set('menuavtomarka', $this->menuviddomaHtml, 60);
        }
        return $this->menuavtomarkaHtml;
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

    protected function getMenuavtomarkaHtml($tree, $tab = ''){
        $str = '';
        foreach ($tree as $avtomarka) {
            $str .= $this->catToTemplate($avtomarka, $tab);
        }
        return $str;
    }

    protected function catToTemplate($avtomarka, $tab){
        ob_start();
        include __DIR__ . '/menu_tpl/' . $this->tpl;
        return ob_get_clean();
    }

} 





