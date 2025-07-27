<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Karyawan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_karyawan', 'umur', 'alamat',
        'nomor_telepon', 'jabatan', 'club_id'
    ];

    protected $casts = [
        'nama_karyawan' => 'encrypted',
        'umur' => 'encrypted:integer',
        'alamat' => 'encrypted',
        'nomor_telepon' => 'encrypted',
        'jabatan' => 'encrypted',
    ];

    public function club()
    {
        return $this->belongsTo(Club::class);
    }
}
