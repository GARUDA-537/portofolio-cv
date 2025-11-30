<?php

/**
 * Helper Script untuk Testing Fitur Email
 * 
 * Usage: 
 * php artisan tinker
 * >>> include 'EMAIL_TESTING_HELPER.php'
 * >>> testSendEmail()
 * >>> checkDatabase()
 * dll
 */

// ==================================================================
// 1. TEST: Kirim Email Test
// ==================================================================

function testSendEmail() {
    echo "📧 Testing Email Send...\n";
    
    $testData = [
        'name' => 'Test User',
        'email' => 'test@example.com',
        'subject' => 'Test Email from Helper',
        'message' => 'Ini adalah email test dari helper script',
        'attachment_path' => null,
        'attachment_original_name' => null,
    ];
    
    try {
        // Send to admin
        \Illuminate\Support\Facades\Mail::to(config('mail.from.address'))
            ->send(new \App\Mail\ContactMail($testData));
        
        echo "✓ Email to admin sent successfully!\n";
        
        // Send auto-reply
        \Illuminate\Support\Facades\Mail::to($testData['email'])
            ->send(new \App\Mail\ContactAutoReplyMail($testData));
        
        echo "✓ Auto-reply sent successfully!\n";
        echo "Check your email inbox for both emails!\n";
        
    } catch (\Exception $e) {
        echo "✗ Error: " . $e->getMessage() . "\n";
    }
}

// ==================================================================
// 2. CHECK: Database Contents
// ==================================================================

function checkDatabase() {
    echo "\n📊 Database Contacts:\n";
    echo str_repeat("=", 80) . "\n";
    
    $contacts = \App\Models\Contact::all();
    
    if ($contacts->isEmpty()) {
        echo "No contacts found yet.\n";
        return;
    }
    
    foreach ($contacts as $contact) {
        echo "\n ID: {$contact->id}\n";
        echo " Name: {$contact->name}\n";
        echo " Email: {$contact->email}\n";
        echo " Subject: {$contact->subject}\n";
        echo " Message: " . substr($contact->message, 0, 50) . "...\n";
        echo " Attachment: " . ($contact->attachment_path ? '✓ Yes' : '✗ No') . "\n";
        echo " Is Read: " . ($contact->is_read ? '✓ Yes' : '✗ No') . "\n";
        echo " Replied: " . ($contact->replied ? '✓ Yes' : '✗ No') . "\n";
        echo " Created: " . $contact->created_at . "\n";
        echo str_repeat("-", 80) . "\n";
    }
}

// ==================================================================
// 3. CHECK: Unread Messages
// ==================================================================

function checkUnreadMessages() {
    echo "\n📬 Unread Messages:\n";
    echo str_repeat("=", 80) . "\n";
    
    $unread = \App\Models\Contact::where('is_read', false)->get();
    
    echo "Total: {$unread->count()} unread messages\n";
    
    foreach ($unread as $msg) {
        echo "\n From: {$msg->name} <{$msg->email}>\n";
        echo " Subject: {$msg->subject}\n";
        echo " Received: " . $msg->created_at . "\n";
    }
}

// ==================================================================
// 4. CHECK: Unreplied Messages
// ==================================================================

function checkUnrepliedMessages() {
    echo "\n📭 Unreplied Messages:\n";
    echo str_repeat("=", 80) . "\n";
    
    $unreplied = \App\Models\Contact::where('replied', false)->get();
    
    echo "Total: {$unreplied->count()} messages waiting for reply\n";
    
    foreach ($unreplied as $msg) {
        echo "\n From: {$msg->name} <{$msg->email}>\n";
        echo " Subject: {$msg->subject}\n";
        echo " Days ago: " . $msg->created_at->diffInDays() . " days\n";
    }
}

// ==================================================================
// 5. ACTION: Mark Message as Read
// ==================================================================

function markAsRead($contactId) {
    echo "\n✏️ Marking message as read...\n";
    
    $contact = \App\Models\Contact::find($contactId);
    
    if (!$contact) {
        echo "✗ Message not found!\n";
        return;
    }
    
    $contact->markAsRead();
    echo "✓ Message {$contactId} marked as read!\n";
}

// ==================================================================
// 6. ACTION: Mark Message as Replied
// ==================================================================

function markAsReplied($contactId) {
    echo "\n✏️ Marking message as replied...\n";
    
    $contact = \App\Models\Contact::find($contactId);
    
    if (!$contact) {
        echo "✗ Message not found!\n";
        return;
    }
    
    $contact->markAsReplied();
    echo "✓ Message {$contactId} marked as replied!\n";
}

// ==================================================================
// 7. STAT: Get Statistics
// ==================================================================

