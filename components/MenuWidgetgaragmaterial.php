<?php


namespace app\components;
use yii\base\Widget;
use app\modules\admin\models\Garagimaterial;
use Yii;

class MenuWidgetgaragmaterial extends Widget{

    public $tpl;
    public $model;
    public $data;
    public $tree;
    public $menugaragmaterialHtml;

    public function init(){
        parent::init();
        if( $this->tpl === null ){
            $this->tpl = 'menugaragmaterial';
        }
        $this->tpl .= '.php';
    }

    public function run(){
        // get cache
        if($this->tpl == 'menugaragmaterial.php'){
            $menu = Yii::$app->cache->get('menugaragmaterial');
            if($menu) return $menu;
        }

        $this->data = garagimaterial::find()->indexBy('tip')->asArray()->all();
        $this->tree = $this->getTree();
        $this->menugaragmaterialHtml = $this->getMenugaragmaterialHtml($this->tree);
        // set cache
        if($this->tpl == 'menugaragmaterial.php'){
            Yii::$app->cache->set('menugaragmaterial', $this->menugaragmaterialHtml, 60);
        }
        return $this->menugaragmaterialHtml;
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

    protected function getMenugaragmaterialHtml($tree, $tab = ''){
        $str = '';
        foreach ($tree as $garagmaterial) {
            $str .= $this->catToTemplate($garagmaterial, $tab);
        }
        return $str;
    }

    protected function catToTemplate($garagmaterial, $tab){
        ob_start();
        include __DIR__ . '/menu_tpl/' . $this->tpl;
        return ob_get_clean();
    }

} 



