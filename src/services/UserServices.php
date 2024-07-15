<?php

namespace App\Services;

use App\Utils\Validator;
use PDOException;
use App\Model\User;

class UserServices
{
    public static function create(array $data)
    {
        try {
            $fields = Validator::validate([
                'name' => $data['name'] ?? '',
                'email' => $data['email'] ?? '',
                'password' => $data['password'] ?? ''
            ]);
            $user = User::save($fields);

            $fields['password'] = password_hash($fields['password'], PASSWORD_DEFAULT);
            if (!$user) {
                return [
                    'error' => true,
                    'success' => false,
                    'message' => 'Erro ao salvar usuário'
                ];
            }
            if ($user) {
                return [
                    'error' => false,
                    'success' => true,
                    'message' => 'Usuário salvo com sucesso'
                ];
            }
        } catch (PDOException $e) {
            if ($e->getCode() === '08006') {
                return [
                    'error' => true,
                    'success' => false,
                    'message' => 'Erro ao conectar com o banco de dados'
                ];
            }
            if ($e->getCode() === '23505') {
                return [
                    'error' => true,
                    'success' => false,
                    'message' => 'Email já cadastrado'
                ];
            }
        } catch (\Exception $e) {
            return [
                'error' => true,
                'success' => false,
                'message' => $e->getMessage()
            ];
        }
    }

    public static function update(array $data)
    {
        try {
            $fields = Validator::validate([
                'name' => $data['name'] ?? '',
                'email' => $data['email'] ?? '',
                'password' => $data['password'] ?? ''
            ]);
            $user = User::update($fields);

            $fields['password'] = password_hash($fields['password'], PASSWORD_DEFAULT);
            if (!$user) {
                return [
                    'error' => true,
                    'success' => false,
                    'message' => 'Erro ao atualizar usuário'
                ];
            }

            return [
                'error' => false,
                'success' => true,
                'message' => 'Usuário atualizado com sucesso'
            ];
        } catch (PDOException $e) {
            if ($e->getCode() === '08006') {
                return [
                    'error' => true,
                    'success' => false,
                    'message' => 'Erro ao conectar com o banco de dados'
                ];
            }
            if ($e->getCode() === '23505') {
                return [
                    'error' => true,
                    'success' => false,
                    'message' => 'Email já cadastrado'
                ];
            }
        } catch (\Exception $e) {
            return [
                'error' => true,
                'success' => false,
                'message' => $e->getMessage()
            ];
        }
    }

    public static function delete(int $id)
    {
        try {
            $user = User::delete($id);

            if (!$user) {
                return [
                    'error' => true,
                    'success' => false,
                    'message' => 'Erro ao deletar usuário'
                ];
            }

            return [
                'error' => false,
                'success' => true,
                'message' => 'Usuário deletado com sucesso'
            ];
        } catch (PDOException $e) {
            if ($e->getCode() === '08006') {
                return [
                    'error' => true,
                    'success' => false,
                    'message' => 'Erro ao conectar com o banco de dados'
                ];
            }
        } catch (\Exception $e) {
            return [
                'error' => true,
                'success' => false,
                'message' => $e->getMessage()
            ];
        }
    }

    public static function show(int $id)
    {
        try {
            $user = User::find($id);

            if (!$user) {
                return [
                    'error' => true,
                    'success' => false,
                    'message' => 'Usuário não encontrado'
                ];
            }

            return [
                'error' => false,
                'success' => true,
                'message' => 'Usuário encontrado',
                'data' => $user
            ];
        } catch (PDOException $e) {
            if ($e->getCode() === '08006') {
                return [
                    'error' => true,
                    'success' => false,
                    'message' => 'Erro ao conectar com o banco de dados'
                ];
            }
        } catch (\Exception $e) {
            return [
                'error' => true,
                'success' => false,
                'message' => $e->getMessage()
            ];
        }
    }

    public static function index()
    {
        try {
            $users = User::all();

            if (!$users) {
                return [
                    'error' => true,
                    'success' => false,
                    'message' => 'Nenhum usuário encontrado'
                ];
            }

            return [
                'error' => false,
                'success' => true,
                'message' => 'Usuários encontrados',
                'data' => $users
            ];
        } catch (PDOException $e) {
            if ($e->getCode() === '08006') {
                return [
                    'error' => true,
                    'success' => false,
                    'message' => 'Erro ao conectar com o banco de dados'
                ];
            }
        } catch (\Exception $e) {
            return [
                'error' => true,
                'success' => false,
                'message' => $e->getMessage()
            ];
        }
    }
}
