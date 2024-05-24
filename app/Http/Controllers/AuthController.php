<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use  App\Models\User;
use DB;

class AuthController extends Controller
{


    public function __construct()
    {
        parent::__construct();
    }
    /**
     * Get a JWT via given credentials.
     *
     * @param  Request  $request
     * @return Response
     */
    public function login(Request $request)
    {

        $validated = $this->validateRequest($request->all(), 'login');

        if(!empty($validated)) {
            return $validated;
        }
        $credentials = $request->only(['email', 'password']);

        if (! $token = Auth::attempt($credentials)) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @param  Request  $request
     * @return Response
     */
    public function register(Request $request)
    {

        $validated = $this->validateRequest($request->all(), 'register');

        if(!empty($validated)) {
            return $validated;
        }


        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);


        if (! $token = Auth::login($user)) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

     /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json([
            'status' => true,
            'message' => 'OK',
            'data' => auth()->user()
        ]);
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();
        return response()->json([
            'status' => true,
            'message' => 'Successfully logged out',
            'data' => []
        ]);

    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'status' => true,
            'message' => 'OK',
            'data' => [
                'access_token' => $token,
                'token_type' => 'bearer',
                'user' => auth()->user(),
                'expires_in' => auth()->factory()->getTTL() * 60 * 24
            ]
        ]);
    }

    /**
     * forgot pass function
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function forgotPass(Request $request)
    {
        $validated = $this->validateRequest($request->all(), 'forgot_pass');

        if(!empty($validated)) {
            return $validated;
        }
        $user = User::where('email', $request->email)->first();
        if(empty($user)) {
            $this->sendFailedResponse('Invalid User');
        }

        $exp = date('Y-m-d H:i:s', strtotime('+10 minute'));

        $token = base64_encode($user->email . "_" . $exp );

        $message = "Dear  " . $user->name . ",<br>Please click on below link to reset your password. <a href='" . env('RESET_PASS_URL') . "?token=" . $token . "'>Reset Password</a><br>The link is valid for 10 mins<br><br>Regards";

        $mailed = $this->sendMail($user->email, "Reset Password", $message);

        if($mailed) {
            DB::table('password_reset_tokens')
                ->updateOrInsert(
                    ['email' => $user->email],
                    [
                        'email' => $user->email,
                        'token' => $token,
                        'created_at' => date('Y-m-d H:i:s')
                    ]);

            return $this->sendSuccessResponse('Mail Sent successfully');
        }
        return $this->sendFailedResponse('Fail to send email');

    }

    public function resetPass(Request $request) {

        $validated = $this->validateRequest($request->all(), 'reset_pass');

        if(!empty($validated)) {
            return $validated;
        }

        $dec_token = base64_decode($request->token);
        list($email, $datetime) = explode("_", $dec_token);

        if(empty($email) || empty($datetime)) {
            return $this->sendFailedResponse('Invalid token');
        }

        if($datetime < date('Y-m-d H:i:s')) {
            return $this->sendFailedResponse('Token Expired');
        }

        $exists = DB::table('password_reset_tokens')
                    ->where('email', $email)
                    ->where('token', $request->token)
                    ->exists();

        if(!$exists) {
            return $this->sendFailedResponse('Invalid token');
        }

        User::where('email', $email)
            ->update(
                ['password'=> Hash::make($request->password)]
            );


        $exists = DB::table('password_reset_tokens')
        ->where('email', $email)
        ->update(['token'=>'']);

        return $this->sendSuccessResponse('Password reset successfully');
    }
}
