<?php

// app/Http/Controllers/Api/AuthController.php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Lida com a tentativa de autenticação de um usuário.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        // 1. Validação dos dados de entrada
        $credentials = $request->validate([
                                              'email' => 'required|email',
                                              'password' => 'required',
                                          ]);

        // 2. Tentativa de autenticação
        if (Auth::attempt($credentials)) {
            // 3. Sucesso: Gera um novo token para o usuário
            $user = Auth::user();
            $token = $user->createToken('auth-token')->plainTextToken;

            // Retorna os dados do usuário e o token
            return response()->json([
                                        'user' => $user,
                                        'token' => $token,
                                    ]);
        }

        // 4. Falha: Retorna erro de credenciais inválidas
        return response()->json([
                                    'message' => 'As credenciais fornecidas estão incorretas.'
                                ], 401); // 401 Unauthorized
    }

    public function logout(Request $request)
    {
        // Revoga o token de acesso atual que foi usado para autenticar a requisição
        $request->user()->currentAccessToken()->delete();

        return response()->json([
                                    'message' => 'Logout realizado com sucesso.'
                                ]);
    }

    public function register(Request $request)
    {
        // 1. Validação rigorosa dos dados de entrada
        $validatedData = $request->validate([
                                                'name' => 'required|string|max:255',
                                                'email' => 'required|string|email|max:255|unique:users',
                                                'password' => 'required|string|min:8|confirmed',
                                            ]);

        // 2. Criação do usuário no banco de dados
        $user = User::create([
                                 'name' => $validatedData['name'],
                                 'email' => $validatedData['email'],
                                 'password' => Hash::make($validatedData['password']),
                             ]);

        // 3. Geração de um token de acesso imediato para o novo usuário
        $token = $user->createToken('auth-token')->plainTextToken;

        // 4. Retorno da resposta com os dados e o token
        return response()->json([
                                    'user' => $user,
                                    'token' => $token,
                                ], 201); // 201 Created
    }
}
