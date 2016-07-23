<?php

namespace App\Http\Controllers;

use App\PageModule;
use App\Http\Requests;
use App\Menu;
use App;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactFormController extends PageController
{

    public function __construct()
    {
        parent::__construct();
    }

    public function send(Request $request)
    {
        $module = new App\Modules\Widgets\ContactForm();
        $module = $module->findByModuleId($request->module_id);

        $settings = App\Setting::all();

        $clientEmail = $request->email;
        $clientName = ucfirst($request->name);

        $data = [
            'clientEmail' => $clientEmail,
            'name' => $clientName,
            'email' => $clientEmail,
            'message' => $request->message,
            'response_message' => $module->response_message
        ];

        Mail::send('modules.widgets.contact-form.mail-to-client', ['data' => $data], function ($m) use ($clientEmail, $clientName) {
            $m->from('info@genevo-tech.com', 'Genevo Technology');

            $m->to('lyhong.pon@gmail.com')->subject('We will contact you back soon!');
        });

        Mail::send('modules.widgets.contact-form.mail-to-site-owner', ['data' => $data], function ($m) use ($clientEmail, $clientName) {
            $m->from($clientEmail, $clientName);

            $m->to('genevotestemail@gmail.com')->subject('Visitor contact from our website!');
        });

        return redirect('thanks-for-contact-us/' . $request->module_id);
    }

    public function afterSent($moduleId)
    {
        $module = new App\Modules\Widgets\ContactForm();
        $module = $module->findByModuleId($moduleId);

        return view('modules.widgets.contact-form.email-sent')->with([
            'response_message' => $module->response_message
        ]);
    }

}
