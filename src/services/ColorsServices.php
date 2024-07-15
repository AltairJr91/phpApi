<?php

namespace App\Services;
use PDOException;
use App\Model\Colors;
use App\Utils\Validator;

class ColorsServices 
{
    public static function create(array $data)
    {
        try {
            $fields = Validator::validate([
                'name' => $data['name'] ?? ''
            ]);   
            $color = Colors::save($fields);  

            if(!$color){
                return [
                    'error' => true,
                    'success' => false,
                    'message' => 'Erro ao salvar cor'
                ];
            }

            return [
                'error' => false,
                'success' => true,
                'message' => 'Cor salva com sucesso'
            ];
        } 
        catch(PDOException $e){
            if($e->getCode() === '08006'){
                return [
                    'error' => true,
                    'success' => false,
                    'message' => 'Erro ao conectar com o banco de dados'
                ];
            }
            if($e->getCode() === '23505'){
                return [
                    'error' => true,
                    'success' => false,
                    'message' => 'Cor já cadastrada'
                ];
            }
        }
        catch (\Exception $e) {
            return [
                'error' => true,
                'success' => false,
                'message' => $e->getMessage()];
        }
    }

    public static function update(array $data)
    {
        try {
            $fields = Validator::validate([
                'name' => $data['name'] ?? ''
            ]);   
            $color = Colors::update($fields);  

            if(!$color){
                return [
                    'error' => true,
                    'success' => false,
                    'message' => 'Erro ao atualizar cor'
                ];
            }

            return [
                'error' => false,
                'success' => true,
                'message' => 'Cor atualizada com sucesso'
            ];
        } 
        catch(PDOException $e){
            if($e->getCode() === '08006'){
                return [
                    'error' => true,
                    'success' => false,
                    'message' => 'Erro ao conectar com o banco de dados'
                ];
            }
            if($e->getCode() === '23505'){
                return [
                    'error' => true,
                    'success' => false,
                    'message' => 'Cor já cadastrada'
                ];
            }
        }
        catch (\Exception $e) {
            return [
                'error' => true,
                'success' => false,
                'message' => $e->getMessage()];
        }
    }

    public static function delete(int $id)
    {
        try {
            $color = Colors::delete($id);  

            if(!$color){
                return [
                    'error' => true,
                    'success' => false,
                    'message' => 'Erro ao deletar cor'
                ];
            }

            return [
                'error' => false,
                'success' => true,
                'message' => 'Cor deletada com sucesso'
            ];
        } 
        catch(PDOException $e){
            if($e->getCode() === '08006'){
                return [
                    'error' => true,
                    'success' => false,
                    'message' => 'Erro ao conectar com o banco de dados'
                ];
            }
            if($e->getCode() === '23505'){
                return [
                    'error' => true,
                    'success' => false,
                    'message' => 'Cor já cadastrada'
                ];
            }
        }
        catch (\Exception $e) {
            return [
                'error' => true,
                'success' => false,
                'message' => $e->getMessage()];
        }
    }

    public static function all()
    {
        try {
            $colors = Colors::all();  

            if(!$colors){
                return [
                    'error' => true,
                    'success' => false,
                    'message' => 'Erro ao buscar cores'
                ];
            }

            return [
                'error' => false,
                'success' => true,
                'message' => 'Cores encontradas',
                'data' => $colors
            ];
        } 
        catch(PDOException $e){
            if($e->getCode() === '08006'){
                return [
                    'error' => true,
                    'success' => false,
                    'message' => 'Erro ao conectar com o banco de dados'
                ];
            }
            if($e->getCode() === '23505'){
                return [
                    'error' => true,
                    'success' => false,
                    'message' => 'Cor já cadastrada'
                ];
            }
        }
        catch (\Exception $e) {
            return [
                'error' => true,
                'success' => false,
                'message' => $e->getMessage()];
        }
    }

    public static function find(int $id)
    {
        try {
            $color = Colors::find($id);  

            if(!$color){
                return [
                    'error' => true,
                    'success' => false,
                    'message' => 'Erro ao buscar cor'
                ];
            }

            return [
                'error' => false,
                'success' => true,
                'message' => 'Cor encontrada',
                'data' => $color
            ];
        } 
        catch(PDOException $e){
            if($e->getCode() === '08006'){
                return [
                    'error' => true,
                    'success' => false,
                    'message' => 'Erro ao conectar com o banco de dados'
                ];
            }
            if($e->getCode() === '23505'){
                return [
                    'error' => true,
                    'success' => false,
                    'message' => 'Cor já cadastrada'
                ];
            }
        }
        catch (\Exception $e) {
            return [
                'error' => true,
                'success' => false,
                'message' => $e->getMessage()];
        }
    }
}