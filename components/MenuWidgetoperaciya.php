<?php


namespace app\components;
use yii\base\Widget;
use \app\modules\admin\models\Operaciya;
use Yii;

class MenuWidgetoperaciya extends Widget{

    public $tpl;
    public $model;
    public $data;
    public $tree;
    public $menuoperaciyaHtml;

    public function init(){
        parent::init();
        if( $this->tpl === null ){
            $this->tpl = 'menuoperaciya';
        }
        $this->tpl .= '.php';
    }

    public function run(){
        // get cache
        if($this->tpl == 'menuoperaciya.php'){
            $menu = Yii::$app->cache->get('menuoperaciya');
            if($menu) return $menu;
        }

        $this->data = operaciya::find()->indexBy('tip')->asArray()->all();
        $this->tree = $this->getTree();
        $this->menuoperaciyaHtml = $this->getMenuoperaciyaHtml($this->tree);
        // set cache
        if($this->tpl == 'menuoperaciya.php'){
            Yii::$app->cache->set('menuoperaciya', $this->menuoperaciyaHtml, 60);
        }
        return $this->menuoperaciyaHtml;
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

    protected function getMenuoperaciyaHtml($tree, $tab = ''){
        $str = '';
        foreach ($tree as $operaciya) {
            $str .= $this->catToTemplate($operaciya, $tab);
        }
        return $str;
    }

    protected function catToTemplate($operaciya, $tab){
        ob_start();
        include __DIR__ . '/menu_tpl/' . $this->tpl;
        return ob_get_clean();
    }

} 

