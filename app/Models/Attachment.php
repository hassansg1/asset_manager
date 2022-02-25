<?php

namespace App\Models;

use App\Http\Traits\ParentTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    use HasFactory;
    use ParentTrait;

    public $rules =
        [
            'title' => 'required',
        ];

    /**
     * @param $item
     * @param $request
     * @return mixed
     */
    public function saveFormData($item, $request)
    {

        if (isset($request->documentNumber)) $item->documentNumber = $request->documentNumber;
        if (isset($request->version)) $item->version = $request->version;
        if (isset($request->date)) $item->date = $request->date;
        if (isset($request->title)) $item->title = $request->title;
        if (isset($request->description)) $item->description = $request->description;
        if (isset($request->category)) $item->category = $request->category;
        if (isset($request->subCategory)) $item->subCategory = $request->subCategory;
        $item->save();
        $images= $request->file('files');
        if($item && $images){
            AttachmentItem::where('attachment_id',$item->id)->delete();
            foreach ($images as $image) {
                $imageName = $image->getClientOriginalName();
                $name = time() . $imageName;
                $image->move(public_path('images/attachment'), $name);
                $attachmentItem = new AttachmentItem();
                $attachmentItem->attachment_id = $item->id;
                $attachmentItem->fileName = $name;
                $attachmentItem->save();
            }
        }
        return $item;
    }
    public function attachmentItems(){
        return $this->hasMany(AttachmentItem::class,'attachment_id');
    }
    public function attachmentId(){
        return $this->belongsTo(ComplianceVersionItemAttachment::class,'id', 'attachment_id');
    }
}
