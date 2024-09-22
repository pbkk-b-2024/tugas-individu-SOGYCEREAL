use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    public function destroy(Request $request)
    {
        Auth::logout();

        return redirect('/login'); // Redirect to the desired route after logout
    }
}
