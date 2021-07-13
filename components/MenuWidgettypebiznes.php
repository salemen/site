<?php


namespace app\components;
use yii\base\Widget;
use app\modules\admin\models\Typebiznes;
use Yii;

class MenuWidgettypebiznes extends Widget{

    public $tpl;
    public $model;
    public $data;
    public $tree;
    public $menutypebiznesHtml;

    public function init(){
        parent::init();
        if( $this->tpl === null ){
            $this->tpl = 'menuochrana';
        }
        $this->tpl .= '.php';
    }

    public function run(){
        // get cache
        if($this->tpl == 'menutypebiznes.php'){
            $menu = Yii::$app->cache->get('menutypebiznes');
            if($menu) return $menu;
        }

        $this->data = typebiznes::find()->indexBy('type')->asArray()->all();
        $this->tree = $this->getTree();
        $this->menutypebiznesHtml = $this->getMenutypebiznesHtml($this->tree);
        // set cache
        if($this->tpl == 'menutypebiznes.php'){
            Yii::$app->cache->set('menutypebiznes', $this->menutypebiznesHtml, 60);
        }
        return $this->menutypebiznesHtml;
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

    protected function getMenutypebiznesHtml($tree, $tab = ''){
        $str = '';
        foreach ($tree as $typebiznes) {
            $str .= $this->catToTemplate($typebiznes, $tab);
        }
        return $str;
    }

    protected function catToTemplate($typebiznes, $tab){
        ob_start();
        include __DIR__ . '/menu_tpl/' . $this->tpl;
        return ob_get_clean();
    }

} 





