<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public $incrementing = false;
    protected $guarded = [];

    public function files()
    {
        // return $this->hasMany(File::class,'filetable_id','id');
        return $this->morphMany(File::class, 'filetable');
    }
    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function projectLease()
    {
        return $this->hasOne(ProjectLease::class,'id','detail_id');
    }
    public function projectPurchase()
    {
        return $this->hasOne(ProjectPurchase::class,'id','detail_id');
    }
    public function projectConveyancing()
    {
        return $this->hasOne(ProjectConveyancing::class,'id','detail_id');
    }
    public function projectCapitalIncrease()
    {
        return $this->hasOne(ProjectCapitalIncrease::class,'id','detail_id');
    }
    public function projectTransferAsset()
    {
        return $this->hasOne(ProjectTransferAsset::class,'id','detail_id');
    }

    public function detail(){
        switch($this->type){
            case 'zczl':
                return $this->projectLease();
                break;
            case 'qycg':
                return $this->projectPurchase();
                break;
            case 'cqzr':
                return $this->ProjectConveyancing();
                break;
            case 'zzkg':
                return $this->ProjectCapitalIncrease();
                break;
            case 'zczr':
                return $this->projectTransferAsset();
                break;
            
        }
    }
    public function wtf(){
        $model = null;
        $model = $this->sellerInfo();
        // switch($this->type){
        //     case 'qycg':
        //         $model = $this->targetCompanyBaseInfo();
        //         break;
        //     case 'zczl':
        //         $model = $this->sellerInfo();
        //         break;
        //     case 'cqzr':
        //         $model = $this->sellerInfo();
        //         break;
        //     case 'zzkg':
        //         $model = $this->targetCompanyBaseInfo();
        //         break;
        //     case 'zczr':
        //         $model = $this->sellerInfo();
        //         break;
            
        // }
        return $model;
    }

    public function workProcessRecords(){
    	return $this->hasMany(WorkProcessRecord::class,'table_id','detail_id');
    }
    public function instance()
    {
        return $this->hasOne(WorkProcessInstance::class,'table_id','detail_id');
    }

    public function pbResults()
    {
        return $this->hasMany(PbResult::class);
    }
    public function intentionalParties()
    {
        return $this->hasMany(IntentionalParty::class);
    }
    public function transaction()
    {
        return $this->hasOne(Transaction::class);
    }

    public function transactionAnnouncement()
    {
        return $this->hasOne(TransactionAnnouncement::class);
    }

    public function winNotice()
    {
        return $this->hasOne(WinNotice::class);
    }

    public function paymentNotice()
    {
        return $this->hasOne(PaymentNotice::class);
    }

    public function transactionConfirmation()
    {
        return $this->hasOne(TransactionConfirmation::class);
    }
    public function contract()
    {
        return $this->hasOne(Contract::class);
    }

    public function bidResult()
    {
        return $this->hasOne(BidResult::class);
    }

    public function announcements()
    {
        return $this->hasMany(Announcement::class);
    }

    public function targetCompanyBaseInfo()
    {
        return $this->hasOne(TargetCompanyBaseInfo::class);
    }

    public function auditReports()
    {
        return $this->hasMany(AuditReport::class);
    }
    public function transactionMode()
    {
        return $this->hasOne(TransactionMode::class);
    }
    public function assetInfo()
    {
        return $this->hasOne(AssetInfo::class);
    }
    public function financialStatement()
    {
        return $this->hasOne(FinancialStatement::class);
    }
    public function assessment()
    {
        return $this->hasOne(Assessment::class);
    }
    public function sellerInfo()
    {
        return $this->hasOne(SellerInfo::class);
    }
    public function contact()
    {
        return $this->hasOne(Contact::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
