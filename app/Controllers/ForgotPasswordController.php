<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\PasswordResetModel;
use CodeIgniter\HTTP\RedirectResponse;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

/**
 * @property RequestInterface $request
 * @property ResponseInterface $response
 * @property \CodeIgniter\Validation\Validation $validator
 */
class ForgotPasswordController extends BaseController
{
    private $userModel;
    private $resetModel;
    protected $request;
    protected $response;
    protected $validator;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->resetModel = new PasswordResetModel();
    }

    /**
     * Step 1: Form input username & nomor HP
     */
    public function index()
    {
        return view('forgot_password/step1');
    }

    /**
     * API: Verifikasi username & nomor HP, kirim OTP
     */
    public function sendOTP()
    {
        if ($this->request->getMethod() !== 'post') {
            return $this->response->setJSON(['success' => false, 'error' => 'Invalid request method']);
        }

        $username = trim($this->request->getPost('username'));
        $phoneNumber = trim($this->request->getPost('phone_number'));

        if (!$username || !$phoneNumber) {
            return $this->response->setJSON(['success' => false, 'error' => 'Username dan nomor HP harus diisi']);
        }

        // Cari user berdasarkan username
        $user = $this->userModel->where('username', $username)->first();

        if (!$user) {
            return $this->response->setJSON(['success' => false, 'error' => 'Username tidak ditemukan']);
        }

        // Validasi nomor HP (simple check)
        $phoneDigits = preg_replace('/\D/', '', $phoneNumber);
        if (strlen($phoneDigits) < 10 || strlen($phoneDigits) > 15) {
            return $this->response->setJSON(['success' => false, 'error' => 'Nomor HP tidak valid']);
        }

        // Cek apakah nomor HP sesuai (bisa disimpan di user table atau acces_users)
        // Untuk demo, kita anggap valid. Di production, tambah validasi nomor HP ke database
        
        // Generate OTP
        $otp = $this->resetModel->generateOTP($user['id_user']);

        // Kirim OTP ke WhatsApp
        $whatsappResult = $this->sendOTPWhatsApp($phoneNumber, $otp['otp']);

        if (!$whatsappResult['success']) {
            return $this->response->setJSON([
                'success' => false,
                'error' => 'Gagal mengirim OTP: ' . $whatsappResult['error']
            ]);
        }

        return $this->response->setJSON([
            'success' => true,
            'token' => $otp['token'],
            'message' => 'OTP berhasil dikirim ke WhatsApp Anda'
        ]);
    }

    /**
     * Step 2: Validasi OTP
     */
    public function verifyOTP()
    {
        $token = $this->request->getGet('token') ?? $this->request->getPost('token');

        if (empty($token)) {
            return view('forgot_password/step1');
        }

        if ($this->request->getMethod() === 'post') {
            $otpCode = trim($this->request->getPost('otp_code'));

            if (!$otpCode || strlen($otpCode) !== 6) {
                return $this->response->setJSON([
                    'success' => false,
                    'error' => 'Kode OTP harus 6 digit'
                ]);
            }

            $validation = $this->resetModel->validateOTP($token, $otpCode);

            if (!$validation['valid']) {
                return $this->response->setJSON([
                    'success' => false,
                    'error' => $validation['message']
                ]);
            }

            return $this->response->setJSON([
                'success' => true,
                'message' => 'OTP valid',
                'idUser' => $validation['idUser'],
                'token' => $token
            ]);
        }

        return view('forgot_password/step2', ['token' => $token]);
    }

    /**
     * Step 3: Reset password
     */
    public function resetPassword()
    {
        $token = $this->request->getGet('token') ?? $this->request->getPost('token');

        if (empty($token)) {
            return view('forgot_password/step1');
        }

        if ($this->request->getMethod() === 'post') {
            $rules = [
                'new_password'     => 'required|min_length[6]',
                'confirm_password' => 'required|matches[new_password]',
            ];

            if (!$this->validate($rules)) {
                return $this->response->setJSON([
                    'success' => false,
                    'error' => implode(' | ', array_column($this->validator->getErrors(), null))
                ]);
            }

            // Double-check OTP masih valid
            $reset = $this->resetModel->where('token', $token)->first();

            if (!$reset || $reset['is_used'] || strtotime($reset['expired_at']) < time()) {
                return $this->response->setJSON([
                    'success' => false,
                    'error' => 'Session expired. Silakan mulai dari awal.'
                ]);
            }

            $newPassword = $this->request->getPost('new_password');

            // Update password
            $this->userModel->update($reset['id_user'], [
                'password_hash' => password_hash($newPassword, PASSWORD_DEFAULT),
                'update_at'     => date('Y-m-d H:i:s'),
            ]);

            // Mark OTP as used
            $this->resetModel->where('token', $token)->set(['is_used' => 1])->update();

            return $this->response->setJSON([
                'success' => true,
                'message' => 'Password berhasil direset',
                'token'   => $token
            ]);
        }

        return view('forgot_password/step3', ['token' => $token]);
    }

    /**
     * Step 4: Success page
     */
    public function success()
    {
        return view('forgot_password/step4');
    }

    /**
     * Get bot status
     */
    public function getBotStatus()
    {
        try {
            $ch = curl_init();
            curl_setopt_array($ch, [
                CURLOPT_URL            => 'http://localhost:3000/status',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_TIMEOUT        => 5,
                CURLOPT_CONNECTTIMEOUT => 3,
                CURLOPT_SSL_VERIFYPEER => false,
                CURLOPT_SSL_VERIFYHOST => false,
            ]);
            
            $response = curl_exec($ch);
            $curlError = curl_error($ch);
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);
            
            if ($curlError) {
                return $this->response->setJSON([
                    'botReady' => false,
                    'status'  => 'Error',
                    'message' => 'Cannot connect: ' . $curlError
                ]);
            }
            
            if ($httpCode === 200) {
                $result = json_decode($response, true);
                if ($result === null) {
                    return $this->response->setJSON([
                        'botReady' => false,
                        'status'  => 'Error',
                        'message' => 'Invalid response format'
                    ]);
                }
                return $this->response->setJSON($result);
            }
            
            return $this->response->setJSON([
                'botReady' => false,
                'status'  => 'Error',
                'message' => 'Bot tidak merespons (HTTP ' . $httpCode . ')'
            ]);
        } catch (\Exception $e) {
            return $this->response->setJSON([
                'botReady' => false,
                'status'  => 'Error',
                'message' => $e->getMessage()
            ]);
        }
    }

    /**
     * Helper: Kirim OTP ke WhatsApp via bot
     */
    private function sendOTPWhatsApp($phoneNumber, $otpCode)
    {
        try {
            $ch = curl_init();
            
            $postData = json_encode([
                'phoneNumber' => $phoneNumber,
                'otpCode'     => $otpCode,
            ]);

            curl_setopt_array($ch, [
                CURLOPT_URL            => 'http://localhost:3000/send-otp',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_TIMEOUT        => 10,
                CURLOPT_CONNECTTIMEOUT => 5,
                CURLOPT_POST           => true,
                CURLOPT_HTTPHEADER     => ['Content-Type: application/json'],
                CURLOPT_POSTFIELDS     => $postData,
                CURLOPT_SSL_VERIFYPEER => false,
                CURLOPT_SSL_VERIFYHOST => false,
            ]);

            $response = curl_exec($ch);
            $curlError = curl_error($ch);
            $curlErrno = curl_errno($ch);
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);

            // Check curl errors
            if ($curlError || $curlErrno !== 0) {
                error_log('WhatsApp Bot CURL Error: ' . $curlError . ' (errno: ' . $curlErrno . ')');
                return [
                    'success' => false,
                    'error'   => 'Network error: ' . ($curlError ?: 'CURL Error ' . $curlErrno)
                ];
            }

            // Check HTTP status code
            if ($httpCode !== 200) {
                error_log('WhatsApp Bot HTTP Error: ' . $httpCode . ' Response: ' . substr($response, 0, 200));
                return [
                    'success' => false,
                    'error'   => 'Bot tidak merespons (HTTP ' . $httpCode . ')'
                ];
            }

            // Try to parse JSON
            $result = json_decode($response, true);
            if ($result === null) {
                error_log('WhatsApp Bot JSON Parse Error. Response: ' . substr($response, 0, 200));
                return [
                    'success' => false,
                    'error'   => 'Invalid response format from bot'
                ];
            }

            return $result;
        } catch (\Exception $e) {
            error_log('WhatsApp Bot Exception: ' . $e->getMessage());
            return [
                'success' => false,
                'error'   => $e->getMessage()
            ];
        }
    }
}
