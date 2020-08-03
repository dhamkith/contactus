<?php


namespace Dhamkith\Contactus\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

use App\User;
use Dhamkith\Contactus\Models\ContactUs;
use Mail;
use Dhamkith\Contactus\Mail\Contact;

class ContactUsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(config('dhamkith_contactus')['middleware_for_view'])->except('create', 'store'); 
    }
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $messages = ContactUs::OrderBy('created_at', 'DESC')
                            ->paginate(15);
        return view('contactus::index', compact('messages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('contactus::contact');
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:44',
            'email' => 'required|email',
            'subject' => 'required|max:44',
            'message' => 'required|max:300',
        ]);

        if ( Auth::check() ){

            $user_id = auth()->user()->id;

            $User = User::find($user_id);
            $contact_us = new ContactUs;
            $contact_us->name =  $request->input('name');
            $contact_us->email =  $request->input('email');
            $contact_us->subject =  $request->input('subject');
            $contact_us->message =  $request->input('message');

            $User->massages()->save($contact_us);

        } else {
            ContactUs::create($request->all());
        }

        $data = array(
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'user_message' => $request->get('message')
        );

        $email = config('dhamkith_contactus')['email']; 

        Mail::to($email)->send(new Contact($data)); 

        return back()->with('success', 'Thanks for contacting us!');
    }

    /**
     *  message show
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $message = ContactUs::find($id);
        $message->markAsRead();
        return view('contactus::show', compact('message'));
    }

    /**
     * Remove the specified message from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $msgs_ids = explode(',', $request->destroy_msgs); 
        if ($msgs_ids && $request->action == 'delete') {
            foreach ($msgs_ids as $id) {
                if ($id) {
                    $message = ContactUs::find($id);
                    $message->delete();
                } else {
                    return redirect()->back()->with('error', 'atleast select one...');
                }
            }
            return redirect()->back()->with('success', 'request messages deleted');
        }
        return redirect()->back()->with('error', 'select delete option');
    }
}
