<?php

namespace App\Models;

use Myth\Auth\Models\UserModel as BaseUserModel;

class UserModel extends BaseUserModel
{
    // protected $returnType     = 'array';

    protected $allowedFields = [
        'email', 'username', 'foto', 'fullname', 'password_hash', 'reset_hash', 'reset_at', 'reset_expires', 'activate_hash',
        'status', 'status_message', 'active', 'force_pass_reset', 'created_at', 'updated_at', 'deleted_at',
    ];

    public function getUser($id = false)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('users');
        $builder->select('users.id as userid, username, email, active, activate_hash, foto, fullname,  name as role, group_id');
        $builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id')->orderBy('auth_groups.id');
        $query = $builder->get();
        $data = $query->getResultArray();
        if ($id == false) {
            return $data;
        }

        return $this->where(['id' => $id])->first();
    }

    public function getUbahProfile($id)
    {
        return $this->where('id', $id)->first();
    }
}
