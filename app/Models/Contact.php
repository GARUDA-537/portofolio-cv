<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'name',
        'email',
        'subject',
        'message',
        'attachment_path',
        'attachment_original_name',
        'is_read',
        'replied',
        'replied_at',
    ];

    protected $casts = [
        'replied_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function markAsRead()
    {
        $this->update(['is_read' => true]);
    }

    public function markAsReplied()
    {
        $this->update([
            'replied' => true,
            'replied_at' => now(),
        ]);
    }

    public function getAttachmentDownloadUrl()
    {
        if ($this->attachment_path) {
            return route('contact.download-attachment', $this->id);
        }
        return null;
    }
}
