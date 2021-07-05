<?php

use App\Http\Controllers\Api\V1\AdminController;
use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\Api\V1\HelloSignController;
use App\Http\Controllers\Api\V1\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::namespace('Api')->middleware([])->group(function () {
    Route::post('hellosign', [HelloSignController::class, 'hellosignHook']);
});

Route::prefix('v1')->namespace('Api')->middleware([])->group(function () {
    Route::post('/auth/login', [AuthController::class, 'login'])->name('login');;
    Route::post('/auth/register-entity', [AuthController::class, 'registerEntity']);
    Route::post('/auth/register-individual', [AuthController::class, 'registerIndividual']);
    Route::post('/auth/send-reset-password', [AuthController::class, 'sendResetLinkEmail']);
    Route::post('auth/reset-password', [AuthController::class, 'resetPassword']);
    Route::middleware(['auth:api'])->group(function () {
        Route::post('/users/verify-email', [AuthController::class, 'verifyEmail']);
        Route::post('/users/resend-verify-email', [AuthController::class, 'resendVerifyEmail']);
        Route::post('/users/change-email', [UserController::class, 'changeEmail']);
        Route::post('/users/change-password', [UserController::class, 'changePassword']);
        Route::get('/users/profile', [UserController::class, 'getProfile']);
        Route::post('/users/logout', [UserController::class, 'logout']);
        Route::post('users/hellosign-request', [UserController::class, 'sendHellosignRequest']);
        Route::post('users/submit-public-address', [UserController::class, 'submitPublicAddress']);
        Route::post('users/verify-file-casper-signer', [UserController::class, 'verifyFileCasperSigner']);
        Route::post('users/submit-kyc', [UserController::class, 'functionSubmitKYC']);
        Route::post('users/verify-owner-node', [UserController::class, 'verifyOwnerNode']);
        Route::post('users/owner-node', [UserController::class, 'addOwnerNode']);
        Route::get('users/owner-node', [UserController::class, 'getOwnerNodes']);
        Route::post('users/resend-invite-owner', [UserController::class, 'resendEmailOwnerNodes']);
        Route::get('users/message-content', [UserController::class, 'getMessageContent']);
        Route::post('users/shuftipro-temp',  [UserController::class, 'saveShuftiproTemp']);
        Route::put('users/shuftipro-temp', [UserController::class, 'updateShuftiproTemp']);
        Route::put('/users/type-owner-node',  [UserController::class, 'updateTypeOwnerNode']);
        Route::post('users/verify-bypass',  [UserController::class, 'verifyBypass']);
        Route::post('/users/upload-letter',  [UserController::class, 'uploadLetter']);
        Route::get('users/votes', [UserController::class, 'getVotes']);
        Route::get('users/votes/{id}', [UserController::class, 'getVoteDetail']);
        Route::post('users/votes/{id}', [UserController::class, 'vote']);
        Route::prefix('admin')->middleware(['role_admin'])->group(function () {
            Route::get('/users', [AdminController::class, 'getUsers']);
            Route::get('/users/{id}', [AdminController::class, 'getUserDetail'])->where('id', '[0-9]+');
            Route::get('/dashboard', [AdminController::class, 'infoDashboard']);
            Route::get('/users/{id}/kyc', [AdminController::class, 'getKYC'])->where('id', '[0-9]+');
            Route::post('/users/{id}/approve-kyc',  [AdminController::class, 'approveKYC'])->where('id', '[0-9]+');
            Route::post('/users/{id}/deny-kyc',  [AdminController::class, 'denyKYC'])->where('id', '[0-9]+');
            Route::post('/users/{id}/reset-kyc',  [AdminController::class, 'resetKYC'])->where('id', '[0-9]+');
            Route::get('/users/intakes', [AdminController::class, 'getIntakes']);
            Route::post('/ballots', [AdminController::class, 'submitBallot']);
            Route::get('/ballots', [AdminController::class, 'getBallots']);
            Route::get('/ballots/{id}', [AdminController::class, 'getDetailBallot'])->where('id', '[0-9]+');
            Route::get('/ballots/{id}/votes', [AdminController::class, 'getBallotVotes'])->where('id', '[0-9]+');
            Route::post('/ballots/{id}/cancel', [AdminController::class, 'cancelBallot'])->where('id', '[0-9]+');
            Route::get('/global-settings', [AdminController::class, 'getGlobalSettings']);
            Route::put('/global-settings', [AdminController::class, 'updateGlobalSettings']);
            Route::prefix('/teams')->group(function () {
                Route::get('/', [AdminController::class, 'getSubAdmins']);
                Route::post('/invite', [AdminController::class, 'inviteSubAdmin']);
                Route::post('/reinvite', [AdminController::class, 'resendLink']);
                Route::get('/{id}/change-permissions', [AdminController::class, 'changeSubAdminPermissions']);
                Route::get('/{id}/reset-password', [AdminController::class, 'changeSubAdminResetPassword']);
                Route::delete('/{id}/revoke', [AdminController::class, 'revokeSubAdmin']);
            });
        });
        Route::prefix('discussions')->group(function() {
            Route::get('/trending', [DiscussionController::class, 'getTrending']);
            Route::get('/list', [DiscussionController::class, 'getDiscussions']);
            Route::get('/detail/{id}', [DiscussionController::class, 'getDiscussion']);
            Route::post('/new', [DiscussionController::class, 'postDiscussion']);
            Route::delete('/{id}/new', [DiscussionController::class, 'removeNewMark']);
            Route::post('/{id}/comment', [DiscussionController::class, 'createComment']);
            Route::put('/{id}/comment', [DiscussionController::class, 'updateComment']);
            Route::post('/{id}/vote', [DiscussionController::class, 'setVote']);
            Route::post('/{id}/pin', [DiscussionController::class, 'setPin']);
        });
    });
});
