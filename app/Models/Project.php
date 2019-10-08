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

    public function detail(){
        if($this->type === 'zczl'){
            return $this->projectLease();
        }
        else{
            return $this->projectPurchase();
        }
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
}
