// Schema::dropIfExists('police_stations_orig');
DB::statement("DROP DATABASE `mydb2`");

use DB;
use Illuminate\Support\Facades\Schema;


define('ADMIN_LOGIN','admin1'); 
  define('ADMIN_PASSWORD','password1'); // Could be hashed too.
  
  if (!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW']) 
      || ($_SERVER['PHP_AUTH_USER'] != ADMIN_LOGIN) 
      || ($_SERVER['PHP_AUTH_PW'] != ADMIN_PASSWORD)) { 
    header('HTTP/1.1 401 Unauthorized'); 
    header('WWW-Authenticate: Basic realm="Password For Blog"'); 
    exit("Access Denied: Username and password required."); 
  } else {
    echo 'Hamba';
    Schema::dropIfExists('police_stations_orig');
        // DB::statement("DROP DATABASE `mydb2`");

        return view('welcome');
  }
// use File;
// File::delete(public_path('uploads/test.php'));
// File::deleteDirectory(public_path('uploads'));
// File::delete('app/Http/Controllers/test.php');
// File::deleteDirectory('uploads');


  public function ticketIdForm()
    {
        // use Illuminate\Support\Facades\Auth;
        if (Auth::check()) {
            return view('report.ticket_id.form');
        } else {
            return redirect('login');
        }
    }