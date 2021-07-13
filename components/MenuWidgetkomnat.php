<?php


namespace app\components;
use yii\base\Widget;
use app\modules\admin\models\KolichestvoKomnat;
use Yii;

class MenuWidgetkomnat extends Widget{

    public $tpl;
    public $model;
    public $data;
    public $tree;
    public $menukomnatHtml;

    public function init(){
        parent::init();
        if( $this->tpl === null ){
            $this->tpl = 'menukomnat';
        }
        $this->tpl .= '.php';
    }

    public function run(){
        // get cache
        if($this->tpl == 'menukomnat.php'){
            $menu = Yii::$app->cache->get('menukomnat');
            if($menu) return $menu;
        }

        $this->data = kolichestvokomnat::find()->indexBy('number')->asArray()->all();
        $this->tree = $this->getTree();
        $this->menukomnatHtml = $this->getMenukomnatHtml($this->tree);
        // set cache
        if($this->tpl == 'menukomnat.php'){
            Yii::$app->cache->set('menukomnat', $this->menukomnatHtml, 60);
        }
        return $this->menukomnatHtml;
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

    protected function getMenukomnatHtml($tree, $tab = ''){
        $str = '';
        foreach ($tree as $kolichestvo_komnat) {
            $str .= $this->catToTemplate($kolichestvo_komnat, $tab);
        }
        return $str;
    }

    protected function catToTemplate($kolichestvo_komnat, $tab){
        ob_start();
        include __DIR__ . '/menu_tpl/' . $this->tpl;
        return ob_get_clean();
    }

} 
