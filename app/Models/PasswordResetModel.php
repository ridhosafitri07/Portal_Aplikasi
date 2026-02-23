<?php

namespace App\Models;

use CodeIgniter\Model;

class PasswordResetModel extends Model
{
    protected $table = 'password_resets';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['id_user', 'otp_code', 'token', 'expired_at', 'is_used', 'created_at', 'updated_at'];

    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    protected $validationRules = [];
    protected $validationMessages = [];

    /**
     * Generate OTP dan simpan ke database
     */
    public function generateOTP($idUser)
    {
        $otp = str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);
        $expiredAt = date('Y-m-d H:i:s', strtotime('+5 minutes'));
        $token = bin2hex(random_bytes(32));

        $this->insert([
            'id_user'    => $idUser,
            'otp_code'   => $otp,
            'token'      => $token,
            'expired_at' => $expiredAt,
            'is_used'    => 0,
        ]);

        return [
            'otp'   => $otp,
            'token' => $token,
        ];
    }

    /**
     * Validasi OTP
     */
    public function validateOTP($token, $otpCode)
    {
        $reset = $this->where('token', $token)->first();

        if (!$reset) {
            return ['valid' => false, 'message' => 'Token tidak ditemukan'];
        }

        if ($reset['is_used']) {
            return ['valid' => false, 'message' => 'Kode sudah digunakan'];
        }

        if (strtotime($reset['expired_at']) < time()) {
            return ['valid' => false, 'message' => 'Kode sudah kadaluarsa'];
        }

        if ($reset['otp_code'] !== $otpCode) {
            return ['valid' => false, 'message' => 'Kode OTP salah'];
        }

        return ['valid' => true, 'idUser' => $reset['id_user']];
    }

    /**
     * Mark OTP as used
     */
    public function markAsUsed($token)
    {
        return $this->where('token', $token)->set(['is_used' => 1])->update();
    }

    /**
     * Cleanup expired OTP
     */
    public function cleanupExpired()
    {
        return $this->where('expired_at <', date('Y-m-d H:i:s'))->delete();
    }
}
