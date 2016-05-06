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
        //$file = Input::file('attachment');
        //$file = array('image' => Input::file('attachment'));
        $alluser = explode(',', $user['emails']);
        foreach ($alluser as $k => $val) {
            Mail::send('emails.reminder', ['user' => $alluser], function ($m) use ($alluser, $val, $user) {
                $m->from('amar2237@gmail.com', 'Amazon SES');
                $m->to($val)->subject($user['subject']);
            });
        }
        return redirect('/');
    }
}
