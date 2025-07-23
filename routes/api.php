<!-- <?php 

// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\Api\ProductController;
// use App\Http\Controllers\Api\AuthController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

// Route::middleware('basic.auth')->group(function () {
//        // Auth: Signup & Login (no middleware)
// Route::post('/signup', [AuthController::class, 'signup']);
// Route::post('/login', [AuthController::class, 'login']);
//     // Logout
//     Route::post('/logout', [AuthController::class, 'logout']);

//     // Product APIs with custom middleware
//     Route::get('/products', [ProductController::class, 'index'])->middleware('check.session');// auth:sanctum like checksesssion (token authorization)

//     Route::post('/products', [ProductController::class, 'store'])
//         ->middleware(['check.session', 'check.body:name,price,description']);

//     Route::get('/product', [ProductController::class, 'show'])
//         ->middleware(['check.session', 'check.query:id']);

//     Route::put('/product', [ProductController::class, 'update'])
//         ->middleware(['check.session', 'check.body:name,price,description', 'check.query:id']);

//     Route::delete('/product', [ProductController::class, 'destroy'])
//         ->middleware(['check.session', 'check.query:id']);
// });


// Route::middleware('auth:sanctum')->group(function () {
// Route::post('/signup', [AuthController::class, 'signup']);
// Route::post('/login', [AuthController::class, 'login']);

// });


//http://localhost:8000/api/products //for api.php