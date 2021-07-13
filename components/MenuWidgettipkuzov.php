<?php


namespace app\components;
use yii\base\Widget;
use app\modules\admin\models\Avtokuzov;
use Yii;

class MenuWidgettipkuzov extends Widget{

    public $tpl;
    public $model;
    public $data;
    public $tree;
    public $menutipkuzovHtml;

    public function init(){
        parent::init();
        if( $this->tpl === null ){
            $this->tpl = 'menutipkuzov';
        }
        $this->tpl .= '.php';
    }

    public function run(){
        // get cache
        if($this->tpl == 'menutipkuzov.php'){
            $menu = Yii::$app->cache->get('menutipkuzov');
            if($menu) return $menu;
        }

        $this->data = avtokuzov::find()->indexBy('tip')->asArray()->all();
        $this->tree = $this->getTree();
        $this->menutipkuzovHtml = $this->getMenutipkuzovHtml($this->tree);
        // set cache
        if($this->tpl == 'menutipkuzov.php'){
            Yii::$app->cache->set('menutipkuzov', $this->menutipkuzovHtml, 60);
        }
        return $this->menutipkuzovHtml;
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

    protected function getMenutipkuzovHtml($tree, $tab = ''){
        $str = '';
        foreach ($tree as $tipkuzov) {
            $str .= $this->catToTemplate($tipkuzov, $tab);
        }
        return $str;
    }

    protected function catToTemplate($tipkuzov, $tab){
        ob_start();
        include __DIR__ . '/menu_tpl/' . $this->tpl;
        return ob_get_clean();
    }

} 





