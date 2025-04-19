<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SupportController extends Controller
{
    public function submit(Request $request)
    {
        // Validation
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string|min:10',
        ]);

        // يمكنك حفظ الرسالة في قاعدة البيانات أو إرسالها بالبريد
        // مثال: SupportMessage::create($request->all());

        // أو ترسل إشعارًا للإدارة

        return back()->with('success', 'تم إرسال مشكلتك بنجاح، سنقوم بمساعدتك قريبًا.');
    }
}
