<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use App\Validators\UserValidator;
use Auth;
use Exception;

/**
 * Class DashboardController.
 *
 * @package namespace App\Http\Controllers;
 */
class DashboardController extends Controller
{
    private $repository;

    private $validator;

    /**
     * DashboardController constructor.
     *
     * @param UserRepository $repository
     * @param UserValidator $validator
     */
    public function __construct(UserRepository $repository, UserValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }

    public function index()
    {
        return "foi pra minha pagina";
    }
    public function auth(Request $request)
    {
        $data = [
            'email' => $request ->get('username'),
            'password' => $request ->get('password'),
        ];
        try{
            if(env('PASSWORD_HASH'))
            {
                Auth::attempt($data, false);
            }else {
                $user = $this->repository->findWhere(['email'=> $request->get('username')])->first();
                if(!$user)
                    throw new Exception("E-mail Inválido");
                
                if($user->password != $request->get('password'));
                    throw new Exception("Senha Inválida");
                
                Auth::login($user);
                
            }
            return redirect()->route('user.myPage');
        }
        catch (Exception $e){
            return $e->getMessage();
        }
        
        dd($request ->all());


        // $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        // $users = $this->repository->all();

        // if (request()->wantsJson()) {

        //     return response()->json([
        //         'data' => $users,
        //     ]);
        // }

        // return view('users.index', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  UserCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
//     public function store(UserCreateRequest $request)
//     {
//         try {

//             $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

//             $user = $this->repository->create($request->all());

//             $response = [
//                 'message' => 'User created.',
//                 'data'    => $user->toArray(),
//             ];

//             if ($request->wantsJson()) {

//                 return response()->json($response);
//             }

//             return redirect()->back()->with('message', $response['message']);
//         } catch (ValidatorException $e) {
//             if ($request->wantsJson()) {
//                 return response()->json([
//                     'error'   => true,
//                     'message' => $e->getMessageBag()
//                 ]);
//             }

//             return redirect()->back()->withErrors($e->getMessageBag())->withInput();
//         }
//     }

//     /**
//      * Display the specified resource.
//      *
//      * @param  int $id
//      *
//      * @return \Illuminate\Http\Response
//      */
//     public function show($id)
//     {
//         $user = $this->repository->find($id);

//         if (request()->wantsJson()) {

//             return response()->json([
//                 'data' => $user,
//             ]);
//         }

//         return view('users.show', compact('user'));
//     }

//     /**
//      * Show the form for editing the specified resource.
//      *
//      * @param  int $id
//      *
//      * @return \Illuminate\Http\Response
//      */
//     public function edit($id)
//     {
//         $user = $this->repository->find($id);

//         return view('users.edit', compact('user'));
//     }

//     *
//      * Update the specified resource in storage.
//      *
//      * @param  UserUpdateRequest $request
//      * @param  string            $id
//      *
//      * @return Response
//      *
//      * @throws \Prettus\Validator\Exceptions\ValidatorException
     
//     public function update(UserUpdateRequest $request, $id)
//     {
//         try {

//             $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

//             $user = $this->repository->update($request->all(), $id);

//             $response = [
//                 'message' => 'User updated.',
//                 'data'    => $user->toArray(),
//             ];

//             if ($request->wantsJson()) {

//                 return response()->json($response);
//             }

//             return redirect()->back()->with('message', $response['message']);
//         } catch (ValidatorException $e) {

//             if ($request->wantsJson()) {

//                 return response()->json([
//                     'error'   => true,
//                     'message' => $e->getMessageBag()
//                 ]);
//             }

//             return redirect()->back()->withErrors($e->getMessageBag())->withInput();
//         }
//     }


//     /**
//      * Remove the specified resource from storage.
//      *
//      * @param  int $id
//      *
//      * @return \Illuminate\Http\Response
//      */
//     public function destroy($id)
//     {
//         $deleted = $this->repository->delete($id);

//         if (request()->wantsJson()) {

//             return response()->json([
//                 'message' => 'User deleted.',
//                 'deleted' => $deleted,
//             ]);
//         }

//         return redirect()->back()->with('message', 'User deleted.');
//     }
}
