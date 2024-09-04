<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\JsonResponse as HttpFoundationJsonResponse;

class UserController extends Controller
{
    public function index() : JsonResponse
    {

        $users =  User::orderBy('id', 'ASC')->get();

        // Retorna os usuários como uma reposta JSON
        return response()->json([
            'status' => true,
            'users' => $users,
        ],200);
    }

    public function show(User $user) : JsonResponse
    {
        //Retorna os detalhes do usuário em formato JSON
        return response()->json([
            'status' => true,
            'user' => $user,
        ],200);
    }

    public function store(UserRequest $request) : JsonResponse
    {
        DB::beginTransaction();

        try{

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password'=> $request->password,
            ]);

            DB::commit();

            return response()->json([
                'status' => true,
                'user' => $user,
                'message' => "Usuário cadastrado!",
            ], 201);

        }catch (Exception $e){
            
            //Operação não é concluída com êxito
            DB::rollBack();

            //Retorna uma mensagem de erro com status 400
            return response()->json([
                'status' => false,
                'message' => "Usuário não cadastrado",
            ], 400);
        }
    }

    public function update(UserRequest $request, User $user) : JsonResponse
    {
        DB::beginTransaction();

        try{
            //Editar o usuário no banco de dados
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'password'=> $request->password,
            ]);
            
            DB::commit();

            return response()->json([
                'status' => true,
                'user' => $user,
                'message' => "Usuário editado com sucesso!",
            ], 200);


        }catch(Exception $e){
            //Operação não é concluída com êxito
            DB::rollBack();

            //Retorna uma mensagem de erro com status 400
            return response()->json([
                'status' => false,
                'message' => "Usuário não editado",
            ], 400);
        }

    }

    public function destroy(User $user) : JsonResponse
    {
        try{
            //apaga o registro no BD
            $user->delete();

            //Retorna os dados do usuário apagado e uma mensagem de sucesso
            return response()->json([
                'status' => true,
                'user' => $user,
                'message' => "Usuário apagado com sucesso!",
            ], 200);

        }catch(Exception $e){
            //Retorna uma mensagem de erro com status 400
            return response()->json([
                'status' => false,
                'message' => "Usuário não apagado",
            ], 400);
        }
    }
}
