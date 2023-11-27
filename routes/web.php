<?php

use App\Models\User;
use App\Models\Subject;
use App\Models\SubjectMaterial;
use App\Models\UserSubject;
use App\Models\VisitLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function(){
    Route::get('/logout', function () {
        auth()->logout();
        return back(); 
    }); 
    Route::get('/subject/{subject}', function (Request $request, Subject $subject) {
        
        

        if ($request->has('code') && $request->code == $subject->code) {
            // check if has already access 
            UserSubject::create(['user_id' => auth()->id(), 'subject_id' => $subject->id]); 
        } else {
            $hasAccess = UserSubject::whereUserId(auth()->id())->whereSubjectId($subject->id)->exists();

            if ($hasAccess) {
                return redirect()->to("/subject/$subject->id?code=$subject->code"); 
            }

            if ($subject->instructor_id == auth()->id()) {
                return redirect()->to("/subject/$subject->id?code=$subject->code"); 
            }
        }

        return view('subject', compact('subject')); 
    }); 


    Route::get('/subject-create', function () {
        if (auth()->user()->type != User::TYPE_TEACHER) return abort(404);   

        return view('subject-create'); 
    }); 

    Route::get('/move-to-archived/{subject}', function (Request $request, Subject $subject) {
        $subject->update(['archived_at' => now()]); 

        alert()->success('Success', 'Subject has been moved to archived.');
        return back(); 
    }); 
    Route::get('/remove-to-archived/{subject}', function (Request $request, Subject $subject) {
        $subject->update(['archived_at' => null]); 

        alert()->success('Success', 'Subject has been removed to archived.');
        return back(); 
    }); 


    Route::get('subject-material/{sm}', function (SubjectMaterial $sm) {
        $logs = VisitLog::whereMaterialId($sm->id)->get()->groupBy('user_id'); 
        // return $logs; 
        return view('subject-material', compact('sm', 'logs')); 
    }); 

    Route::get('/subject-delete/{subject}', function (Subject $subject) {
        $subject->delete();
        alert()->success('Success', 'Subject has been deleted.'); 
        return back(); 
    }); 

    Route::post('subject-material', function (Request $request) {
        $data = $request->validate([
            'subject_id' => 'required',
            'description' => 'required',
            'file' => '',
            'video_link' => ''
        ]); 

        if ($request->file) {
            $data['file'] = $request->file->store('public'); 
        }

        SubjectMaterial::create($data);

        alert()->success('Success', 'subject material has been created'); 

        return back(); 

    });

    Route::post('subject', function (Request $request) {
        $data = $request->validate([
            'subject' => 'required',
            'description' => 'required',
            'code' => 'required', 
            'theme' => 'required', 
        ]);

        $data['instructor_id'] = auth()->id(); 
        
        $subject = Subject::create($data); 

        alert()->success('Success', 'subject has been created'); 
        
        return redirect()->to("/subject/$subject->id?code=" . $data['code']); 
    }); 
});

Route::view('tnc', 'tnc'); 

Route::get('/profile/{user}', function (Request $request, User $user) {
    return view('profile', compact('user')); 
})->middleware(['auth'])->name('profile');

Route::post('/profile/{user}', function (Request $request, User $user) {
    $data = []; 
    
    if ($request->has('image')) {
        $data['image'] = $request->image->store('public'); 
    }

    if($request->has('name')) {
        $data['name'] = $request->name; 
    }

    if ($request->has('password')) {
        $data['password'] = bcrypt($request->password); 
    }

    if ($request->has('email')) {
        $data['email'] = $request->email; 
    }

    $user->update($data);
    alert()->success("Updated successfully!"); 
    return back(); 

}); 


Route::get('/search', function (Request $request) {
    $q = $request->search ?? ''; 
    $subjects = Subject::where('subject', 'LIKE', "%$q%")->paginate(6)->withQueryString();
    return view('search', compact('subjects')); 
});