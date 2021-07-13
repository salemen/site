<?php


namespace app\components;
use yii\base\Widget;
use app\modules\admin\models\Raion;
use Yii;

class MenuWidgetraion extends Widget{

    public $tpl;
    public $model;
    public $data;
    public $tree;
    public $menuraionHtml;

    public function init(){
        parent::init();
        if( $this->tpl === null ){
            $this->tpl = 'menuraion';
        }
        $this->tpl .= '.php';
    }

    public function run(){
        // get cache
        if($this->tpl == 'menuraion.php'){
            $menu = Yii::$app->cache->get('menuraion');
            if($menu) return $menu;
        }

        $this->data = raion::find()->indexBy('id')->asArray()->all();
        $this->tree = $this->getTree();
        $this->menuraionHtml = $this->getMenuraionHtml($this->tree);
        // set cache
        if($this->tpl == 'menuraion.php'){
            Yii::$app->cache->set('menuraion', $this->menuraionHtml, 60);
        }
        return $this->menuraionHtml;
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

    protected function getMenuraionHtml($tree, $tab = ''){
        $str = '';
        foreach ($tree as $raion) {
            $str .= $this->catToTemplate($raion, $tab);
        }
        return $str;
    }

    protected function catToTemplate($raion, $tab){
        ob_start();
        include __DIR__ . '/menu_tpl/' . $this->tpl;
        return ob_get_clean();
    }

} 



