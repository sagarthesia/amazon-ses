<?php
/**
 * Short description UserController File
 * Long description This controller renders your application's "userlist",
 * "users page"for users. This controller.
 *
 * PHP version 5
 *
 * @category User
 *
 * @author   Sagar Thesia <sagar.t.php@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 *
 * @link     http://www.gkblabs.com/
 * */

namespace app\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use Input;
use App\User;
use Session;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     *Create a new controller instance.
     */
    public function __construct()
    {
    }

    /**
     * Show the users list to the user.
     *
     *@return Response
     */
    public function index()
    {
        return view('user-list');
    }

    /**
     * Send an e-mail to the user.
     *
     *@param  Request  $request
     *@param  int  $id
     *
     *@return Response
     */
    public function sendmail(Request $request)
    {
        /* Get all the request params in driver variable**/
        $user = $request->all();
        $alluser = explode(',', $user['emails']);
        $filePath = base_path().'/public/upload/Running_Horses_.jpg';
        foreach ($alluser as $k => $val) {
            Mail::send('emails.reminder', ['user' => $alluser], function ($m) use ($alluser, $val, $user, $filePath) {
                $m->from('thota2237@gmail.com', 'Amazon SES');
                $m->to($val)->subject($user['subject']);
                $m->attach($filePath);
            });
        }
        if(count(Mail::failures()) > 0){
			Session::flash('message', 'Failed to send email, please try again.'); 
			Session::flash('alert-class', 'alert-danger'); 
		}
		else
		{
			Session::flash('message', 'Email send successfully!'); 
			Session::flash('alert-class', 'alert-success'); 
		}
        return redirect('/');
    }
}
