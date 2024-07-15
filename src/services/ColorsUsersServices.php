<?php

namespace App\Services;


use PDOException;
use App\Model\User;
use App\Model\Colors;
use App\Utils\Validator;
use App\Model\ColorsUsers;

class ColorsUsersServices
{
    public static function create(array $data)
    {
        try {
            $fields = Validator::validate([
                'userId' => $data['userId'] ?? '',
                'colorId' => $data['colorId'] ?? ''
            ]);

            $colorUser = ColorsUsers::save($fields);

            if (!$colorUser) {
                return [
                    'error' => true,
                    'success' => false,
                    'message' => 'Erro ao salvar cor do usuário'
                ];
            }

            return [
                'error' => false,
                'success' => true,
                'message' => 'Cor do usuário salva com sucesso'
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

    public static function update(array $data)
    {
        try {
            $fields = Validator::validate([
                'userId' => $data['userId'] ?? '',
                'colorId' => $data['colorId'] ?? ''
            ]);

            $colorUser = ColorsUsers::update($fields);

            if (!$colorUser) {
                return [
                    'error' => true,
                    'success' => false,
                    'message' => 'Erro ao atualizar cor do usuário'
                ];
            }

            return [
                'error' => false,
                'success' => true,
                'message' => 'Cor do usuário atualizada com sucesso'
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
            $colorUser = ColorsUsers::delete($id);

            if (!$colorUser) {
                return [
                    'error' => true,
                    'success' => false,
                    'message' => 'Erro ao deletar cor do usuário'
                ];
            }

            return [
                'error' => false,
                'success' => true,
                'message' => 'Cor do usuário deletada com sucesso'
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

    public static function all()
    {
        try {
            $colorsUsers = ColorsUsers::all();

            if (!$colorsUsers) {
                return [
                    'error' => true,
                    'success' => false,
                    'message' => 'Erro ao buscar cores do usuário'
                ];
            }

            return [
                'error' => false,
                'success' => true,
                'data' => $colorsUsers
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

    public static function find(int $id)
    {
        try {
            $colorUser = ColorsUsers::find($id);

            if (!$colorUser) {
                return [
                    'error' => true,
                    'success' => false,
                    'message' => 'Erro ao buscar cor do usuário'
                ];
            }

            return [
                'error' => false,
                'success' => true,
                'data' => $colorUser
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
}
