<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'frontend\pageController@index');






// admin route group
Route::group(['prefix' => 'admin'], function(){
  
    Route::get('/', 'backend\pageController@index')->name('admin.index');

        // Admin Login Routes
        Route::get('/login', 'Auth\admin\LoginController@showLoginForm')->name('admin.login');
        Route::post('/login/submit', 'Auth\admin\LoginController@login')->name('admin.login.submit');
        Route::post('/logout/submit', 'Auth\admin\LoginController@logout')->name('admin.logout');
      
        // Password Email Send
        Route::get('/password/reset', 'Auth\admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
        Route::post('/password/resetPost', 'Auth\admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
      
        // Password Reset
        Route::get('/password/reset/{token}', 'Auth\admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
        Route::post('/password/reset', 'Auth\admin\ResetPasswordController@reset')->name('admin.password.reset.post');

      //--------------admin designation route
  Route::group(['prefix' => '/designation'], function(){
    Route::get('/', 'backend\DesignationController@index')->name('admin.designation.index');
    Route::post('/store','backend\DesignationController@store')->name('admin.designation.store');
    Route::post('/update/{id}','backend\DesignationController@update')->name('admin.designation.update');
    Route::post('/delete/{id}','backend\DesignationController@delete')->name('admin.designation.delete');
    });

          //--------------admin introduction route
  Route::group(['prefix' => '/introduction'], function(){
    Route::get('/', 'backend\IntroductionController@index')->name('admin.introduction.index');
    Route::post('/store','backend\IntroductionController@store')->name('admin.introduction.store');
    Route::post('/update/{id}','backend\IntroductionController@update')->name('admin.introduction.update');
    Route::post('/delete/{id}','backend\IntroductionController@delete')->name('admin.introduction.delete');
    });

          //--------------admin skill route
  Route::group(['prefix' => '/skill'], function(){
    Route::get('/', 'backend\SkillController@index')->name('admin.skill.index');
    Route::post('/store','backend\SkillController@store')->name('admin.skill.store');
    Route::post('/update/{id}','backend\SkillController@update')->name('admin.skill.update');
    Route::post('/delete/{id}','backend\SkillController@delete')->name('admin.skill.delete');
    });

          //--------------admin experience route
  Route::group(['prefix' => '/experience'], function(){
    Route::get('/', 'backend\ExperienceController@index')->name('admin.experience.index');
    Route::post('/store','backend\ExperienceController@store')->name('admin.experience.store');
    Route::post('/update/{id}','backend\ExperienceController@update')->name('admin.experience.update');
    Route::post('/delete/{id}','backend\ExperienceController@delete')->name('admin.experience.delete');
    });

              //--------------admin education route
  Route::group(['prefix' => '/education'], function(){
    Route::get('/', 'backend\EducationController@index')->name('admin.education.index');
    Route::post('/store','backend\EducationController@store')->name('admin.education.store');
    Route::post('/update/{id}','backend\EducationController@update')->name('admin.education.update');
    Route::post('/delete/{id}','backend\EducationController@delete')->name('admin.education.delete');
    });



              //--------------admin service route
  Route::group(['prefix' => '/service'], function(){
    Route::get('/', 'backend\ServiceController@index')->name('admin.service.index');
    Route::post('/store','backend\ServiceController@store')->name('admin.service.store');
    Route::post('/update/{id}','backend\ServiceController@update')->name('admin.service.update');
    Route::post('/delete/{id}','backend\ServiceController@delete')->name('admin.service.delete');
    });

              //--------------admin contact route
  Route::group(['prefix' => '/contact'], function(){
    Route::get('/', 'backend\ContactController@index')->name('admin.contact.index');
    Route::post('/store','backend\ContactController@store')->name('admin.contact.store');
    Route::post('/update/{id}','backend\ContactController@update')->name('admin.contact.update');
    Route::post('/delete/{id}','backend\ContactController@delete')->name('admin.contact.delete');
    });


      //--------------admin social route
  Route::group(['prefix' => '/social'], function(){
    Route::get('/', 'backend\socialController@index')->name('admin.social.index');
    Route::post('/store','backend\socialController@store')->name('admin.social.store');
    Route::post('/update/{id}','backend\socialController@update')->name('admin.social.update');
    Route::post('/delete/{id}','backend\socialController@delete')->name('admin.social.delete');
    });

              //--------------admin footer route
  Route::group(['prefix' => '/footer'], function(){
    Route::get('/', 'backend\footerController@index')->name('admin.footer.index');
    Route::post('/store','backend\footerController@store')->name('admin.footer.store');
    Route::post('/update/{id}','backend\footerController@update')->name('admin.footer.update');
    Route::post('/delete/{id}','backend\footerController@delete')->name('admin.footer.delete');
    });



});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
