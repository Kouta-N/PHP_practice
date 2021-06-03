<?php

//親クラス（基底クラス、スーパークラス）
class BaseProduct{
  //変数、関数を継承可能
  public function echoProduct(){
    echo '親クラスです';
  }

  //オーバーライド（上書き）
  public function getProduct(){
    echo '親の関数です';
  }
}

//子クラス(派生クラス、サブクラス)
class Product extends BaseProduct{
  //アクセス修飾子,private(外からアクセスできない),protected(自分と継承したクラス)

  //変数
  private $product = [];

  //関数

  function __construct($product){

    $this->product = $product;
  }

  //名前が同じなら子クラスが優先される
  public function getProduct(){
    echo $this->product;
  }

  public function addProduct($item){
    $this->product .= $item;
  }

  public static function getStaticProduct($str){
    echo $str;
  }

}

$instance = new Product('テスト');

// var_dump($instance);

$instance->getProduct();
echo '<br>';

// 親クラスのメソッド
$instance->echoProduct();
echo '<br>';

$instance->addProduct('追加分');
echo '<br>';

$instance->getProduct();
echo '<br>';

Product::getStaticProduct('静的');
echo '<br>';