function getStatistics() {
    echo "\n📈 Email Statistics:\n";
    echo str_repeat("=", 80) . "\n";
    
    $total = \App\Models\Contact::count();
    $unread = \App\Models\Contact::where('is_read', false)->count();
    $read = \App\Models\Contact::where('is_read', true)->count();
    $unreplied = \App\Models\Contact::where('replied', false)->count();
    $replied = \App\Models\Contact::where('replied', true)->count();
    $withAttachment = \App\Models\Contact::whereNotNull('attachment_path')->count();
    
    echo " Total Messages: {$total}\n";
    echo " ├─ Unread: {$unread}\n";
    echo " └─ Read: {$read}\n";
    echo "\n";
    echo " Replies:\n";
    echo " ├─ Unreplied: {$unreplied}\n";
    echo " └─ Replied: {$replied}\n";
    echo "\n";
    echo " With Attachment: {$withAttachment}\n";
    echo str_repeat("=", 80) . "\n";
}

// ==================================================================
// 8. DELETE: Delete Message
// ==================================================================

function deleteMessage($contactId) {
    echo "\n🗑️ Deleting message...\n";
    
    $contact = \App\Models\Contact::find($contactId);
    
    if (!$contact) {
        echo "✗ Message not found!\n";
        return;
    }
    
    // Delete file jika ada
    if ($contact->attachment_path && \Illuminate\Support\Facades\Storage::exists($contact->attachment_path)) {
        \Illuminate\Support\Facades\Storage::delete($contact->attachment_path);
        echo "✓ Attachment deleted\n";
    }
    
    $contact->delete();
    echo "✓ Message {$contactId} deleted!\n";
}

// ==================================================================
// 9. SEARCH: Find Messages by Email
// ==================================================================

function findByEmail($email) {
    echo "\n🔍 Searching for email: {$email}\n";
    echo str_repeat("=", 80) . "\n";
    
    $messages = \App\Models\Contact::where('email', $email)->get();
    
    if ($messages->isEmpty()) {
        echo "✗ No messages found from {$email}\n";
        return;
    }
    
    echo "Found {$messages->count()} message(s):\n";
    foreach ($messages as $msg) {
        echo "\n ID: {$msg->id}\n";
        echo " Subject: {$msg->subject}\n";
        echo " Received: " . $msg->created_at . "\n";
        echo " Read: " . ($msg->is_read ? 'Yes' : 'No') . " | Replied: " . ($msg->replied ? 'Yes' : 'No') . "\n";
    }
}

// ==================================================================
// 10. CLEANUP: Delete Old Messages (older than N days)
// ==================================================================

function cleanupOldMessages($days = 30) {
    echo "\n🧹 Cleaning up messages older than {$days} days...\n";
    
    $date = now()->subDays($days);
    $oldMessages = \App\Models\Contact::where('created_at', '<', $date)->get();
    
    echo "Found {$oldMessages->count()} old messages\n";
    
    foreach ($oldMessages as $msg) {
        if ($msg->attachment_path && \Illuminate\Support\Facades\Storage::exists($msg->attachment_path)) {
            \Illuminate\Support\Facades\Storage::delete($msg->attachment_path);
        }
        $msg->delete();
    }
    
    echo "✓ Cleanup complete!\n";
}

// ==================================================================
// MENU & HELPER
// ==================================================================

function showHelp() {
    $help = <<<'HELP'

📧 EMAIL TESTING HELPER COMMANDS
═════════════════════════════════════════════════════════════════════

TESTING:
  testSendEmail()              - Send test email & auto-reply

DATABASE:
  checkDatabase()              - Show all messages
  checkUnreadMessages()        - Show unread messages
  checkUnrepliedMessages()     - Show unreplied messages
  getStatistics()              - Show email statistics

SEARCH:
  findByEmail('email@test.com') - Find messages by email address

ACTIONS:
  markAsRead(1)                - Mark message ID 1 as read
  markAsReplied(1)             - Mark message ID 1 as replied
  deleteMessage(1)             - Delete message ID 1

MAINTENANCE:
  cleanupOldMessages(30)       - Delete messages older than 30 days

INFO:
  showHelp()                   - Show this help menu

═════════════════════════════════════════════════════════════════════

EXAMPLE USAGE:
  php artisan tinker
  >>> include('EMAIL_TESTING_HELPER.php')
  >>> showHelp()              # Show commands
  >>> testSendEmail()         # Test sending email
  >>> getStatistics()         # View stats
  >>> checkUnreadMessages()   # View unread
  >>> markAsRead(1)           # Mark as read
  >>> findByEmail('test@email.com')  # Search

═════════════════════════════════════════════════════════════════════
HELP;

    echo $help;
}

// Auto-show help on include
if (php_sapi_name() === 'cli-server' || php_sapi_name() === 'cli') {
    // Only show help in interactive mode
    // showHelp();
}

?>
