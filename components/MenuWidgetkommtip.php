<?php


namespace app\components;
use yii\base\Widget;
use app\modules\admin\models\Kommtip;
use Yii;

class MenuWidgetkommtip extends Widget{

    public $tpl;
    public $model;
    public $data;
    public $tree;
    public $menukommtipHtml;

    public function init(){
        parent::init();
        if( $this->tpl === null ){
            $this->tpl = 'menukommtip';
        }
        $this->tpl .= '.php';
    }

    public function run(){
        // get cache
        if($this->tpl == 'menukommtip.php'){
            $menu = Yii::$app->cache->get('menukommtip');
            if($menu) return $menu;
        }

        $this->data = kommtip::find()->indexBy('tip')->asArray()->all();
        $this->tree = $this->getTree();
        $this->menukommtipHtml = $this->getMenukommtipHtml($this->tree);
        // set cache
        if($this->tpl == 'menukommtip.php'){
            Yii::$app->cache->set('menukommtip', $this->menukommtipHtml, 60);
        }
        return $this->menukommtipHtml;
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

    protected function getMenukommtipHtml($tree, $tab = ''){
        $str = '';
        foreach ($tree as $kommtip) {
            $str .= $this->catToTemplate($kommtip, $tab);
        }
        return $str;
    }

    protected function catToTemplate($kommtip, $tab){
        ob_start();
        include __DIR__ . '/menu_tpl/' . $this->tpl;
        return ob_get_clean();
    }

} 







