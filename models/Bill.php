<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bill".
 *
 * @property int $id
 * @property int $total_price
 * @property string $bill_code
 * @property int $status 0: ko còn - 1 : báo giá - 2 : hủy - 3: đã bán
 * @property string $created_date
 * @property int $id_user
 *
 * @property User $user
 * @property BillDetail[] $billDetails
 */
class Bill extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bill';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['total_price', 'created_date', 'id_user'], 'required'],
            [['total_price', 'status', 'id_user'], 'integer'],
            [['created_date'], 'safe'],
            [['bill_code'], 'string', 'max' => 20],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_user' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'total_price' => 'Total Price',
            'bill_code' => 'Bill Code',
            'status' => '0: ko còn - 1 : báo giá - 2 : hủy - 3: đã bán',
            'created_date' => 'Created Date',
            'id_user' => 'Id User',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBillDetails()
    {
        return $this->hasMany(BillDetail::className(), ['id_bill' => 'id']);
    }
    public function createBill(){
        $model =  new Bill();
        $billdetail = new BillDetail();
        $format = "Y-m-d h:m:s";
        $model->attributes = array(
                                'total_price' => 0,
                                'bill_code' => $this->createBillCode(),
                                'status' => 1,
                                'created_date' => date($format),
                                'id_user' => $_SESSION['ID_USER'] );
        $model->save();
        //echo $model->id;

        $billdetail->createBillDetail($model->id);

    }

    public function createBillCode() { 
        $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ023456789"; 
        srand((double)microtime()*1000000); 
        $i = 0; 
        $pass = '' ; 
        while ($i <= 7) { 
            $num = rand() % 33; 
            $tmp = substr($chars, $num, 1); 
            $pass = $pass . $tmp; 
            $i++; 
        } 
        return $pass; 
    }
    
    public function showListBill(){
        try {
            if(isset($_SESSION['ID_USER'])){
                $listBill = Bill::find()->where(['id_user' => $_SESSION['ID_USER']])->all();
                foreach ($listBill as $key => $value) {
                    // echo $value->id;
                    if($value->status == 1 ){
                        ?>
                        <div class="bs-calltoaction bs-calltoaction-default">
                            <div class="row">
                                <div class="col-md-9 cta-contents">
                                    <h1 class="cta-title">Mã hoá đơn : <?php echo $value->bill_code; ?></h1>
                                    <div class="cta-desc">
                                        <p>Gía trị hoá đơn : <b><?php echo number_format($value->total_price) . " VNĐ"; ?> </b></p>
                                        <p>Thời gian tạo : <?php echo $value->created_date; ?>.</p>
                                        <p>Trạng thái <b>chờ xử lý.</b></p>
                                    </div>
                                </div>
                                <div class="col-md-3 cta-button">
                                    <a href="#" class="btn btn-lg btn-block btn-default">Xem chi tiết !</a>
                                </div>
                             </div>
                        </div>

                        <?php
                    }
                    if($value->status == 2 ){
                        ?>
                       <div class="bs-calltoaction bs-calltoaction-danger">
                            <div class="row">
                                <div class="col-md-9 cta-contents">
                                    <h1 class="cta-title">Mã hoá đơn : <?php echo $value->bill_code; ?></h1>
                                    <div class="cta-desc">
                                        <p>Gía trị hoá đơn : <b><?php echo number_format($value->total_price) . " VNĐ"; ?> </b></p>
                                        <p>Thời gian tạo : <?php echo $value->created_date; ?>.</p>
                                        <p>Trạng thái <b>đã huỷ.</b></p>
                                    </div>
                                </div>
                                <div class="col-md-3 cta-button">
                                    <a href="#" class="btn btn-lg btn-block btn-danger">Xem chi tiết !</a>
                                </div>
                             </div>
                        </div>

                        <?php
                    }

                    if($value->status == 3 ){
                        ?>
                       <div class="bs-calltoaction bs-calltoaction-primary">
                            <div class="row">
                                <div class="col-md-9 cta-contents">
                                    <h1 class="cta-title">Mã hoá đơn : <?php echo $value->bill_code; ?></h1>
                                    <div class="cta-desc">
                                        <p>Gía trị hoá đơn : <b><?php echo number_format($value->total_price) . " VNĐ"; ?> </b></p>
                                        <p>Thời gian tạo : <?php echo $value->created_date; ?>.</p>
                                        <p>Trạng thái <b>Hoàn thành.</b></p>
                                    </div>
                                </div>
                                <div class="col-md-3 cta-button">
                                    <a href="#" class="btn btn-lg btn-block btn-primary">Xem chi tiết !</a>
                                </div>
                             </div>
                        </div>

                        <?php
                    }

                }

            }
        } catch (Exception $e) {
            
        }
        
    }


}
