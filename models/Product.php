<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string $code
 * @property string $name
 * @property int $price
 * @property int $gender 0: nữ - 1: nam
 * @property string $created_date
 * @property string $list_color
 * @property int $status 0: không bán - 1: mới - 2 : bình thường
 * @property int $id_type
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    //public $link;
    
    public static function tableName()
    {
        return 'product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code', 'name', 'price', 'gender', 'created_date', 'list_color', 'id_type'], 'required'],
            [['price', 'gender', 'status', 'id_type','id_discount'], 'integer'],
            [['created_date'], 'safe'],
            [['code'], 'string', 'max' => 20],
            [['name', 'list_color'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'code' => Yii::t('app', 'Mã sản phẩm'),
            'name' => Yii::t('app', 'Tên sản phẩm'),
            'price' => Yii::t('app', 'Giá'),
            'gender' => Yii::t('app', 'Giới tình'),
            'created_date' => Yii::t('app', 'thời gian tao'),
            'list_color' => Yii::t('app', 'Màu sắc'),
            'status' => Yii::t('app', 'Trạng thái'),
            'id_type' => Yii::t('app', 'Loại'),
            'id_discount' => Yii::t('app', 'Giảm giá'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBillDetails()
    {
        return $this->hasMany(BillDetail::className(), ['id_product' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDiscountProducts()
    {
        //return $this->hasMany(DiscountProduct::className(), ['id_product' => 'id']);
             return DiscountProduct::findOne($this->id_discount);
    }

    public function getDiscountProductsDiscount()
    {   
        $discount =DiscountProduct::findOne($this->id_discount);
         if($discount  ){
            return $discount->discount;
         } 
         return '' ;
    }

    public function getDiscountProductsInfo()
    {   
        $discount =DiscountProduct::findOne($this->id_discount);
         if($discount  ){
            return $discount->info;
         } 
         return '' ;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImageProducts()
    {
        return $this->hasMany(ImageProduct::className(), ['id_product' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getType()
    {
        return $this->hasOne(Type::className(), ['id' => 'id_type']);
    }
    
    public function getRender()
    {
        return $arrayName = array('0'=>'Nữ',
                                    '1'=>'Nam',);
    }

    public function getArrayStatus()
    {
        return $arayName = array('0'=>'Không bán',
                                    '1'=>'Mới',
                                    '2'=>'Bình thường');
    }
    
    public function formatSave(){
        $format = "Y-m-d h:m:s";
        $this->created_date = date($format);
    }

    public function getArrayProduct(){
        $variable = Product::find()->all();
        $result = [];
        foreach ($variable as $key ) {
            $result[$key->id] =  $key->code . " : ". $key->name  ; 
        }
        return $result;
    }

    public function showProduct(){
        $variable = Product::find()->all();
        return $variable;
    }
    public function showImage($id){
        $modelImage = ImageProduct::find()->where(['id_product' => $id])->all();
        $Image = (array)$modelImage[0]->attributes;
        return $Image['link'];
    }

    public function getTypeById($id){
        return Type::findOne($id);
    }

    public function showSelectSizeByType($id){
        try {
            $model = Type::findOne($id);
            if(!empty($model)){
                for ($i= $model->size_form; $i <= $model->size_to ; $i++) { 
                    ?>
                        <option><?php echo $i;?></option>
                    <?php
                }
            }
        } catch (Exception $e) {
            echo $e;
        }
        
    }

    public function getBasket(){
        
       // echo "<pre>";
       //  print_r(json_encode($_SESSION['basket']));
       //  echo "</pre>";
       //  die;
        
        if(isset($_SESSION['basket'])){
            $aBasket = $_SESSION['basket'];
            $aResult = $this->convertArrayBasket($aBasket);
            echo json_encode($aResult);
        }

        //printf($_SESSION['basket']);
        //return $this->getType()->name;
    }
    public function getProductName($id){
        echo Product::findIdentity($id)->name;
    }
    public function convertArrayBasket($aBasket){
        $aResult = array();
        foreach ($aBasket as $key => $value) {
            $aResult[] = ['id' => $key, 
                        'amount' => $value];
        }
        return $aResult;
    }

    public function getProductById($id){
        return Product::findOne(['id' => $id]);
    }

    public function showProductOnBasket(){
        $product = new Product();
        if(isset($_SESSION['basket'])){
            $aBasket = $_SESSION['basket'];
            foreach ($aBasket as $key => $value) {
                 $product = Product::findOne(['id' => $aBasket[$key]['id']]);
                ?>
                <tr id="<?php echo $key."tr"; ?>"  class="cotsanpham">
                    <td class="col-sm-8 col-md-6">
                    <div class="media">
                        <a class="thumbnail pull-left" href="#"> <img class="media-object" src="../../images/product-images/<?php echo $product->showImage($value['id']) ?> " style="width: 72px; height: 72px;"> </a>
                        <div class="media-body">
                            <h4 class="media-heading"><a href="#"><?php echo $product->name; ?></a></h4>
                            <h5 class="media-heading"> Size <a href="#"><?php echo $aBasket[$key]['size']; ?></a></h5>
                            <span>Khuyến mãi: </span>
                            <span class="text-success">
                                <strong>
                                    <?php echo $product->getDiscountProductsDiscount() . "%"; ?>
                                </strong>
                                <?php echo $product->getDiscountProductsInfo(); ?>
                            </span>
                        </div>
                    </div></td>
                    <td class="col-sm-1 col-md-1" style="text-align: center">
                    <input type="id" name="id" class="form-control" style="display: none;" id="exampleInputEmail1" value="<?php echo $value['id']; ?>">
                    <input type="number" name="soluong" onchange="changeNumber(this.value,<?php echo $key; ?>,<?php echo $product->price; ?>,<?php echo $product->getDiscountProductsDiscount(); ?>)" class="form-control" min="1" id="exampleInputEmail1" value="<?php echo $value['amount']; ?>">
                    </td>
                    <td class="col-sm-1 col-md-1 text-center"><strong><?= number_format($product->price) ?> VNĐ</strong></td>
                    <td class="col-sm-1 col-md-1 text-center"><strong  id="<?php echo $key."thanhtien"; ?>"><?= number_format($product->price * $value['amount'] * (100 - $product->getDiscountProductsDiscount()) /100 ) ?> VNĐ</strong>

                        <p id="<?php echo $key."thanhtienan"; ?>" style="display: none;"><?= $product->price * $value['amount'] * (100 - $product->getDiscountProductsDiscount()) /100 ?></p>
                    </td>
                    <td class="col-sm-1 col-md-1">
                    <button type="button" class="btn btn-danger" onclick="removeTr(<?php echo $key; ?>)">
                        <span class="glyphicon glyphicon-remove" ></span> Xoá sản phẩm
                    </button></td>
                </tr>
                <?php
            }
        }
    }

    public function showProductHeaderByIdType($id_type){
        $product =Product::find()->where(['id_type'=>$id_type])->all();
        $count = 4;
        foreach ($product as $key => $value) {
            $count --;
            $duct = new Product();
            if($count < 0)
            {
                break;
            }
            ?>
            <li>
                <a href="<?php echo Yii::$app->request->baseUrl.'/main/detail?id='. $value->id ; ?>" >
                    <img src="../../images/product-images/<?php echo $duct->showImage($value->id) ?> "  alt="img01"><h4><?= $value->name ?></h4>
                </a>
            </li>
            <?php
        }
    }
}
?>